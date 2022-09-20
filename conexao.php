<?php
    $dbHost = 'urldoBD';
    $dbUsername = 'usario';
    $dbPassword = 'senha';
    $dbName = 'nomedoBD';
    

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if($conexao->connect_errno) {
       echo "Erro";
    }  
    else {
       echo "Conexão efetuada";
    }
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>