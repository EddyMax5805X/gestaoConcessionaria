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
        
        if (empty($marca) or empty($modelo) or empty($ano) or empty($preco) or empty($status) or empty($desc)) {
            echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        } else {
            $veiculo = new Veiculo(null, $marca, $modelo, $ano, $preco, $status, $desc);
            addVeiculo($veiculo);
        }
    }
?>