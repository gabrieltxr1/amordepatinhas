<?php
include "conexao.php";

$dataSelecionada = $_GET['data'] ?? date('Y-m-d');

// Horários padrão (você pode mudar para meia em meia hora se quiser)
$horarios = [
    "08:00", "09:00", "10:00", "11:00",
    "12:00", "13:00", "14:00", "15:00",
    "16:00", "17:00", "18:00"
];

// Consulta agendamentos do dia
$sql = "SELECT hora FROM agendamentos WHERE data = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $dataSelecionada);
$stmt->execute();
$result = $stmt->get_result();

$horariosAgendados = [];
while ($row = $result->fetch_assoc()) {
    $horariosAgendados[] = substr($row['hora'], 0, 5); // pega apenas HH:MM
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Horários Agendados</title>
    <link rel="stylesheet" href="assets/css/ver.css">
    <style>
        table { width: 50%; margin-top: 20px; }
        th, td { text-align: center; padding: 8px; }
        .disponivel { color: green; font-weight: bold; }
        .indisponivel { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Horários do Dia <?= date('d/m/Y', strtotime($dataSelecionada)) ?></h1>

        <form method="GET">
            <label for="data">Escolher outra data:</label>
            <input type="date" name="data" id="data" value="<?= htmlspecialchars($dataSelecionada) ?>" required>
            <button type="submit">Ver</button>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>Horário</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($horarios as $hora): ?>
                    <tr>
                        <td><?= $hora ?></td>
                        <td class="<?= in_array($hora, $horariosAgendados) ? 'indisponivel' : 'disponivel' ?>">
                            <?= in_array($hora, $horariosAgendados) ? 'Indisponível' : 'Disponível' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="voltar-menu" style="margin-top: 20px;">
            <a href="painel_user.php">← Voltar ao Menu</a>
        </div>
    </div>
</body>
</html>
