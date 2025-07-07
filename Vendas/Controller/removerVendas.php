<?php 
    session_start();

    $nome =  $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email'];
    $perfil = $_SESSION['perfil'];

    include_once("../Controller/ControllerVendas.php");
    include_once(__DIR__ ."/../../Auditoria/Controller/Auditoria.php");
    include_once(__DIR__ ."/../../Auditoria/Controller/metodos.php");
    include_once(__DIR__ ."/../../conexao.php");

    $code = $_GET['id'];

    $venda = searchVendas($code);

    $usuario = $_SESSION['nome'] . " " . $_SESSION['sobrenome'];
    $perfil = $_SESSION['perfil'];
    $acao = "Remover";
    $tabela = "Venda";
    $idRegistro = $venda->getId();
    $valores_anteriores = "----------";
    $valores_novos = "--------";

      $auditoria = new Auditoria(null, $usuario, $perfil, $acao, $tabela, $idRegistro,
        $valores_anteriores, $valores_novos, null);

    removerVendas($code, $auditoria);
?>