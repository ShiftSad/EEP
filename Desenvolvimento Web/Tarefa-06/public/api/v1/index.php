<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

require_once './router.php';

route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
?>
