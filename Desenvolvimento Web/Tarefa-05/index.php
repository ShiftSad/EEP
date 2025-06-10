<?php
session_start();//iniciar uma sessão com o servidor
if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

require 'config.php';

$result = $conexao->query("SELECT * FROM alunos");//retornar todos os alunos cadastrados
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
    <h2>Lista de Alunos</h2>
    <a href="logout.php">Logout</a>
    <a href="create.php">Adicionar aluno</a>

    <table border="1" whidth="100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>RA</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['ra']; ?></td>
                    <td><?php echo $row['idade']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $row['id'];?>">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>



