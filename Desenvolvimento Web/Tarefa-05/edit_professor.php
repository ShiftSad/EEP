<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $rf = $_POST['rf'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $stmt = $conexao->prepare("UPDATE professores SET nome = ?, rf = ?, email = ?, idade = ? WHERE id = ?");
    $stmt->bind_param("sssii", $nome, $rf, $email, $idade, $id);
    $stmt->execute();
    header("Location: index_professores.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conexao->prepare("SELECT * FROM professores WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$professor = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Editar Professor</h2>
            </div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $professor['id']; ?>">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required value="<?php echo htmlspecialchars($professor['nome']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="rf" class="form-label">RF</label>
                        <input type="text" name="rf" class="form-control" required value="<?php echo htmlspecialchars($professor['rf']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" required value="<?php echo htmlspecialchars($professor['email']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade</label>
                        <input type="number" name="idade" class="form-control" required value="<?php echo $professor['idade']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="index_professores.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>