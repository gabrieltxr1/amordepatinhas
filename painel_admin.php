<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['erro'] = "Você precisa estar logado para acessar o painel.";
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <link rel="stylesheet" href="assets/css/adm.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Painel do Administrador</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="painel">
    <h1>Bem-vindo, Administrador!</h1>
    
    <div class="menu">
      <a href="listar_produtos.php">Gerenciar Produtos</a>
      <a href="listar_servicos.php">Gerenciar Serviços</a>
      <a href="listar_clientes.php">Gerenciar Usuários</a>
      <a href="logout.php">Sair</a>
    </div>
  </div>
</body>
</html>
