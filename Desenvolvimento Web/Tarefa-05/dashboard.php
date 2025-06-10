<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Painel de Controle</h2>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Alunos</h5>
                        <p class="card-text">Gerenciar cadastros de alunos.</p>
                        <a href="index_alunos.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Professores</h5>
                        <p class="card-text">Gerenciar cadastros de professores.</p>
                        <a href="index_professores.php" class="btn btn-success">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>