<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="assets/css/cadastro.css">
</head>
<body style="background-image: url('assets/img/banner_cat.jpg');">
  <div class="box">
    <form action="processa_cadastro.php" method="POST">
      <h2>Cadastrar</h2>

      <div class="inputBox">
        <input type="text" name="cpf" required>
        <span>CPF</span>
        <i></i>
      </div>

      <div class="inputBox">
        <input type="text" name="nome" required>
        <span>Nome completo</span>
        <i></i>
      </div>

      <div class="inputBox">
        <input type="email" name="email" required>
        <span>E-mail</span>
        <i></i>
      </div>

      <div class="inputBox">
        <input type="text" name="telefone" required>
        <span>Telefone</span>
        <i></i>
      </div>

      <div class="inputBox">
        <input type="password" name="senha" required>
        <span>Senha</span>
        <i></i>
      </div>

      <div class="inputBox">
        <input type="password" name="confirmar_senha" required>
        <span>Confirmar Senha</span>
        <i></i>
      </div>

      <div class="inputBox">
        <label for="tipo" style="color: white;">Tipo de usuário</label>
        <select name="tipo" id="tipo" required style="width: 100%; padding: 10px; background-color: transparent; color: white; border: none; border-bottom: 1px solid white; font-size: 16px;">
          <option value="" disabled selected>Selecione</option>
          <option value="clientes">Cliente</option>
          <option value="secretaria">Secretária</option>
          <option value="administrador">Administrador</option>
        </select>
        <i></i>
      </div>

      <div class="links">
        <a href="login.php">Já tem conta?</a>
      </div>

      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>
