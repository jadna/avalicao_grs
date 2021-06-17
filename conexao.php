<?php

    //mysql://bc9f1bb91881e9:20028330@us-cdbr-east-03.cleardb.com/heroku_05eab3fa1dd0708?reconnect=true
    
    $servidor = "us-cdbr-east-03.cleardb.com";
    $usuario = "bc9f1bb91881e9";
    $senha = "20028330";
    $dbname = "heroku_05eab3fa1dd0708";

    $mysqli = mysqli_connect($servidor, $usuario, $senha, $dbname);
    //$mysqli = mysqli_connect("localhost", "root", "", "avaliacao_grs");
    
    if (!$mysqli) {
        echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    //echo "Sucesso: Sucesso ao conectar-se com a base de dados MySQL." . PHP_EOL;
    
    //mysqli_close($mysqli);
?>