<?php 
include_once('../Controller/Vendas.php');
include_once('../Controller/Conexao.php');

function addVenda($venda) {
    global $conexao;

    $id_cliente = $venda->getIdCliente();
    $id_veiculo = $venda->getIdVeiculo();
    $data = $venda->getData();
    $valor_pago = $venda->getValorPago();

    $sql = "INSERT INTO venda (id_cliente, id_veiculo, data, valor_pago)
            VALUES ('$id_cliente', '$id_veiculo', '$data', '$valor_pago')";

    $result = mysqli_query($conexao, $sql);
    if ($result) {
        header("Location: ../View/listarVendas.php");
        exit();
    } else {
        echo "<script>alert('Erro na inserção da venda!');</script>";
    }
}

function listOfVendas() {
    global $conexao;
    $vendas = array();

    $sql = "SELECT v.*, c.nome, ve.marca, ve.modelo from venda v join cliente c on v.id_cliente = c.id join veiculo ve on v.id_veiculo = ve.id;";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        while ($rs = mysqli_fetch_assoc($result)) {
            $venda = new Venda(
                $rs['id'],
                $rs['id_cliente'],
                $rs['id_veiculo'],
                $rs['nome'],
                $rs['marca'],
                $rs['modelo'],
                $rs['data'],
                $rs['valor_pago']
            );
            $vendas[] = $venda;
        }
    }
    return $vendas;
}

function searchVendas($id) {
    global $conexao;

    $id = mysqli_real_escape_string($conexao, $id);
    $sql = "SELECT * FROM venda WHERE id='$id'";
    $result = mysqli_query($conexao, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $rs = mysqli_fetch_assoc($result);
        return new Venda(
            $rs['id'],
                $rs['id_cliente'],
                $rs['id_veiculo'],
                null, null, null,
                $rs['data'],
                $rs['valor_pago']
        );
    }
    return null;
}

function atualizarVenda($venda) {
    global $conexao;

    $id = $venda->getId();
    $id_cliente = $venda->getIdCliente();
    $id_veiculo = $venda->getIdVeiculo();
    $data = $venda->getData();
    $valor_pago = $venda->getValorPago();

    $sql = "UPDATE venda SET 
                id_cliente = '$id_cliente', 
                id_veiculo = '$id_veiculo', 
                data = '$data', 
                valor_pago = '$valor_pago' 
            WHERE id = '$id'";

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo "<script>
            alert('Venda atualizada com sucesso!');
            window.location.href = '../View/listarVendas.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro na atualização da venda!');
            window.location.href = '../View/listarVendas.php';
        </script>";
    }
}


function removerVendas($id) {
    global $conexao;

    $id = mysqli_real_escape_string($conexao, $id);
    $sql = "DELETE FROM venda WHERE id='$id'";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo "<script>alert('Venda removida com sucesso!');</script>";
        header("Location: ../View/listarVendas.php");
        exit();
    } else {
        echo "<script>alert('Erro na remoção da venda!');</script>";
    }
}
?>
