<?php
require_once('classes/login.php');
require_once('classes/artesanato_db.php');

$validador = new Login();
$validador->verificar_logado();

$db = new DB();
$mensagem = '';


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['produto_id'])) {
    $id = $_POST['produto_id'];
    if ($db->removerProduto($id)) {
        $mensagem = "Produto removido com sucesso!";
    } else {
        $mensagem = "Erro ao remover produto.";
    }
}


$produtos = $db->listarProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Remover Produto - Lojinha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h2 {
            margin-bottom: 24px;
            color: #333;
        }

        .mensagem {
            margin-bottom: 20px;
            color: green;
            font-weight: bold;
        }

        form select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }

        .button {
            background-color: #6c63ff;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #5149d4;
        }

        a.button-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #6c63ff;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
        }

        a.button-link:hover {
            background-color: #5149d4;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Remover Produto</h2>

        <?php if ($mensagem): ?>
            <div class="mensagem"><?= htmlspecialchars($mensagem) ?></div>
        <?php endif; ?>

        <?php if (count($produtos) > 0): ?>
            <form method="POST" action="remover.php">
                <label for="produto_id">Selecione o produto:</label>
                <select name="produto_id" id="produto_id" required>
                    <option value="">-- Escolha um produto --</option>
                    <?php foreach ($produtos as $produto): ?>
                        <option value="<?= $produto['id'] ?>">
                            <?= htmlspecialchars($produto['nome']) ?> (ID: <?= $produto['id'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
                <input class="button" type="submit" value="Remover Produto">
            </form>
        <?php else: ?>
            <p>Nenhum produto cadastrado para remoção.</p>
        <?php endif; ?>

        <a href="home.php" class="button-link">Voltar</a>
    </div>
</body>

</html>
