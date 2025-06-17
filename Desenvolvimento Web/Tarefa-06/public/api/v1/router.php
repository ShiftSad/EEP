<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/controller/post_controller.php';
require_once __DIR__ . '/controller/auth_controller.php';
require_once __DIR__ . '/controller/tag_controller.php';
require_once __DIR__ . '/controller/image_controller.php';
require_once __DIR__ . '/controller/comment_controller.php';
require_once __DIR__ . '/controller/user_controller.php';

function route($uri, $method) {
  $path = parse_url($uri, PHP_URL_PATH);
  $parts = explode('/', trim($path, '/'));

  // /api/v1/ part 0 é 'api', part 1 é 'v1'
  $resource = $parts[2] ?? null;
  $id = $parts[3] ?? null;

  switch ($resource) {
    case 'users':
      handleUsers($method, $id);
      break;
    case 'tags':
      handleTags($method);
      break;
    case 'posts':
      handlePosts($method, $id);
      break;
    case 'login':
      handleLogin($method);
      break;
    case 'register':
      handleRegister($method);
      break;
    case 'images':
      handleImages($method, $id);
      break;
    case 'comments':
      handleComments($method, $id);
      break;
    default:
      http_response_code(404);
      echo json_encode(['error' => 'Resource not found']);
      break;
  }
}
?>
