<?php
include "conexao.php";
$id = $_GET['id'];
$sql = "DELETE FROM clientes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: listar_clientes.php");
} else {
    echo "Erro: " . $conn->error;
}
?>
