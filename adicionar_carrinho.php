<?php
session_start();

$nome = $_POST['nome'] ?? '';
$preco = $_POST['preco'] ?? 0;
$estoque = $_POST['estoque'] ?? 0;

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$produtoId = md5($nome); // Simula um ID único com base no nome

if (isset($_SESSION['carrinho'][$produtoId])) {
    $_SESSION['carrinho'][$produtoId]['quantidade']++;
} else {
    $_SESSION['carrinho'][$produtoId] = [
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => 1
    ];
}

header("Location: ver_produtos.php"); // redirecionar de volta à página principal
exit;
