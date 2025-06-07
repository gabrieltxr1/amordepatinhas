<?php
include "conexao.php";
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos Disponíveis</title>
    <link rel="stylesheet" href="assets/css/ver.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Produtos</h1>

        <div class="voltar-menu" style="margin-bottom: 15px;">
            <a href="ver_carrinho.php">🛒 Ver Carrinho</a> |
            <a href="painel_user.php">← Voltar ao Menu</a>
        </div>

        <form method="GET" class="filtro-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($_GET['nome'] ?? '') ?>">

            <label for="preco_min">Preço Mínimo:</label>
            <input type="number" step="0.01" name="preco_min" id="preco_min" value="<?= htmlspecialchars($_GET['preco_min'] ?? '') ?>">

            <label for="preco_max">Preço Máximo:</label>
            <input type="number" step="0.01" name="preco_max" id="preco_max" value="<?= htmlspecialchars($_GET['preco_max'] ?? '') ?>">

            <label for="estoque_min">Estoque Mínimo:</label>
            <input type="number" name="estoque_min" id="estoque_min" value="<?= htmlspecialchars($_GET['estoque_min'] ?? '') ?>">

            <button type="submit">Filtrar</button>
            <a href="?" style="margin-left: 10px;">Limpar</a>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nome = $_GET['nome'] ?? '';
                $preco_min = $_GET['preco_min'] ?? '';
                $preco_max = $_GET['preco_max'] ?? '';
                $estoque_min = $_GET['estoque_min'] ?? '';

                $sql = "SELECT nome, preco, estoque FROM produtos WHERE 1 = 1";

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

                if (is_numeric($estoque_min)) {
                    $sql .= " AND estoque >= " . intval($estoque_min);
                }

                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['nome']) . "</td>
                            <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
                            <td>" . intval($row['estoque']) . "</td>
                            <td>
                                <form method='post' action='adicionar_carrinho.php'>
                                    <input type='hidden' name='nome' value='" . htmlspecialchars($row['nome'], ENT_QUOTES) . "'>
                                    <input type='hidden' name='preco' value='" . floatval($row['preco']) . "'>
                                    <input type='hidden' name='estoque' value='" . intval($row['estoque']) . "'>
                                    <button type='submit'>Adicionar ao Carrinho</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum produto encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
