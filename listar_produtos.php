<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="assets/css/produtos.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Produtos</h1>

        <div class="menu-superior">
            <a href="criar_produto.php" class="botao-novo">+ Novo Produto</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM produtos";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nome']}</td>
                        <td>R$ {$row['preco']}</td>
                        <td>{$row['estoque']}</td>
                        <td class='action-links'>
                            <a href='editar_produto.php?id={$row['id']}'>Editar</a>
                            <a href='excluir_produto.php?id={$row['id']}'>Excluir</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="voltar-menu">
            <a href="painel_admin.php">← Voltar ao Menu</a>
        </div>
    </div>
</body>
</html>
