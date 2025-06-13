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
            $tipo = $veiculo->getTipo();
            $data = $veiculo->getData();
            $sql = "INSERT INTO veiculo VALUES ($cod, '$marca', '$modelo', $ano, '$status', '$desc')";
            $result = mysqli_query($conexao, $sql);
            if ($result) {
                $sql = "INSERT INTO preco_veiculo VALUES (DEFAULT, $cod, $preco, '$tipo', '$data')";
                $result = mysqli_query($conexao, $sql);
                if ($result) {
                    echo "<script> alert('Veiculo inserido com sucesso!')</script>";
                    include '..\..\view\veiculo\listarVeiculo.php';
                } else {
                    echo "<script> alert('Erro na insercao do Veiculo!')</script>";
                }
            } else {
                    echo "<script> alert('ERRO na insercao do Veiculo!')</script>";
            }
        }
    }
    function listOfVeiculos() {
        global $conexao;
        $veiculos = array();
        $sql = "SELECT v.id, v.marca, v.modelo, v.ano, pv.preco, pv.tipo, pv.fromDate, v.status, v.descricao FROM veiculo AS v JOIN preco_veiculo AS pv ON v.id = pv.id_veiculo";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            while($rs = mysqli_fetch_assoc($result)) {
                $carro = new Veiculo($rs['id'], $rs['marca'], $rs['modelo'], $rs['ano'], $rs['status'], $rs['descricao'], $rs['preco'], $rs['tipo'], $rs['fromDate']);
                array_push($veiculos, $carro);
            }
        }
        return $veiculos;
    }
    function removeVeiculo($id) {
        global $conexao;
        $sql = "DELETE FROM preco_veiculo WHERE id_veiculo=$id";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
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
    }
?>