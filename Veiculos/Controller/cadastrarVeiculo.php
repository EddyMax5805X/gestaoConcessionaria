<?php
session_start();
$nome = $_SESSION['nome'] ?? '';
$sobrenome = $_SESSION['sobrenome'] ?? '';
$perfil = $_SESSION['perfil'] ?? '';

include_once("../Controller/controllerVeiculo.php");
include_once("../Controller/veiculo.php");
include_once("../../conexao.php");
include_once("../../Auditoria/Controller/Auditoria.php");

if (isset($_POST['submit'])) {
    $marca = $conexao->real_escape_string($_POST['marca']);
    $modelo = $conexao->real_escape_string($_POST['modelo']);
    $ano = $conexao->real_escape_string($_POST['ano']);
    $preco = $conexao->real_escape_string($_POST['preco']);
    $status = $conexao->real_escape_string($_POST['status']);
    $chassi = $conexao->real_escape_string($_POST['chassi']);
    $cor = $conexao->real_escape_string($_POST['cor']);
    $cilindrada = $conexao->real_escape_string($_POST['cilindrada']);
    $transmissao = $conexao->real_escape_string($_POST['transmissao']);
    $numeroChassi = $conexao->real_escape_string($_POST['numeroChassi']);
    $quilometragem = $conexao->real_escape_string($_POST['quilometragem']);
    $combustivel = $conexao->real_escape_string($_POST['combustivel']);
    $desc = $conexao->real_escape_string($_POST['desc']);

        $usuario = $nome . " " . $sobrenome;
        $acao = "Cadastro";
        $tabela = "veiculo";
        $idRegistro = null;
        $valores_anteriores = "---";
        
        $valores_novos = "marca: $marca, modelo: $modelo, ano: $ano, preco: $preco, ";
        $valores_novos .= "status: $status, descricao: $desc, chassi: $chassi, cor: $cor, ";
        $valores_novos .= "cilindrada: $cilindrada, transmissao: $transmissao, ";
        $valores_novos .= "numeroChassi: $numeroChassi, quilometragem: $quilometragem, ";
        $valores_novos .= "combustivel: $combustivel";

        $auditoria = new Auditoria(
            null,                   
            $usuario,             
            $perfil,               
            $acao,                 
            $tabela,               
            $idRegistro,           
            $valores_anteriores,   
            $valores_novos,        
            null                   
        );

        $veiculo = new Veiculo(
            null,          
            $marca,
            $modelo,
            $ano,
            $preco,
            $status,
            $desc,
            $chassi,
            $cor,
            $cilindrada,
            $transmissao,
            $numeroChassi,
            $quilometragem,
            $combustivel
        );

        addVeiculo($veiculo, $auditoria);
    }
?>