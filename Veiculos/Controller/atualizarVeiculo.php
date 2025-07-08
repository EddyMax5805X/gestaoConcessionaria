<?php 
session_start();

$nomeS = $_SESSION['nome'];
$sobrenomeS = $_SESSION['sobrenome'];
$emailS = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

include_once("../Controller/controllerVeiculo.php");
include_once("../../conexao.php");
include_once(__DIR__ ."/../../Auditoria/Controller/metodos.php");
include_once(__DIR__ ."/../../Auditoria/Controller/Auditoria.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $status = $_POST['status'];
    $descricao = $_POST['descricao'];
    $chassi = $_POST['chassi'];
    $cor = $_POST['cor'];
    $cilindrada = $_POST['cilindrada'];
    $transmissao = $_POST['transmissao'];
    $numeroChassi = $_POST['numeroChassi'];
    $quilometragem = $_POST['quilometragem'];
    $combustivel = $_POST['combustivel'];

    if (empty($id) || empty($marca) || empty($modelo) || empty($ano) || empty($preco) || 
        empty($status) || empty($descricao) || empty($chassi) || empty($cor) || 
        empty($cilindrada) || empty($transmissao) || empty($numeroChassi) || 
        empty($quilometragem) || empty($combustivel)) {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        exit();
    }

    $sql = "SELECT * FROM veiculo WHERE ID = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        
        $marca_Anterior = $row['marca'];
        $modelo_Anterior = $row['modelo'];
        $ano_Anterior = $row['ano'];
        $preco_Anterior = $row['preco'];
        $status_Anterior = $row['status'];
        $descricao_Anterior = $row['descricao'];
        $chassi_Anterior = $row['chassi'];
        $cor_Anterior = $row['cor'];
        $cilindrada_Anterior = $row['cilindrada'];
        $transmissao_Anterior = $row['transmissao'];
        $numeroChassi_Anterior = $row['numeroChassi'];
        $quilometragem_Anterior = $row['quilometragem'];
        $combustivel_Anterior = $row['combustivel'];
    } else {
        echo "<script>alert('Veículo não encontrado.')</script>";
        exit();
    }

    $texto_Anterior = "";
    $texto_Actual = "";

    if ($marca_Anterior != $marca) {
        $texto_Anterior .= "Marca: $marca_Anterior, ";
        $texto_Actual .= "Marca: $marca, ";
    }
    if ($modelo_Anterior != $modelo) {
        $texto_Anterior .= "Modelo: $modelo_Anterior, ";
        $texto_Actual .= "Modelo: $modelo, ";
    }
    if ($ano_Anterior != $ano) {
        $texto_Anterior .= "Ano: $ano_Anterior, ";
        $texto_Actual .= "Ano: $ano, ";
    }
    if ($preco_Anterior != $preco) {
        $texto_Anterior .= "Preço: $preco_Anterior, ";
        $texto_Actual .= "Preço: $preco, ";
    }
    if ($status_Anterior != $status) {
        $texto_Anterior .= "Status: $status_Anterior, ";
        $texto_Actual .= "Status: $status, ";
    }
    if ($descricao_Anterior != $descricao) {
        $texto_Anterior .= "Descrição: $descricao_Anterior, ";
        $texto_Actual .= "Descrição: $descricao, ";
    }
    if ($chassi_Anterior != $chassi) {
        $texto_Anterior .= "Chassi: $chassi_Anterior, ";
        $texto_Actual .= "Chassi: $chassi, ";
    }
    if ($cor_Anterior != $cor) {
        $texto_Anterior .= "Cor: $cor_Anterior, ";
        $texto_Actual .= "Cor: $cor, ";
    }
    if ($cilindrada_Anterior != $cilindrada) {
        $texto_Anterior .= "Cilindrada: $cilindrada_Anterior, ";
        $texto_Actual .= "Cilindrada: $cilindrada, ";
    }
    if ($transmissao_Anterior != $transmissao) {
        $texto_Anterior .= "Transmissão: $transmissao_Anterior, ";
        $texto_Actual .= "Transmissão: $transmissao, ";
    }
    if ($numeroChassi_Anterior != $numeroChassi) {
        $texto_Anterior .= "Nº Chassi: $numeroChassi_Anterior, ";
        $texto_Actual .= "Nº Chassi: $numeroChassi, ";
    }
    if ($quilometragem_Anterior != $quilometragem) {
        $texto_Anterior .= "Quilometragem: $quilometragem_Anterior, ";
        $texto_Actual .= "Quilometragem: $quilometragem, ";
    }
    if ($combustivel_Anterior != $combustivel) {
        $texto_Anterior .= "Combustível: $combustivel_Anterior";
        $texto_Actual .= "Combustível: $combustivel";
    }

    // Remove a vírgula final se existir
    $texto_Anterior = rtrim($texto_Anterior, ", ");
    $texto_Actual = rtrim($texto_Actual, ", ");

    // Prepara dados para auditoria
    $usuario = $nomeS . " " . $sobrenomeS;
    $acao = "Atualizar";
    $tabela = "veiculo";
    $idRegistro = $id;

    // Cria objeto de auditoria
    $auditoria = new Auditoria(
        null,                  
        $usuario,              // Nome do usuário
        $perfil,               // Perfil do usuário
        $acao,                 // Ação realizada
        $tabela,               // Tabela afetada
        $idRegistro,           // ID do registro alterado
        $texto_Anterior,       // Valores anteriores
        $texto_Actual,         // Valores novos
        null                   // Data/hora (pode ser preenchido automaticamente)
    );

    $veiculo = new Veiculo(
        $id,
        $marca,
        $modelo,
        $ano,
        $preco,
        $status,
        $descricao,
        $chassi,
        $cor,
        $cilindrada,
        $transmissao,
        $numeroChassi,
        $quilometragem,
        $combustivel
    );

    updateVeiculo($veiculo, $auditoria);
}
?>