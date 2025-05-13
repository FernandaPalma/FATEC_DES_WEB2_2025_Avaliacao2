<?php
require_once('classes/login.php');
require_once('classes/artesanato_db.php');

$validador = new Login();
$validador->verificar_logado();

$db = new DB();
$produtos = $db->listarProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos - Lojinha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            padding: 16px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #6c63ff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            background-color: #6c63ff;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #5149d4;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Produtos Cadastrados</h2>

        <?php if (count($produtos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= htmlspecialchars($produto['id']) ?></td>
                            <td><?= htmlspecialchars($produto['nome']) ?></td>
                            <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                            <td><?= htmlspecialchars($produto['descricao']) ?></td>
                            <td><?= htmlspecialchars($produto['categoria']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align:center; margin-top: 20px;">Nenhum produto cadastrado.</p>
        <?php endif; ?>

        <div style="text-align:center;">
            <a href="home.php" class="button">Voltar</a>
        </div>
    </div>
</body>

</html>
