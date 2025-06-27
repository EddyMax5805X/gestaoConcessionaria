<?php 
    include_once("../Controller/controllerVendas.php");
    
    if (isset($_POST['submit'])) {
        $code = $_POST['id'];
        $id_cliente = $_POST['id_cliente'];
        $id_veiculo= $_POST['id_veiculo'];
        $data = $_POST['data'];
        $valor_pago = $_POST['valor_pago'];
         
        if (empty($code) or empty($id_cliente) or empty($id_veiculo) or empty($data) or empty($valor_pago  )) {
            echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        } else {
            $venda = new Venda($code, $id_cliente, $id_veiculo, $data, $valor_pago);
            updateVnda($venda);
        }
    }
?>