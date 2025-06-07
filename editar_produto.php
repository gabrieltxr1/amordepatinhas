<?php
include "conexao.php";
$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];
    $sql = "UPDATE produtos SET nome='$nome', preco='$preco', estoque='$estoque' WHERE id=$id";
    $conn->query($sql);
    header("Location: listar_produtos.php");
}

$sql = "SELECT * FROM produtos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head><title>Editar Produto</title></head>
<body>
    <link rel="stylesheet" href="../assets/css/produtos.css">
    <h1>Editar Produto</h1>
    <form method="post">
        Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>"><br>
        Preço: <input type="text" name="preco" value="<?php echo $row['preco']; ?>"><br>
        Estoque: <input type="number" name="estoque" value="<?php echo $row['estoque']; ?>"><br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="listar_produtos.php">Voltar</a>
</body>
</html>
