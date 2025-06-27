<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $host = "localhost";
    $user  = "root";
    $pass = "";
    $dbname = "gestao_concessionaria";
    $port = 3306;

    $conexao = mysqli_connect($host, $user, $pass, $dbname, $port);

    if($conexao -> connect_error) {
        echo "Conexao Mysql Falhou: ", $conexao -> connect_error;
    }
?>