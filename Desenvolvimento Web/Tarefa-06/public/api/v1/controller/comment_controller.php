<?php

function handleComments($method, $id) {
  global $connection;

  switch ($method) {
    case 'GET':
      if ($id) {
        getCommentById($connection, $id);
      } 
      else {
        listCommentsForPost($connection);
      }
      break;
    case 'POST':
      $user = getAuthenticatedUser();
      createComment($connection, $user);
      break;
    default:
      http_response_code(405);
      echo json_encode(['error' => 'Method Not Allowed']);
      break;
  }
}

function listCommentsForPost($connection) {
  if (!isset($_GET['post_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required query parameter: post_id']);
    return;
  }
  $post_id = (int)$_GET['post_id'];

  $user = getOptionalAuthenticatedUser();
  checkPostExistsAndIsViewable($connection, $post_id, $user);

  $stmt = $connection->prepare(
    "SELECT c.id, c.post_id, c.user_id, c.content, c.created_at, u.name AS author_name
     FROM comments c
     JOIN users u ON c.user_id = u.id
     WHERE c.post_id = ?
     ORDER BY c.created_at ASC"
  );
  $stmt->bind_param('i', $post_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $comments = $result->fetch_all(MYSQLI_ASSOC);

  echo json_encode($comments);
}

function createComment($connection, $user) {
  $data = json_decode(file_get_contents('php://input'), true);

  if (empty($data['post_id']) || !is_numeric($data['post_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'post_id is required and must be a number']);
    return;
  }
  if (empty($data['content'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Comment content is required']);
    return;
  }

  $post_id = (int)$data['post_id'];
  $content = $data['content'];
  $user_id = $user['id'];
  
  checkPostExistsAndIsViewable($connection, $post_id, $user);

  try {
    $stmt = $connection->prepare(
      "INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)"
    );
    $stmt->bind_param('iis', $post_id, $user_id, $content);
    $stmt->execute();

    $commentId = $connection->insert_id;
    http_response_code(201);
    getCommentById($connection, $commentId);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create comment', 'details' => $e->getMessage()]);
  }
}

function getCommentById($connection, $id) {
    $stmt = $connection->prepare(
      "SELECT c.id, c.post_id, c.user_id, c.content, c.created_at, u.name AS author_name, p.visibility as post_visibility, p.user_id as post_author_id
       FROM comments c
       JOIN users u ON c.user_id = u.id
       JOIN posts p ON c.post_id = p.id
       WHERE c.id = ?"
    );
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $comment = $result->fetch_assoc();

    if (!$comment) {
      http_response_code(404);
      echo json_encode(['error' => 'Comment not found']);
      return;
    }
    
    $user = getOptionalAuthenticatedUser();
    if ($comment['post_visibility'] === 'private' && (!$user || ($user['role'] !== 'admin' && $comment['post_author_id'] != $user['id']))) {
        http_response_code(403);
        echo json_encode(['error' => 'You do not have permission to view this comment']);
        return;
    }

    unset($comment['post_visibility']);
    unset($comment['post_author_id']);

    echo json_encode($comment);
}

function checkPostExistsAndIsViewable($connection, $id, $user) {
  $stmt = $connection->prepare("SELECT user_id, visibility FROM posts WHERE id = ?");
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $post = $result->fetch_assoc();

  if (!$post) {
    http_response_code(404);
    echo json_encode(['error' => 'Post not found']);
    exit;
  }

  if ($post['visibility'] === 'private' && (!$user || ($user['role'] !== 'admin' && $post['user_id'] != $user['id']))) {
    http_response_code(403);
    echo json_encode(['error' => 'You do not have permission to access this post']);
    exit;
  }
}
?>