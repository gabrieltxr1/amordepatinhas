<?php
include "conexao.php";

$id = $_POST['id'];
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$sql = "UPDATE clientes SET cpf='$cpf', nome='$nome', email='$email', telefone='$telefone'";

if (!empty($senha)) {
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $sql .= ", senha='$senhaHash'";
}

$sql .= " WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: listar_clientes.php");
} else {
    echo "Erro: " . $conn->error;
}
?>
