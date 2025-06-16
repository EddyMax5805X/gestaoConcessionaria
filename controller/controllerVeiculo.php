<?php 
    include_once('..\..\model\veiculo.php');

    $conexao = new mysqli('localhost', 'root', '', 'gestao_concessionaria', 3306);

    function addVeiculo($veiculo) {
        global $conexao;
        $cod = $veiculo->getID();
        $sql = "SELECT * FROM veiculo WHERE id='$cod'";
        $result = mysqli_query($conexao, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<script>alert('ERRO! Já existe um veículo com o código: $cod!')</script>";
        } else {
            $marca = $veiculo->getMarca();
            $modelo = $veiculo->getModelo();
            $ano = $veiculo->getAno();
            $status = $veiculo->getStatus();
            $desc = $veiculo->getDescricao();
            $preco = $veiculo->getPreco();
            $sql = "INSERT INTO veiculo VALUES ($cod, '$marca', '$modelo', $ano, $preco, '$status', '$desc')";
            $result = mysqli_query($conexao, $sql);
            if ($result) {
                echo "<script> alert('Veiculo inserido com sucesso!')</script>";
                include '..\..\view\veiculo\listarVeiculo.php';
            } else {
                    echo "<script> alert('ERRO na insercao do Veiculo!')</script>";
            }
        }
    }
    function listOfVeiculos() {
        global $conexao;
        $veiculos = array();
        $sql = "SELECT * FROM veiculo";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            while($rs = mysqli_fetch_assoc($result)) {
                $carro = new Veiculo($rs['ID'], $rs['marca'], $rs['modelo'], $rs['ano'], $rs['preco'], $rs['status'], $rs['descricao']);
                array_push($veiculos, $carro);
            }
        }
        return $veiculos;
    }
    function searchVeiculo($id) { //Procura e retorna um veiculo na base de dados que tenha um id igual ao recebido pelo parametro
        global $conexao;
        $sql = "SELECT * FROM veiculo WHERE id=$id";
        $result = mysqli_query($conexao, $sql);
        $rs = mysqli_fetch_assoc($result);
        $veiculo = new Veiculo($rs['ID'], $rs['marca'], $rs['modelo'], $rs['ano'], $rs['preco'], $rs['status'], $rs['descricao']);
        return $veiculo;
    }
    function updateVeiculo($veiculo) {
        global $conexao;
        $id = $veiculo->getID();
        $marca = $veiculo->getMarca();
        $modelo = $veiculo->getModelo();
        $ano = $veiculo->getAno();
        $preco = $veiculo->getPreco();
        $status = $veiculo->getStatus();
        $desc = $veiculo->getDescricao();
        $sql = "UPDATE veiculo SET marca='$marca', modelo='$modelo', ano=$ano, preco=$preco, status='$status', descricao='$desc' WHERE id=$id";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            echo "<script>alert('Veículo nº{$id} atualizado com sucesso!')</script>";
            include '..\..\view\veiculo\listarVeiculo.php';
        } else {
            echo "<script>alert('Erro na atualização do veículo!')</script>";
            include '..\..\view\veiculo\listarVeiculo.php';
        } 
    }
    function removeVeiculo($id) {
        global $conexao;
        $sql = "DELETE FROM veiculo WHERE id=$id";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            echo "<script>alert('Veículo removido com sucesso!')</script>";
            include '..\..\view\veiculo\listarVeiculo.php';
        } else {
            echo "<script>alert('Erro na remoção do veículo!')</script>";
            include '..\..\view\veiculo\listarVeiculo.php';
        } 
    }
?>