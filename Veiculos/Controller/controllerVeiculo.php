<?php 
    include_once(__DIR__ ."/../../conexao.php");
    include_once(__DIR__ ."/../../Auditoria/Controller/Auditoria.php");
    include_once(__DIR__ ."/../../Auditoria/Controller/metodos.php");
    include_once(__DIR__ ."/../Controller/Veiculo.php");

    function addVeiculo($veiculo, Auditoria $auditoria) {
        global $conexao;
        $marca = $veiculo->getMarca();
        $modelo = $veiculo->getModelo();
        $ano = $veiculo->getAno();
        $status = $veiculo->getStatus();
        $desc = $veiculo->getDescricao();
        $preco = $veiculo->getPreco();
        $chassi = $veiculo->getChassi();
        $cor = $veiculo->getCor();
        $cilindrada= $veiculo->getCilindrada();
        $transmissao= $veiculo->getTransmissao();
        $numeroChassi= $veiculo->getNumeroChassi();
        $quilometragem= $veiculo->getQuilometragem();
        $combustivel= $veiculo->getCombustivel();
        $sql = "INSERT INTO veiculo VALUES (null, '$marca', '$modelo','$chassi','$cilindrada','$numeroChassi','$cor','$combustivel','$transmissao','$quilometragem', $ano, $preco, '$status', '$desc')";

        $result = mysqli_query($conexao, $sql);
        if ($result) {
        if ($auditoria !== null) {
            $auditoria->setIDdoRegistro($conexao->insert_id);
            adicionarAuditoria($auditoria);
        }
            header("Location: ../View/listarVeiculo.php");
            echo "<script> alert('Veiculo inserido com sucesso!')</script>";
            include '../View/listarVeiculo.php';
        } else {
                echo "<script> alert('ERRO na insercao do Veiculo!')</script>";
        }
    }
    function listOfVeiculos() {
        global $conexao;
        $veiculos = array();
        $sql = "SELECT * FROM veiculo";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            while($rs = mysqli_fetch_assoc($result)) {
                $carro = new Veiculo($rs['id'], $rs['marca'], $rs['modelo'], $rs['ano'],$rs['preco'],$rs['status'], $rs['descricao'], $rs['chassi'],$rs['cor'],$rs['cilindrada'],$rs['transmissao'],$rs['numeroChassi'],$rs['quilometragem'], $rs['combustivel']);
                array_push($veiculos, $carro);
            }
        }
        return $veiculos;
    }
    function searchVeiculo($id) {
        global $conexao;
        $sql = "SELECT * FROM veiculo WHERE id='$id'";
        $result = mysqli_query($conexao, $sql);
        $rs = mysqli_fetch_assoc($result);
        $veiculo = new Veiculo($rs['id'], $rs['marca'], $rs['modelo'], $rs['ano'],$rs['preco'],$rs['status'], $rs['descricao'], $rs['chassi'],$rs['cor'],$rs['cilindrada'],$rs['transmissao'],$rs['numeroChassi'],$rs['quilometragem'], $rs['combustivel']);
        return $veiculo;
    }
    
    function updateVeiculo($veiculo, Auditoria $auditoria) {
    global $conexao;

    $id = $veiculo->getID();
    $marca = $veiculo->getMarca();
    $modelo = $veiculo->getModelo();
    $ano = $veiculo->getAno();
    $preco = $veiculo->getPreco();
    $status = $veiculo->getStatus();
    $desc = $veiculo->getDescricao();
    $chassi = $veiculo->getChassi();
    $cor = $veiculo->getCor();
    $cilindrada = $veiculo->getCilindrada();
    $transmissao = $veiculo->getTransmissao();
    $numeroChassi = $veiculo->getNumeroChassi();
    $quilometragem = $veiculo->getQuilometragem();
    $combustivel = $veiculo->getCombustivel();

    $sql = "UPDATE veiculo SET 
        marca = '$marca',
        modelo = '$modelo',
        ano = $ano,
        preco = $preco,
        status = '$status',
        descricao = '$desc',
        chassi = '$chassi',
        cor = '$cor',
        cilindrada = $cilindrada,
        transmissao = '$transmissao',
        numeroChassi = '$numeroChassi',
        quilometragem = $quilometragem,
        combustivel = '$combustivel'
        WHERE id = $id";

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        if ($auditoria !== null) {
            $auditoria->setIDdoRegistro($id);
            adicionarAuditoria($auditoria);
        }
        echo "<script>
            alert('Veículo atualizado com sucesso!');
            window.location.href = '../View/listarVeiculo.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro na atualização do veículo!');
            window.location.href = '../View/listarVeiculo.php';
        </script>";
    }
}


    function removeVeiculo($id, Auditoria $auditoria) {
        global $conexao;
        $sql = "DELETE FROM veiculo WHERE id='$id'";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            if ($auditoria !== null) {
            $auditoria->setIDdoRegistro($id);
            adicionarAuditoria($auditoria);
        }
            echo "<script>alert('Veículo removido com sucesso!')</script>";
            header("Location: ../View/listarVeiculo.php");
        } else {
            echo "<script>alert('Erro na remoção do veículo!')</script>";
        } 
    }

?>