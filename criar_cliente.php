<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Cliente</title>
    <link rel="stylesheet" href="../assets/css/produtos.css">
</head>
<body>
<div class="container">
    <h1>Criar Novo Cliente</h1>
    <form action="processa_criar_cliente.php" method="POST">
        <input type="text" name="cpf" placeholder="CPF" required>
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="telefone" placeholder="Telefone">
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="submit" value="Cadastrar">
    </form>
    <div class="voltar-menu">
        <a href="listar_clientes.php">← Voltar</a>
    </div>
</div>
</body>
</html>
