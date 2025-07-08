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
    // Recebe e sanitiza os dados do formulário
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
    $desc = $conexao->real_escape_string($_POST['descricao']);

    // Valida campos obrigatórios
        // Prepara os dados para auditoria
        $usuario = $nome . " " . $sobrenome;
        $acao = "Cadastro";
        $tabela = "veiculo";
        $idRegistro = null;
        $valores_anteriores = "---";
        
        // Formata os novos valores para auditoria
        $valores_novos = "marca: $marca, modelo: $modelo, ano: $ano, preco: $preco, ";
        $valores_novos .= "status: $status, descricao: $desc, chassi: $chassi, cor: $cor, ";
        $valores_novos .= "cilindrada: $cilindrada, transmissao: $transmissao, ";
        $valores_novos .= "numeroChassi: $numeroChassi, quilometragem: $quilometragem, ";
        $valores_novos .= "combustivel: $combustivel";

        // Cria o objeto de auditoria
        $auditoria = new Auditoria(
            null,                   // ID da auditoria (auto-increment)
            $usuario,              // Nome do usuário
            $perfil,               // Perfil do usuário
            $acao,                 // Ação realizada
            $tabela,               // Tabela afetada
            $idRegistro,           // ID do registro (null para cadastro)
            $valores_anteriores,   // Valores anteriores ("---" para cadastro)
            $valores_novos,        // Valores novos
            null                   // D
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