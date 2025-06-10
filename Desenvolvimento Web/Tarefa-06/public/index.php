<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
  case '/':
    require __DIR__ . '/views/home.php';
    break;
  case '/login':
    require __DIR__ . '/views/login.php';
    break;
  case '/register':
    require __DIR__ . '/views/register.php';
    break;
  default:
    require __DIR__ . '/views/404.php';
    break;
}
?>
