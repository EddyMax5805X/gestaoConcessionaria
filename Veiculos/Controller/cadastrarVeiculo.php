<?php 
    include_once("../Controller/controllerVeiculo.php");
    include_once("../Controller/veiculo.php");

    if (isset($_POST['submit'])) {
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
        //$quilometragem = $_POST['quilometragem'];
        $combustivel = $_POST['combustivel'];


        
        if (empty($marca) or empty($modelo) or empty($ano) or empty($preco) or empty($status) or empty($desc)
         or empty($chassi) or empty($cor) or empty($cilindrada) or empty($transmissao) or empty($numeroChassi) or empty($combustivel) ) {
            echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        } else {
            $veiculo = new Veiculo(null, $marca, $modelo, $ano, $preco, $status, $desc,$chassi,$cor,
            $cilindrada,$transmissao,$numeroChassi, null, $combustivel);
            addVeiculo($veiculo);
        }
    }
?>