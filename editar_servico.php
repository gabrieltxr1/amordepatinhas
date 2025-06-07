<?php
include "conexao.php";
$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $sql = "UPDATE servicos SET nome='$nome', preco='$preco' WHERE id=$id";
    $conn->query($sql);
    header("Location: listar_servicos.php");
}

$sql = "SELECT * FROM servicos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Serviço</title>
    <link rel="stylesheet" href="../assets/css/produtos.css">
</head>
<body>
    <div class="container">
        <h1>Editar Serviço</h1>
        <form method="post">
            Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
            Preço: <input type="text" name="preco" value="<?php echo $row['preco']; ?>" required>
            <input type="submit" value="Atualizar">
        </form>
        <a href="listar_servicos.php">Voltar</a>
    </div>
</body>
</html>
