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

    // Primeiro obtém os dados do veículo que será removido
    $sql = "SELECT * FROM veiculo WHERE ID = $idVeiculo";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $row = mysqli_fetch_assoc($resultado);
        
        // Prepara os dados do veículo para auditoria
        $valores_anteriores = "marca: {$row['marca']}, modelo: {$row['modelo']}, ano: {$row['ano']}, ";
        $valores_anteriores .= "preco: {$row['preco']}, status: {$row['status']}, descricao: {$row['descricao']}, ";
        $valores_anteriores .= "chassi: {$row['chassi']}, cor: {$row['cor']}, cilindrada: {$row['cilindrada']}, ";
        $valores_anteriores .= "transmissao: {$row['transmissao']}, numeroChassi: {$row['numeroChassi']}, ";
        $valores_anteriores .= "quilometragem: {$row['quilometragem']}, combustivel: {$row['combustivel']}";
        
        $valores_novos = "---"; // Para remoção, os novos valores são "---"

        // Prepara dados do usuário para auditoria
        $usuario = $nome_S . " " . $sobrenome_S;
        $acao = "Remover";
        $tabela = "veiculo";
        $idRegistro = $idVeiculo;

        // Cria o objeto de auditoria
        $auditoria = new Auditoria(
            $idVeiculo,            // ID do registro afetado
            $usuario,              // Nome do usuário
            $perfil_S,             // Perfil do usuário
            $acao,                 // Ação realizada
            $tabela,               // Tabela afetada
            $idRegistro,           // ID do registro (mesmo que o primeiro parâmetro)
            $valores_anteriores,   // Valores antes da remoção
            $valores_novos,        // Valores após a remoção ("---")
            null                   // Data/hora (pode ser preenchido automaticamente)
        );

        // Chama a função para remover o veículo passando o ID e a auditoria
        removeVeiculo($idVeiculo, $auditoria);
    } else {
        echo "<script>alert('Veículo não encontrado.')</script>";
    }
} else {
    echo "<script>alert('Requisição inválida.')</script>";
}
?>