<?php
function handleTags($method) {
  global $connection;

  switch ($method) {
    case 'GET':
      listTags($connection, getOptionalAuthenticatedUser());
      break;
    case 'POST':
      attachTagsToPost($connection, getAuthenticatedUser());
      break;
    default:
      http_response_code(405);
      echo json_encode(['error' => 'Method Not Allowed']);
  }
}

function listTags($connection, $user) {
  $where = !$user ? "WHERE p.visibility = 'public'" : '';
  $sql   = "SELECT pt.tag,
                   COUNT(*) AS usage_count
            FROM   post_tags pt
            JOIN   posts     p ON p.id = pt.post_id
            $where
            GROUP  BY pt.tag
            ORDER  BY usage_count DESC, pt.tag ASC";

  $tags = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);
  echo json_encode($tags);
}

function attachTagsToPost($connection, $user) {
  $data = json_decode(file_get_contents('php://input'), true);

  if (empty($data['post_id']) || empty($data['tags']) || !is_array($data['tags'])) {
    http_response_code(400);
    echo json_encode(['error' => 'post_id and tags[] are required']);
    return;
  }

  $postId = (int) $data['post_id'];

  $stmt = $connection->prepare('SELECT user_id FROM posts WHERE id = ?');
  $stmt->bind_param('i', $postId);
  $stmt->execute();
  $res  = $stmt->get_result();
  $post = $res->fetch_assoc();

  if (!$post) {
    http_response_code(404);
    echo json_encode(['error' => 'Post not found']);
    return;
  }

  if ($user['role'] !== 'admin' && $post['user_id'] != $user['id']) {
    http_response_code(403);
    echo json_encode(['error' => 'You do not have permission to modify this post']);
    return;
  }

  $connection->begin_transaction();
  try {
    $tagStmt = $connection->prepare('SELECT 1 FROM post_tags WHERE post_id = ? AND tag = ?');
    $insertStmt = $connection->prepare('INSERT INTO post_tags (post_id, tag) VALUES (?, ?)');
    foreach ($data['tags'] as $tag) {
      $tag = trim($tag);
      if ($tag === '') continue;
      // Check if tag already exists for this post
      $tagStmt->bind_param('is', $postId, $tag);
      $tagStmt->execute();
      $tagStmt->store_result();
      if ($tagStmt->num_rows === 0) {
        // Only insert if not already present
        $insertStmt->bind_param('is', $postId, $tag);
        $insertStmt->execute();
      }
    }
    $connection->commit();
  } catch (Exception $e) {
    $connection->rollback();
    http_response_code(500);
    echo json_encode(['error' => 'Failed to attach tags', 'details' => $e->getMessage()]);
    return;
  }

  $tagRows = $connection
    ->query('SELECT DISTINCT tag FROM post_tags WHERE post_id = ' . $postId)
    ->fetch_all(MYSQLI_ASSOC);
  $tags = array_column($tagRows, 'tag');

  echo json_encode(['post_id' => $postId, 'tags' => $tags]);
}
?>