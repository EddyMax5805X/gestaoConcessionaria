<?php 
    include_once("..\..\controller\controllerVeiculo.php");

    if (isset($_POST['submit'])) {
        $code = $_POST['id'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $preco = $_POST['preco'];
        $tipo = $_POST['tipo'];
        $data = $_POST['data'];
        $status = $_POST['status'];
        $desc = $_POST['desc'];
        
        if (empty($code) or empty($marca) or empty($modelo) or empty($ano) or empty($preco) or empty($tipo) or empty($data) or empty($status) or empty($desc)) {
            echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        } else {
            $veiculo = new Veiculo($code, $marca, $modelo, $ano, $status, $desc ,$preco, $tipo, $data);
            addVeiculo($veiculo);
        }
    }
?>