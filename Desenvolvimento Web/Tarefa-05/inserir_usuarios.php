<?php
require 'config.php';

$usuarios = [
    ['nome' => 'João Silva', 'email' => 'joao.silva@gmail.com', 'senha' => 'senha@'],
    ['nome' => 'Maria Oliveira', 'email' => 'maria@gmail.com', 'senha' => 'senha@'],
    ['nome' => 'Pedro Santos', 'email' => 'pedro.santos@gmail.com', 'senha' => 'senha@']
];

$stmt = $conexao->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (?,?,?)");

foreach ($usuarios as $user){
    $nome = $user['nome'];
    $email = $user['email'];
    $senha = $user['senha'];

    $stmt->bind_param('sss',$nome, $email, $senha);
    $stmt->execute();
}

echo "Usuários cadastrados com sucesso!";
?>