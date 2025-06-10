<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';
$professor = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $stmt = $conexao->prepare("DELETE FROM professores WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: index_professores.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexao->prepare("SELECT nome FROM professores WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $professor = $resultado->fetch_assoc();
    } else {
        header("Location: index_professores.php");
        exit();
    }
} else {
    header("Location: index_professores.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Exclusão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Confirmar Exclusão</h3>
            </div>
            <div class="card-body">
                <p>Você tem certeza que deseja excluir o professor <strong><?php echo htmlspecialchars($professor['nome']); ?></strong>?</p>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn-danger">Sim, Excluir</button>
                    <a href="index_professores.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>