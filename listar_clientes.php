<?php
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="assets/css/produtos.css">
</head>
<body>
<div class="container">
    <h1>Clientes</h1>
    <a href="criar_cliente.php">Novo Cliente</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>CPF</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Pets Registrados</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $clientes = $conn->query("SELECT * FROM clientes");

            while ($cliente = $clientes->fetch_assoc()):
                $cliente_id = $cliente['id'];

                
                $pets = $conn->query("SELECT nome, especie, raca FROM animal WHERE cliente_id = $cliente_id");
                $lista_pets = [];

                while ($pet = $pets->fetch_assoc()) {
                    $lista_pets[] = "{$pet['nome']} ({$pet['especie']} - {$pet['raca']})";
                }

                $pets_formatados = count($lista_pets) > 0 ? implode("<br>", $lista_pets) : "Nenhum pet registrado";
            ?>
            <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= htmlspecialchars($cliente['cpf']) ?></td>
                <td><?= htmlspecialchars($cliente['nome']) ?></td>
                <td><?= htmlspecialchars($cliente['email']) ?></td>
                <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                <td><?= $pets_formatados ?></td>
                <td>
                    <a href="editar_cliente.php?id=<?= $cliente['id'] ?>">Editar</a> |
                    <a href="excluir_cliente.php?id=<?= $cliente['id'] ?>">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="voltar-menu">
        <a href="painel_admin.php">← Voltar ao Menu</a>
    </div>
</div>
</body>
</html>
