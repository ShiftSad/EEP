<?php
require_once '../config/config.php';
require_once '../src/router.php';

route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
?>
