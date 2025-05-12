<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}
require_once "../classes/DB.php";

$db = new DB();
$produtos = $db->listarProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
    <h2>Lista de Produtos</h2>

    <table class="table table-striped table-dark mt-4">
        <thead>
            <tr>
                <th>ID</th><th>Nome</th><th>Preço</th><th>Descrição</th><th>Categoria</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($produtos as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['nome'] ?></td>
                <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                <td><?= $p['descricao'] ?></td>
                <td><?= $p['categoria'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-secondary">Voltar</a>
</div>
</body>
</html>
