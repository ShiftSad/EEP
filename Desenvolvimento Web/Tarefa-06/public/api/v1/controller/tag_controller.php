<?php
function handleTags($method) {
  global $connection;
  $user = getOptionalAuthenticatedUser();

  if ($method !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    return;
  }
  listTags($connection, $user);
}

function listTags($connection, $user) {
  $where = (!$user) ? "WHERE p.visibility = 'public'" : '';

  $sql = "SELECT pt.tag,
                 COUNT(*) AS usage_count
          FROM   post_tags pt
          JOIN   posts     p ON p.id = pt.post_id
          $where
          GROUP  BY pt.tag
          ORDER  BY usage_count DESC, pt.tag ASC";

  $tags = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);
  echo json_encode($tags);
}
?>