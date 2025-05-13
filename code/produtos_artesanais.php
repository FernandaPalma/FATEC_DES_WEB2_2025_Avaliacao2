<?php
require_once('classes/login.php');
require_once('classes/artesanato_db.php');

$validador = new Login();
$validador->verificar_logado();

$db = new DB();
$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];

    if ($db->cadastrarProduto($nome, $preco, $descricao, $categoria)) {
        $mensagem = "Produto cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar produto.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto - Lojinha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            margin-bottom: 24px;
            color: #333;
        }

        form label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-weight: bold;
        }

        form input,
        form textarea {
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
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #5149d4;
        }

        .mensagem {
            margin-bottom: 20px;
            font-weight: bold;
            color: green;
        }

        .mensagem.erro {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Cadastrar Produto</h2>

        <?php if ($mensagem): ?>
            <div class="mensagem <?= strpos($mensagem, 'Erro') !== false ? 'erro' : '' ?>">
                <?= htmlspecialchars($mensagem) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="cadastrar.php">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="3" required></textarea>

            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" required>

            <input class="button" type="submit" value="Cadastrar">
        </form>

        <br>
        <a href="home.php" class="button">Voltar</a>
    </div>
</body>

</html>
