<?php
include "conexao.php";

$cliente_id = $_POST['cliente_id'];
$nome = $_POST['nome'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];

$sql = "INSERT INTO animal (nome, especie, raca, cliente_id)
        VALUES ('$nome', '$especie', '$raca', $cliente_id)";

if ($conn->query($sql) === TRUE) {
    header("Location: editar_cliente.php?id=$cliente_id");
} else {
    echo "Erro ao cadastrar animal: " . $conn->error;
}
?>
