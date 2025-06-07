<?php
include "conexao.php";

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$sql = "INSERT INTO clientes (cpf, nome, email, telefone, senha)
        VALUES ('$cpf', '$nome', '$email', '$telefone', '$senha')";

if ($conn->query($sql) === TRUE) {
    header("Location: listar_clientes.php");
} else {
    echo "Erro: " . $conn->error;
}
?>
