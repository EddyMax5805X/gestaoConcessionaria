<?php
include_once("../Controller/controllerVeiculo.php");

if (isset($_POST['submit'])) {
    $code = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $status = $_POST['status'];
    $desc = $_POST['desc'];
    $chassi = $_POST['chassi'];
    $cor = $_POST['cor'];
    $cilindrada = $_POST['cilindrada'];
    $transmissao = $_POST['transmissao'];
    $numeroChassi = $_POST['numeroChassi'];
    $quilometragem = $_POST['quilometragem'];
    $combustivel = $_POST['combustivel'];

    if (
        empty($code) or empty($marca) or empty($modelo) or empty($ano) or empty($preco)
        or empty($status) or empty($desc) or empty($chassi) or empty($cor) or empty($cilindrada) or empty($transmissao)
        or empty($numeroChassi) or empty($quilometragem) or empty($combustivel)
    ) {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
    } else {
        $veiculo = new Veiculo($code, $marca, $modelo, $ano, $preco, $status, $desc, 
        $chassi, $cor, $cilindrada, $transmissao, $numeroChassi, $quilometragem, $combustivel);
        updateVeiculo($veiculo);
    }
}
