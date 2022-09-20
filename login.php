<?php
include('conexao.php');

if (isset($_POST['logar'])) {

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tabela_do_seu_banco WHERE nome = '$nome' LIMIT 1";
    $sql_query = $conexao->query($sql) or die("Falha na execução do código SQL");

    $row = $sql_query->fetch_assoc();

    if (password_verify($senha, $row['senha'])) {
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario[utf8_encode('nome')];

        header("location: alguma_pagina.php");
    } else {
        echo "<script>
                alert('Falha ao logar! nome ou senha incorretos.')
              </script>";
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
</head>

<body>

    <form method="POST" action="login.php">

        <p>Login</p>

        <label>Usuário:</label>
        <input type="text" name="nome" id="nome">

        <label>Senha:</label>
        <input type="password" name="senha" id="senha">

        <input type="submit" name="logar" id="logar" value="Logar">

    </form>
</body>

</html>