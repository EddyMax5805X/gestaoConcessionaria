<?php

    session_start();
    $nome =  $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email'];
    $perfil = $_SESSION['perfil'];

include_once("../Controller/controllerVeiculo.php");
include_once("../../conexao.php");
include_once(__DIR__ ."/../../Auditoria/Controller/metodos.php");
include_once(__DIR__ ."/../../Auditoria/Controller/Auditoria.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idVeiculo = $_GET['id'];

    $sql = "SELECT * FROM veiculo WHERE ID = $idVeiculo";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $row = mysqli_fetch_assoc($resultado);

        $valores_anteriores = "marca: {$row['marca']}, modelo: {$row['modelo']}, ano: {$row['ano']}, ";
        $valores_anteriores .= "preco: {$row['preco']}, status: {$row['status']}, descricao: {$row['descricao']}, ";
        $valores_anteriores .= "chassi: {$row['chassi']}, cor: {$row['cor']}, cilindrada: {$row['cilindrada']}, ";
        $valores_anteriores .= "transmissao: {$row['transmissao']}, numeroChassi: {$row['numeroChassi']}, ";
        $valores_anteriores .= "quilometragem: {$row['quilometragem']}, combustivel: {$row['combustivel']}";
        
        $valores_novos = "---"; 

        $usuario = $nome . " " . $sobrenome;
        $acao = "Remover";
        $tabela = "veiculo";
        $idRegistro = $idVeiculo;

        $auditoria = new Auditoria(
            $idVeiculo,        
            $usuario,             
            $perfil,            
            $acao,                 
            $tabela,             
            $idRegistro,          
            $valores_anteriores,  
            $valores_novos,       
            null                 
        );
        removeVeiculo($idVeiculo, $auditoria);
    } else {
        echo "<script>alert('Veículo não encontrado.')</script>";
    }
} else {
    echo "<script>alert('Requisição inválida.')</script>";
}
?>