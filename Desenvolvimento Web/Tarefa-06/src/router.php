<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/controller/user_controller.php'
require_once __DIR__ . '/controller/auth_controller.php';

function route($uri, $method) {
  $path = parse_url($uri, PHP_URL_PATH);
  $parts = explode('/', trim($path, '/'));

  $resource = $parts[1] ?? null;
  $id = $parts[2] ?? null;

  if ($method === 'OPTIONS') {
    http_response_code(204);
    exit;
  }

  switch ($resource) {
  case 'users':
    handleUsers($method, $id);
    break;
  }
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
