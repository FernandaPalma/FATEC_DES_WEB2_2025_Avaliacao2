<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}
require_once "../classes/DB.php";

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->removerProduto($_POST['id']);
    $mensagem = "Produto removido com sucesso!";
}

$produtos = $db->listarProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Remover Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
    <h2>Remover Produto</h2>

    <?php if (isset($mensagem)): ?>
        <div class="alert alert-warning"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Escolha um produto</label>
            <select name="id" class="form-select">
                <?php foreach ($produtos as $p): ?>
                    <option value="<?= $p['id'] ?>">
                        <?= $p['nome'] ?> (<?= $p['categoria'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Remover</button>
        <a href="../index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
