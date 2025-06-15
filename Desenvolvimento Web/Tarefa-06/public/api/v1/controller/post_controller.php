<?php

require_once __DIR__ . '/../jwt.php';

function getOptionalAuthenticatedUser() {
  global $jwt_secret;

  if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
    return null;
  }

  $parts = explode(' ', $_SERVER['HTTP_AUTHORIZATION']);
  if (count($parts) !== 2 || $parts[0] !== 'Bearer') {
    return null;
  }

  $token = $parts[1];
  $payload = validadeJWT($token, $jwt_secret);

  return $payload ?: null;
}

function getAuthenticatedUser() {
  $user = getOptionalAuthenticatedUser();
  if (!$user) {
    http_response_code(401);
    echo json_encode(['error' => 'Authentication required']);
    exit;
  }
  return $user;
}

function handlePosts($method, $id) {
  global $connection;
  $user = getOptionalAuthenticatedUser();
  switch ($method) {
    case 'GET':
      if ($id) getPostById($connection, $id, $user);
      else listPosts($connection, $user);
      break;
    case 'POST':
      createPost($connection, $user);
      break;
    case 'PUT':
      if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'Post ID is required for update']);
        exit;
      }
      updatePost($connection, $id, $user);
      break;
    case 'DELETE':
      if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'Post ID is required for deletion']);
        exit;
      }
      deletePost($connection, $id, $user);
      break;
    default:
      http_response_code(405);
      echo json_encode(['error' => 'Method Not Allowed']);
      break;
  }
}

function listPosts($connection, $user) {
  $index = isset($_GET['index']) ? (int) $_GET['index'] : 0;
  $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 20;
  $limit = min($limit, 100);
  $filter = isset($_GET['filter']) ? $_GET['filter'] : null;
  $tags = [];
  if (isset($_GET['tags'])) {
    $tags = array_filter(array_map('trim', explode(',', $_GET['tags'])));
  }
  if ($index < 0) $index = 0;
  if ($limit < 1) $limit = 20;

  $params = [];
  $param_types = '';
  $query = "SELECT DISTINCT p.id, p.user_id, p.title, p.content, p.image_url, p.visibility, p.created_at, u.name as author_name
            FROM posts p
            JOIN users u ON p.user_id = u.id";
  if (!empty($tags)) {
    $query .= " JOIN post_tags pt ON p.id = pt.post_id";
  }

  $whereClauses = [];

  if (!$user) {
    $whereClauses[] = "p.visibility = 'public'";
  } else if ($user['role'] !== 'admin') {
    $whereClauses[] = "(p.visibility = 'public' OR p.user_id = ?)";
    $params[] = $user['id'];
    $param_types .= 'i';
  }

  if ($filter) {
    $whereClauses[] = "(p.title LIKE ? OR p.content LIKE ?)";
    $params[] = "%$filter%";
    $params[] = "%$filter%";
    $param_types .= 'ss';
  }
  if (!empty($tags)) {
    $placeholders = implode(',', array_fill(0, count($tags), '?'));
    $whereClauses[] = "pt.tag IN ($placeholders)";
    foreach ($tags as $tag) {
      $params[] = $tag;
      $param_types .= 's';
    }
  }

  if (!empty($whereClauses)) {
    $query .= " WHERE " . implode(' AND ', $whereClauses);
  }

  $query .= " ORDER BY p.created_at DESC LIMIT ? OFFSET ?";
  $params[] = $limit;
  $params[] = $index;
  $param_types .= 'ii';

  $stmt = $connection->prepare($query);
  if ($param_types) {
    $stmt->bind_param($param_types, ...$params);
  }
  $stmt->execute();
  $result = $stmt->get_result();
  $posts = $result->fetch_all(MYSQLI_ASSOC);

  echo json_encode($posts);
}

function getPostById($connection, $id, $user) {
  $stmt = $connection->prepare("SELECT p.*, u.name as author_name FROM posts p JOIN users u ON p.user_id = u.id WHERE p.id = ?");
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $post = $result->fetch_assoc();

  if (!$post) {
    http_response_code(404);
    echo json_encode(['error' => 'Post not found']);
    return;
  }

  // Check de permissão
  if ($post['visibility'] === 'private' && $user['role'] !== 'admin' && $post['user_id'] != $user['id']) {
    http_response_code(403);
    echo json_encode(['error' => 'You do not have permission to view this post']);
    return;
  }

  echo json_encode($post);
}

function createPost($connection, $user) {
  $data = json_decode(file_get_contents('php://input'), true);

  if (empty($data['title']) || empty($data['content'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Title and content are required']);
    return;
  }

  $connection->begin_transaction();

  try {
    $stmt = $connection->prepare("INSERT INTO posts (user_id, title, content, image_url, visibility) VALUES (?, ?, ?, ?, ?)");
    $visibility = $data['visibility'] ?? 'public';
    $stmt->bind_param('issss', $user['id'], $data['title'], $data['content'], $data['image_url'], $visibility);
    $stmt->execute();
    $postId = $connection->insert_id;

    if (!empty($data['tags']) && is_array($data['tags'])) {
      $tagStmt = $connection->prepare("INSERT INTO post_tags (post_id, tag) VALUES (?, ?)");
      foreach ($data['tags'] as $tag) {
        $tagStmt->bind_param('is', $postId, $tag);
        $tagStmt->execute();
      }
    }

    $connection->commit();
    http_response_code(201);
    getPostById($connection, $postId, $user);
  } catch (Exception $e) {
    $connection->rollback();
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create post', 'details' => $e->getMessage()]);
  }
}

function updatePost($connection, $id, $user) {
  // First, get the post to check for ownership
  $stmt = $connection->prepare("SELECT user_id FROM posts WHERE id = ?");
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $post = $result->fetch_assoc();

  if (!$post) {
    http_response_code(404);
    echo json_encode(['error' => 'Post not found']);
    return;
  }

  // Permission Check
  if ($user['role'] !== 'admin' && $post['user_id'] != $user['id']) {
    http_response_code(403);
    echo json_encode(['error' => 'You do not have permission to edit this post']);
    return;
  }

  $data = json_decode(file_get_contents('php://input'), true);
  $fields = [];
  $params = [];
  $param_types = '';

  if (isset($data['title'])) {
    $fields[] = 'title = ?';
    $params[] = $data['title'];
    $param_types .= 's';
  }
  if (isset($data['content'])) {
    $fields[] = 'content = ?';
    $params[] = $data['content'];
    $param_types .= 's';
  }
  if (isset($data['image_url'])) {
    $fields[] = 'image_url = ?';
    $params[] = $data['image_url'];
    $param_types .= 's';
  }

  if (empty($fields)) {
    http_response_code(400);
    echo json_encode(['error' => 'No fields to update']);
    return;
  }

  $connection->begin_transaction();
  try {
    $query = "UPDATE posts SET " . implode(', ', $fields) . " WHERE id = ?";
    $params[] = $id;
    $param_types .= 'i';

    $updateStmt = $connection->prepare($query);
    $updateStmt->bind_param($param_types, ...$params);
    $updateStmt->execute();

    if (isset($data['tags']) && is_array($data['tags'])) {
      $delStmt = $connection->prepare("DELETE FROM post_tags WHERE post_id = ?");
      $delStmt->bind_param('i', $id);
      $delStmt->execute();

      $tagStmt = $connection->prepare("INSERT INTO post_tags (post_id, tag) VALUES (?, ?)");
      foreach ($data['tags'] as $tag) {
        $tagStmt->bind_param('is', $id, $tag);
        $tagStmt->execute();
      }
    }

    $connection->commit();
    getPostById($connection, $id, $user);
  } catch (Exception $e) {
    $connection->rollback();
    http_response_code(500);
    echo json_encode(['error' => 'Failed to update post', 'details' => $e->getMessage()]);
  }
}

function deletePost($connection, $id, $user) {
  // Procurar o post, assim podemos ver se o usuário tem permissão para deletar
  $stmt = $connection->prepare("SELECT user_id FROM posts WHERE id = ?");
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $post = $result->fetch_assoc();

  if (!$post) {
    http_response_code(404);
    echo json_encode(['error' => 'Post not found']);
    return;
  }

  // Permission Check
  if ($user['role'] !== 'admin' && $post['user_id'] != $user['id']) {
    http_response_code(403);
    echo json_encode(['error' => 'You do not have permission to delete this post']);
    return;
  }

  // MYSQL vai deletar automaticamente os comentários e tags associados
  $deleteStmt = $connection->prepare("DELETE FROM posts WHERE id = ?");
  $deleteStmt->bind_param('i', $id);
  if ($deleteStmt->execute()) http_response_code(204);
  else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to delete post']);
  }
}
?>