<?php
include "conexao.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];

    $sql = "INSERT INTO servicos (nome, preco) VALUES ('$nome', '$preco')";
    $conn->query($sql);
    header("Location: listar_servicos.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Novo Serviço</title>
    <link rel="stylesheet" href="../assets/css/produtos.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Serviço</h1>
        <form method="post">
            Nome: <input type="text" name="nome" required>
            Preço: <input type="text" name="preco" required>
            <input type="submit" value="Salvar">
        </form>
        <a href="listar_servicos.php">Voltar</a>
    </div>
</body>
</html>
