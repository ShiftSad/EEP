<?php
session_start();//iniciar uma sessão com o servidor
if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

require 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome  = $_POST['nome'];
    $ra    = $_POST['ra'];
    $idade = $_POST['idade'];

    $stmt = $conexao->prepare("INSERT INTO alunos (nome,ra,idade) VALUES(?,?,?)");
    $stmt->bind_param("ssi",$nome,$ra,$idade);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h2>Adicionar Aluno</h2>
    <form  method="post">
        <input type="text" name="nome" required placeholder="Nome">
        <input type="text" name="ra" required placeholder="RA">
        <input type="number" name="idade" required placeholder="Idade">
        <button type="submit">Salvar</button>
    </form>
</body>
</html>

