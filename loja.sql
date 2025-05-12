<?php 
session_start();

/**
 * Classe responsável por gerenciar o login do usuário.
 */
class Login { 
    private $name = 'admin'; 
    private $password = 'admin'; 
    
    public function verificar_credenciais($name, $password) { 
        if ($name == $this->name) {
            if ($password == $this->password) {
                $_SESSION["logged_in"] = TRUE;
                return TRUE;
            }
        }
        return FALSE;
    } 

    public function verificar_logado() { 
        if ($_SESSION["logged_in"]) {
            return TRUE;
        }
        $this->logout();
    } 

    public function logout() { 
        session_destroy();
        header("Location: index.php");
        exit();
    } 
} 

/**
 * Classe responsável por gerenciar dados no MySQL via PDO.
 */
class DB { 
     private $conn;

    // Construtor: cria a conexão com o banco
    public function __construct() {
        $host = 'localhost';
        $dbname = 'loja.sql';
        $user = 'admin';
        $pass = 'admin';

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    // Destrutor: fecha a conexão
    public function __destruct() {
        $this->conn = null;
    }

    // Método para cadastrar produto
    public function cadastrarProduto($nome, $preco, $descricao) {
        $sql = "INSERT INTO produtos (nome, preco, descricao) VALUES (:nome, :preco, :descricao)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':descricao', $descricao);
        return $stmt->execute();
    }

    // Método para remover produto pelo ID
    public function removerProduto($id) {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // (Opcional) Método para listar produtos
    public function listarProdutos() {
        $sql = "SELECT * FROM produtos";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

// Código sql

CREATE DATABASE IF NOT EXISTS loja;
USE loja;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    preco DECIMAL(10,2),
    descricao VARCHAR(255),
    categoria VARCHAR(30)
);