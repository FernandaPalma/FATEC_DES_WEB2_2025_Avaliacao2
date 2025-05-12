# 🛍️ Sistema de Catálogo Virtual para Lojistas

Este é um sistema simples de gerenciamento de catálogo de produtos desenvolvido em **PHP** com **orientação a objetos**, conexão com banco de dados via **PDO** e interface responsiva utilizando **Bootstrap 5**.

## ✨ Funcionalidades

- 🔐 Login e Logout com controle de sessão
- 📦 Cadastro de novos produtos
- ❌ Remoção de produtos
- 📋 Visualização de todos os produtos cadastrados

> A gestão do catálogo está disponível **somente após o login** com sucesso.

---

## 👤 Credenciais de Teste

- **Usuário:** `admin`
- **Senha:** `admin`

---

## 🗂️ Estrutura do Projeto

/loja/
│
├── classes/
│ └── DB.php # Classe de acesso ao banco (PDO)
│
├── code/
│ └── login.php # Classe de autenticação
│
├── pages/
│ ├── cadastrar.php # Formulário para cadastrar produto
│ ├── remover.php # Formulário para remover produto
│ ├── visualizar.php # Lista de produtos
│
├── home.php # Tela inicial após login
├── login.php # Tela de login
├── logout.php # Finaliza a sessão
├── loja.sql # Script SQL para criar banco e tabela
└── README.md # Este arquivo


---

## 🛠️ Tecnologias Utilizadas

- PHP 7+
- MySQL
- Bootstrap 5 (CDN)
- HTML5 / CSS3
- PDO (PHP Data Objects)

---

## 🧠 Conceitos Aplicados

- Programação Orientada a Objetos (POO)
- Encapsulamento da lógica de banco de dados
- Validação de sessão para acesso restrito
- Separação de responsabilidades (MVC simplificado)
- UI amigável com Bootstrap

---

## ⚙️ Como Usar

1. Clone ou baixe este repositório
2. Importe o arquivo `loja.sql` em seu banco MySQL
3. Configure seu ambiente local (ex: XAMPP, WAMP ou Laragon)
4. Acesse o sistema via `http://localhost/loja/login.php`
5. Faça login com as credenciais fornecidas
6. Explore as funcionalidades: cadastrar, remover e visualizar produtos

---

## 📸 Capturas de Tela

> *(Adicione prints aqui se desejar)*

---

## 📌
