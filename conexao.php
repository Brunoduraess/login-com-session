<?php
    $dbHost = 'urldoBD'; //URL do banco de dados.
    $dbUsername = 'usario'; //Usuário do banco de dados.
    $dbPassword = 'senha'; //Senha do banco de dados.
    $dbName = 'nomedoBD'; //Nome do banco de dados.
    
    //Váriavel de conexão com o BD. !Informe as variáveis de dados do BD sempre nessa ordem: Host, Username, Password, Name!.
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Caso houver algum erro, ele exibe na tela.
    if($conexao->connect_errno) {
       echo "Erro";
    }  
    else {
       echo "Conexão efetuada";
    }
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>
