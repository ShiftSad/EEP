<?php
$jwt_secret = 'banana';

$username = 'root';
$password = 'password';
$host = 'mysql8';
$database = 'public';

$connection = mysqli_connect($host, $username, $password, $database);

if ($connection->connect_error) die("Connection failed: " . $connection->connect_error);
?>
