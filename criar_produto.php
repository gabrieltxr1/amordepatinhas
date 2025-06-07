<?php
include "conexao.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];

    $sql = "INSERT INTO produtos (nome, preco, estoque) VALUES ('$nome', '$preco', '$estoque')";
    $conn->query($sql);
    header("Location: listar_produtos.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Novo Produto</title></head>
<body>
    <link rel="stylesheet" href="../assets/css/produtos.css">
    <h1>Adicionar Produto</h1>
    <form method="post">
        Nome: <input type="text" name="nome"><br>
        Preço: <input type="text" name="preco"><br>
        Estoque: <input type="number" name="estoque"><br>
        <input type="submit" value="Salvar">
    </form>
    <a href="listar_produtos.php">Voltar</a>
</body>
</html>
