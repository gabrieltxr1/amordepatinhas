<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body style="background-image: url('assets/img/banner_cat.jpg');">
  <div class="box">
    <form action="processa_login.php" method="POST">
      <h2>Login</h2>

    
      <?php
      if (isset($_SESSION['erro'])) {
          echo "<p style='color:red;'>".$_SESSION['erro']."</p>";
          unset($_SESSION['erro']);
      }
      ?>

      <div class="inputBox">
        <input type="email" name="email" required>
        <span>E-mail</span>
        <i></i>
      </div>

      <div class="inputBox">
        <input type="password" name="senha" required>
        <span>Senha</span>
        <i></i>
      </div>

      <div class="links">
        <a href="#">Esqueceu a senha?</a>
        <a href="cadastro.php">Cadastrar</a>
      </div>

      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
