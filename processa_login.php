<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarios = [
        ['tabela' => 'clientes', 'tipo' => 'cliente', 'redirect' => 'painel_user.php'],
        ['tabela' => 'secretaria', 'tipo' => 'secretaria', 'redirect' => 'painel.php'],
        ['tabela' => 'administrador', 'tipo' => 'admin', 'redirect' => 'painel_admin.php'],
    ];

    foreach ($usuarios as $usuario) {
        $stmt = $conn->prepare("SELECT id, nome, senha FROM {$usuario['tabela']} WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $nome, $senha_banco);
            $stmt->fetch();

            if ($senha === $senha_banco) { // Se você usar senha hash, mude para password_verify
                $_SESSION['usuario_id'] = $id;
                $_SESSION['usuario_nome'] = $nome;
                $_SESSION['usuario_email'] = $email;
                $_SESSION['usuario_tipo'] = $usuario['tipo']; // salva o tipo (cliente, secretaria, admin)

                $stmt->close();
                $conn->close();

                header("Location: {$usuario['redirect']}");
                exit;
            } else {
                $_SESSION['erro'] = "Senha incorreta.";
                $stmt->close();
                $conn->close();
                header("Location: login.php");
                exit;
            }
        }

        $stmt->close(); // continua para a próxima tabela
    }

    // Se não encontrou em nenhuma tabela
    $_SESSION['erro'] = "E-mail não encontrado.";
    header("Location: login.php");
    exit;
}
?>
