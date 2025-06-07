<?php
include "conexao.php";
session_start();

if (!isset($_GET['id'])) {
    header("Location: ver_servicos.php");
    exit;
}

$servico_id = intval($_GET['id']);

// Buscar dados do serviço
$sql = "SELECT nome, preco FROM servicos WHERE id = $servico_id";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
    echo "Serviço não encontrado.";
    exit;
}

$servico = $result->fetch_assoc();

$dataSelecionada = $_GET['data'] ?? null;

// Horários padrão
$horarios = [
    "08:00", "09:00", "10:00", "11:00",
    "12:00", "13:00", "14:00", "15:00",
    "16:00", "17:00", "18:00"
];

$horariosDisponiveis = [];

if ($dataSelecionada) {
    $sqlAgendados = "SELECT hora FROM agendamentos WHERE data = ?";
    $stmt = $conn->prepare($sqlAgendados);
    $stmt->bind_param("s", $dataSelecionada);
    $stmt->execute();
    $resultHoras = $stmt->get_result();

    $horariosAgendados = [];
    while ($row = $resultHoras->fetch_assoc()) {
        $horariosAgendados[] = substr($row['hora'], 0, 5);
    }

    // Filtrar horários disponíveis
    $horariosDisponiveis = array_diff($horarios, $horariosAgendados);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendar Serviço</title>
    <link rel="stylesheet" href="assets/css/ver.css">
</head>
<body>
    <div class="container">
        <h1>Agendar Serviço</h1>

        <p><strong>Serviço:</strong> <?= htmlspecialchars($servico['nome']) ?></p>
        <p><strong>Preço:</strong> R$ <?= number_format($servico['preco'], 2, ',', '.') ?></p>

        <!-- Escolher Data -->
        <form method="get" action="agendar_servico.php">
            <input type="hidden" name="id" value="<?= $servico_id ?>">
            <label for="data">Escolher Data:</label>
            <input type="date" name="data" id="data" value="<?= htmlspecialchars($dataSelecionada) ?>" required>
            <button type="submit">Ver Horários</button>
        </form>

        <!-- Mostrar horários se uma data foi escolhida -->
        <?php if ($dataSelecionada): ?>
            <h3>Horários disponíveis para <?= htmlspecialchars(date('d/m/Y', strtotime($dataSelecionada))) ?>:</h3>

            <?php if (!empty($horariosDisponiveis)): ?>
                <form method="post" action="processar_agendamento.php">
                    <input type="hidden" name="servico_id" value="<?= $servico_id ?>">
                    <input type="hidden" name="data" value="<?= htmlspecialchars($dataSelecionada) ?>">

                    <label for="hora">Escolha o horário:</label>
                    <select name="hora" id="hora" required>
                        <?php foreach ($horariosDisponiveis as $hora): ?>
                            <option value="<?= $hora ?>"><?= $hora ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit">Confirmar Agendamento</button>
                </form>
            <?php else: ?>
                <p style="color: red;">Todos os horários estão ocupados nesta data. Escolha outro dia.</p>
            <?php endif; ?>
        <?php endif; ?>

        <div class="voltar-menu" style="margin-top: 20px;">
            <a href="ver_servicos.php">← Voltar à Lista</a>
        </div>
    </div>
</body>
</html>
