<?php
include "conexao.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servico_id = intval($_POST['servico_id']);
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    // Verifica se horário já está agendado
    $verificaSql = "SELECT id FROM agendamentos WHERE data = ? AND hora = ?";
    $stmt = $conn->prepare($verificaSql);
    $stmt->bind_param("ss", $data, $hora);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<p style='color:red;'>Esse horário já foi agendado. Por favor, volte e escolha outro.</p>";
        echo "<p><a href='javascript:history.back()'>← Voltar</a></p>";
        exit;
    }

    // Inserção segura
    $sql = "INSERT INTO agendamentos (servico_id, data, hora) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $servico_id, $data, $hora);

    if ($stmt->execute()) {
        echo "<p>Agendamento realizado com sucesso!</p>";
        echo "<p><a href='ver_servicos.php'>← Voltar para os serviços</a></p>";
    } else {
        echo "<p>Erro ao agendar: " . $conn->error . "</p>";
    }
} else {
    header("Location: ver_servicos.php");
    exit;
}
?>
