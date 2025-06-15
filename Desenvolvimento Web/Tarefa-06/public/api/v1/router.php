<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/controller/post_controller.php';

function route($uri, $method) {
  $path = parse_url($uri, PHP_URL_PATH);
  $parts = explode('/', trim($path, '/'));

  // /api/v1/ part 0 é 'api', part 1 é 'v1'
  $resource = $parts[2] ?? null;
  $id = $parts[3] ?? null;

  if ($method === 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    http_response_code(204);
    exit;
  }
  
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");

  switch ($resource) {
    case 'users':
      handleUsers($method, $id);
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
    default:
      http_response_code(404);
      echo json_encode(['error' => 'Resource not found']);
      break;
  }
}
?>
