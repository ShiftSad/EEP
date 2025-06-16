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
  $index  = isset($_GET['index']) ? (int) $_GET['index'] : 0;
  $limit  = isset($_GET['limit']) ? (int) $_GET['limit'] : 20;
  $limit  = min($limit, 100);
  $filter = $_GET['filter'] ?? null;

  $tags = [];
  if (isset($_GET['tags'])) {
    $tags = array_filter(array_map('trim', explode(',', $_GET['tags'])));
  }

  if ($index < 0) $index = 0;
  if ($limit < 1) $limit = 20;

  $query = "SELECT p.id,
                   p.user_id,
                   p.title,
                   p.description,
                   p.content,
                   p.location,
                   p.event_datetime,
                   p.image_url,
                   p.visibility,
                   p.created_at,
                   u.name                        AS author_name,
                   GROUP_CONCAT(DISTINCT pt.tag) AS tags
            FROM   posts          p
            JOIN   users          u  ON p.user_id = u.id
            LEFT  JOIN post_tags  pt ON p.id      = pt.post_id";

  $whereClauses = [];
  $params       = [];
  $paramTypes   = '';

  if (!$user) {
    $whereClauses[] = "p.visibility = 'public'";
  } elseif ($user['role'] !== 'admin') {
    $whereClauses[] = "(p.visibility = 'public' OR p.user_id = ?)";
    $params[]       = $user['id'];
    $paramTypes    .= 'i';
  }

  if ($filter) {
    $whereClauses[] = "(p.title LIKE ? OR p.content LIKE ? OR p.description LIKE ? OR p.location LIKE ?)";
    $params[]       = "%$filter%";
    $params[]       = "%$filter%";
    $params[]       = "%$filter%";
    $params[]       = "%$filter%";
    $paramTypes    .= 'ssss';
  }

  if ($tags) {
    $placeholders   = implode(',', array_fill(0, count($tags), '?'));
    $whereClauses[] = "p.id IN (SELECT post_id FROM post_tags WHERE tag IN ($placeholders))";
    foreach ($tags as $t) {
      $params[]    = $t;
      $paramTypes .= 's';
    }
  }

  if ($whereClauses) {
    $query .= ' WHERE ' . implode(' AND ', $whereClauses);
  }

  $query .= ' GROUP BY p.id ORDER BY p.created_at DESC LIMIT ? OFFSET ?';

  $params[]     = $limit;
  $params[]     = $index;
  $paramTypes  .= 'ii';

  $stmt = $connection->prepare($query);
  if ($paramTypes) {
    $stmt->bind_param($paramTypes, ...$params);
  }
  $stmt->execute();
  $result = $stmt->get_result();
  $posts  = $result->fetch_all(MYSQLI_ASSOC);

  foreach ($posts as &$post) {
    $post['tags'] = $post['tags']
      ? array_filter(array_map('trim', explode(',', $post['tags'])))
      : [];
  }

  echo json_encode($posts);
}

function getPostById($connection, $id, $user) {
  $stmt = $connection->prepare(
    "SELECT p.*,
            u.name                              AS author_name,
            GROUP_CONCAT(DISTINCT pt.tag)       AS tags
     FROM   posts          p
     JOIN   users          u  ON p.user_id = u.id
     LEFT JOIN post_tags   pt ON p.id      = pt.post_id
     WHERE  p.id = ?
     GROUP  BY p.id"
  );
  
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $post = $result->fetch_assoc();

  if (!$post) {
    http_response_code(404);
    echo json_encode(['error' => 'Post not found']);
    return;
  }

  if ($post['visibility'] === 'private' && (!$user || ($user['role'] !== 'admin' && $post['user_id'] != $user['id']))) {
    http_response_code(403);
    echo json_encode(['error' => 'You do not have permission to view this post']);
    return;
  }

  $post['tags'] = $post['tags']
    ? array_filter(array_map('trim', explode(',', $post['tags'])))
    : [];

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
    $stmt = $connection->prepare("INSERT INTO posts (user_id, title, description, content, location, event_datetime, image_url, visibility) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $description = $data['description'] ?? null;
    $location = $data['location'] ?? null;
    $event_datetime = $data['event_datetime'] ?? null;
    $visibility = $data['visibility'] ?? 'public';
    $image_url = $data['image_url'] ?? null;
    $stmt->bind_param('isssssss', $user['id'], $data['title'], $description, $data['content'], $location, $event_datetime, $image_url, $visibility);
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
  if (isset($data['description'])) {
    $fields[] = 'description = ?';
    $params[] = $data['description'];
    $param_types .= 's';
  }
  if (isset($data['content'])) {
    $fields[] = 'content = ?';
    $params[] = $data['content'];
    $param_types .= 's';
  }
  if (isset($data['location'])) {
    $fields[] = 'location = ?';
    $params[] = $data['location'];
    $param_types .= 's';
  }
  if (isset($data['event_datetime'])) {
    $fields[] = 'event_datetime = ?';
    $params[] = $data['event_datetime'];
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

  if ($user['role'] !== 'admin' && $post['user_id'] != $user['id']) {
    http_response_code(403);
    echo json_encode(['error' => 'You do not have permission to delete this post']);
    return;
  }

  $deleteStmt = $connection->prepare("DELETE FROM posts WHERE id = ?");
  $deleteStmt->bind_param('i', $id);
  if ($deleteStmt->execute()) http_response_code(204);
  else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to delete post']);
  }
}
?>