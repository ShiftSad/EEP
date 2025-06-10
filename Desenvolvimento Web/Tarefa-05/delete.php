<?php
session_start();//iniciar uma sessão com o servidor
if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

require 'config.php';

$id = $_GET['id'];

$stmt = $conexao->prepare("DELETE FROM alunos WHERE id = ?");
$stmt->bind_param("i",$id);
$stmt->execute();


header("Location: index.php");
exit();
?>