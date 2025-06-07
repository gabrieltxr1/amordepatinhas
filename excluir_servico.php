<?php
include "conexao.php";
$id = $_GET["id"];
$sql = "DELETE FROM servicos WHERE id=$id";
$conn->query($sql);
header("Location: listar_servicos.php");
?>
