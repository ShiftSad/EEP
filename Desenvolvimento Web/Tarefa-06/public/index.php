<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/') {
  require __DIR__ . '/views/home.php';
} 
elseif ($path === '/login') {
  require __DIR__ . '/views/login.php';
} 
elseif ($path === '/register') {
  require __DIR__ . '/views/register.php';
}
elseif ($path === '/dashboard') {
  require __DIR__ . '/views/dashboard.php';
}
elseif (preg_match('/^\/posts\/(\d+)$/', $path, $matches)) {
  $post_id = (int) $matches[1];
  require __DIR__ . '/views/post.php';
} 
else {
  http_response_code(404);
  require __DIR__ . '/views/404.php';
}
?>
