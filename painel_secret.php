<?php
session_start();


if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['erro'] = "Você precisa estar logado para cadastrar um pet.";
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Pet</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="box">
    <form action="processa_cadastro_pet.php" method="POST">
      <h2>Cadastrar Pet</h2>

      <?php
      if (isset($_SESSION['sucesso'])) {
          echo "<p style='color:green;'>".$_SESSION['sucesso']."</p>";
          unset($_SESSION['sucesso']);
      }

      if (isset($_SESSION['erro'])) {
          echo "<p style='color:red;'>".$_SESSION['erro']."</p>";
          unset($_SESSION['erro']);
      }
      ?>

      <div class="inputBox">
        <input type="text" name="nome" required>
        <span>Nome do Pet</span>
      </div>

      <div class="inputBox">
        <input type="text" name="especie" required>
        <span>Espécie</span>
      </div>

      <div class="inputBox">
        <input type="text" name="raca" required>
        <span>Raça</span>
      </div>

      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>
