<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'] ?? null;  // só clientes usam
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'] ?? null;  // só clientes usam
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $tipo = $_POST['tipo'];

    if ($senha !== $confirmar_senha) {
        $_SESSION['erro'] = 'As senhas não coincidem!';
        header("Location: cadastro.php");
        exit;
    }

    $tabelas_validas = ['clientes', 'secretaria', 'administrador'];
    if (!in_array($tipo, $tabelas_validas)) {
        $_SESSION['erro'] = 'Tipo de usuário inválido.';
        header("Location: cadastro.php");
        exit;
    }

    // Verifica se email já existe na tabela correspondente
    $stmt = $conn->prepare("SELECT id FROM $tipo WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['erro'] = 'Este e-mail já está cadastrado.';
        $stmt->close();
        $conn->close();
        header("Location: cadastro.php");
        exit;
    }
    $stmt->close();

    // Insere conforme o tipo
    if ($tipo === 'clientes') {
        $stmt = $conn->prepare("INSERT INTO clientes (cpf, nome, email, telefone, senha) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $cpf, $nome, $email, $telefone, $senha);
    } else {
        // secretaria ou administrador
        $stmt = $conn->prepare("INSERT INTO $tipo (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senha);
    }

    if ($stmt->execute()) {
        $_SESSION['sucesso'] = 'Cadastro realizado com sucesso!';
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['erro'] = 'Erro ao cadastrar: ' . $stmt->error;
        header("Location: cadastro.php");
        exit;
    }

} else {
    $_SESSION['erro'] = 'Acesso inválido.';
    header("Location: cadastro.php");
    exit;
}
