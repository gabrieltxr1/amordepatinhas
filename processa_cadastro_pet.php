<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_SESSION['usuario_id'])) {
        $_SESSION['erro'] = "Usuário não autenticado.";
        header("Location: login.php");
        exit;
    }

    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $cliente_id = $_SESSION['usuario_id'];

    $stmt = $conn->prepare("INSERT INTO animal (nome, espécie, raça) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $especie, $raca);

    if ($stmt->execute()) {
        $_SESSION['sucesso'] = "Pet cadastrado com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao cadastrar o pet: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: painel.php");
    exit;
} else {
    $_SESSION['erro'] = "Acesso inválido.";
    header("Location: painel.php");
    exit;
}
