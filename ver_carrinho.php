<?php
session_start();
$carrinho = $_SESSION['carrinho'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Seu Carrinho</title>
    <link rel="stylesheet" href="assets/css/ver.css">
</head>
<body>
<div class="container">
    <h1>Carrinho de Compras</h1>
    <?php if (!empty($carrinho)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalGeral = 0;
                foreach ($carrinho as $item) {
                    $subtotal = $item['preco'] * $item['quantidade'];
                    $totalGeral += $subtotal;
                    echo "<tr>
                        <td>" . htmlspecialchars($item['nome']) . "</td>
                        <td>R$ " . number_format($item['preco'], 2, ',', '.') . "</td>
                        <td>" . $item['quantidade'] . "</td>
                        <td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>
                    </tr>";
                }
                ?>
                <tr>
                    <td colspan="3"><strong>Total Geral</strong></td>
                    <td><strong>R$ <?= number_format($totalGeral, 2, ',', '.') ?></strong></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p>O carrinho está vazio.</p>
    <?php endif; ?>
    <br>
    <a href="ver_produtos.php">← Continuar comprando</a>
</div>
</body>
</html>
