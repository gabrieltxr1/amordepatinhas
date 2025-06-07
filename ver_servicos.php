<?php include "conexao.php"; session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Serviços Disponíveis</title>
    <link rel="stylesheet" href="assets/css/ver.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Serviços</h1>

        <form method="GET" class="filtro-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($_GET['nome'] ?? '') ?>">

            <label for="preco_min">Preço Mínimo:</label>
            <input type="number" name="preco_min" id="preco_min" step="0.01" value="<?= htmlspecialchars($_GET['preco_min'] ?? '') ?>">

            <label for="preco_max">Preço Máximo:</label>
            <input type="number" name="preco_max" id="preco_max" step="0.01" value="<?= htmlspecialchars($_GET['preco_max'] ?? '') ?>">

            <button type="submit">Filtrar</button>
            <a href="?" style="margin-left:10px;">Limpar</a>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nome = $_GET['nome'] ?? '';
                $preco_min = $_GET['preco_min'] ?? '';
                $preco_max = $_GET['preco_max'] ?? '';

                $sql = "SELECT id, nome, preco FROM servicos WHERE 1 = 1";

                if (!empty($nome)) {
                    $nome = $conn->real_escape_string($nome);
                    $sql .= " AND nome LIKE '%$nome%'";
                }

                if (is_numeric($preco_min)) {
                    $sql .= " AND preco >= " . floatval($preco_min);
                }

                if (is_numeric($preco_max)) {
                    $sql .= " AND preco <= " . floatval($preco_max);
                }

                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['nome']) . "</td>
                            <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
                            <td>
                                <form method='get' action='agendar_servico.php'>
                                    <input type='hidden' name='id' value='" . intval($row['id']) . "'>
                                    <button type='submit'>Agendar</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum serviço encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="voltar-menu">
            <a href="painel_user.php">← Voltar ao Menu</a>
        </div>
    </div>
</body>
</html>
