<?php
include('conexao.php'); //chama o arquivo de conexão com o BD

if (isset($_POST['logar'])) { //Caso exista um post do formulário, ele realiza as condições abaixo

    //váriáveis recebendo valor vindo do formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    //extraindo dados do BD. Usei o nome para consultar um registro específico e o LIMIT para trazer apenas 1 resultado.
    $sql = "SELECT * FROM tabela_do_seu_banco WHERE nome = '$nome' LIMIT 1";
    $sql_query = $conexao->query($sql) or die("Falha na execução do código SQL");

    $row = $sql_query->fetch_assoc();

    if (password_verify($senha, $row['senha'])) { //compara a senha informada no formulário com a senha criptografada gravada no BD.
        if (!isset($_SESSION)) {  //Inicia uma sessão caso não exista uma.
            session_start();
        }

        $_SESSION['id'] = $usuario['id']; //Recebe o ID do usuário que iniciou a sessão.
        $_SESSION['nome'] = $usuario[utf8_encode('nome')]; //Recebe o nome do usuário que iniciou a sessão. Uso o UTF8_encode para formatar o nome no padrão UTF-8.

        header("location: alguma_pagina.php"); //Carrega a página seguinte do login.
    } else { //Caso as senhas comparadas não sejam iguais, um aviso é exibido.
        
        //Uso do JS no PHP para exibir um alerta.
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
