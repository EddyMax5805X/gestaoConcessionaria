<?php 
session_start();

include_once("../Controller/ControllerVendas.php");
include_once("../Controller/Vendas.php");
include_once("../Controller/metodos.php");
include_once(__DIR__ ."/../../conexao.php");

if (isset($_POST['submit'])) {
    $code = $_POST['id'];
    $id_cliente = $_POST['id_cliente'];
    $id_veiculo = $_POST['id_veiculo'];
    $data = $_POST['data'];
    $valor_pago = $_POST['valor_pago'];

    if (empty($code) || empty($id_cliente) || empty($id_veiculo) || empty($data) || empty($valor_pago)) {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
    } else {
        // Recuperar dados anteriores da venda
        $sql = "SELECT * FROM venda WHERE id = '$code'";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $cliente_ant = $row['id_cliente'];
            $veiculo_ant = $row['id_veiculo'];
            $data_ant = $row['data'];
            $valor_ant = $row['valor_pago'];
        } else {
            echo "<script>alert('Venda não encontrada.')</script>";
            exit;
        }

        // Montar os textos da auditoria
        $texto_Anterior = "";
        $texto_Actual = "";

        if ($cliente_ant != $id_cliente) {
            $texto_Anterior .= "ID Cliente: $cliente_ant, ";
            $texto_Actual .= "ID Cliente: $id_cliente, ";
        }

        if ($veiculo_ant != $id_veiculo) {
            $texto_Anterior .= "ID Veículo: $veiculo_ant, ";
            $texto_Actual .= "ID Veículo: $id_veiculo, ";
        }

        if ($data_ant != $data) {
            $texto_Anterior .= "Data: $data_ant, ";
            $texto_Actual .= "Data: $data, ";
        }

        if ($valor_ant != $valor_pago) {
            $texto_Anterior .= "Valor Pago: $valor_ant, ";
            $texto_Actual .= "Valor Pago: $valor_pago, ";
        }

        // Montar dados da auditoria
        $usuario = $_SESSION['nome'] . " " . $_SESSION['sobrenome'];
        $perfil = $_SESSION['perfil'];
        $acao = "Atualizar";
        $tabela = "venda";
        $idRegistro = $code;
        $valores_anteriores = rtrim($texto_Anterior, ", ");
        $valores_novos = rtrim($texto_Actual, ", ");

        // Criar objeto de auditoria
        $auditoria = new Auditoria(
            null,
            $usuario,
            $perfil,
            $acao,
            $tabela,
            $idRegistro,
            $valores_anteriores,
            $valores_novos,
            null
        );

        // Atualizar a venda
        $venda = new Venda($code, $id_cliente, $id_veiculo, null, null, null, $data, $valor_pago);
        atualizarVenda($venda, $auditoria);
    }
}
?>
