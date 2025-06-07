<?php
include "conexao.php";
$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = $id";
$result = $conn->query($sql);
$cliente = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="assets/css/add_pet.css">
</head>
<body>
<div class="container">
    <h1>Editar Cliente</h1>
    
    <form action="processa_editar_cliente.php" method="POST">
        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
        <input type="text" name="cpf" value="<?= $cliente['cpf'] ?>" required placeholder="CPF">
        <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required placeholder="Nome">
        <input type="email" name="email" value="<?= $cliente['email'] ?>" required placeholder="Email">
        <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>" placeholder="Telefone">
        <input type="password" name="senha" placeholder="Nova senha (opcional)">
        <input type="submit" value="Atualizar Cliente">
    </form>

    <hr>

    <h2>Registrar Novo Animal para este Cliente</h2>
    <form action="processa_novo_animal.php" method="POST">
        <input type="hidden" name="cliente_id" value="<?= $cliente['id'] ?>">
        <input type="text" name="nome" required placeholder="Nome do Pet">
        <input type="text" name="especie" required placeholder="Espécie">
        <input type="text" name="raca" required placeholder="Raça">
        <input type="submit" value="Cadastrar Animal">
    </form>

    <div class="voltar-menu">
        <a href="listar_clientes.php">← Voltar</a>
    </div>
</div>
</body>
</html>
