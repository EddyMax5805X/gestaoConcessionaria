<?php 
    include_once('../Controller/Vendas.php');
    include_once('../Controller/Conexao.php');

    
class Venda {
    private $id;
    private $id_cliente;
    private $id_veiculo;
    private $data;
    private $valor_pago;

    // Construtor
    public function __construct($id, $id_cliente, $id_veiculo, $data, $valor_pago) {
        $this->id = $id;
        $this->id_cliente = $id_cliente;
        $this->id_veiculo = $id_veiculo;
        $this->data = $data;
        $this->valor_pago = $valor_pago;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getIdVeiculo() {
        return $this->id_veiculo;
    }

    public function getData() {
        return $this->data;
    }

    public function getValorPago() {
        return $this->valor_pago;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setIdVeiculo($id_veiculo) {
        $this->id_veiculo = $id_veiculo;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setValorPago($valor_pago) {
        $this->valor_pago = $valor_pago;
    }
}

    include_once('../Controller/Vendas.php');
       include_once('../View/cadastroVendas.php');
    include_once('../Controller/conexao.php');

    function addVenda($Venda) {
        global $conexao;
        $id_cliente= $Venda->getIdCliente();
        $id_veiculo= $Venda->getIdVeiculo();
        $data = $Venda->getData();
        $valor_pago = $Venda->getValorPago();
        
        $sql = "INSERT INTO venda (id_c;iente, id_veiculo, data, valor_pago) VALUES ('$id_cliente', '$id_veiculo', $data, $valor_pago)";

        $result = mysqli_query($conexao, $sql);
        if ($result) {
            header("Location: ../View/listarVendas.php");
            echo "<script> alert('Vendastrada com sucesso!')</script>";
            include '../View/listarVendas.php';
        } else {
                echo "<script> alert('ERRO na insercao do Veiculo!')</script>";
        }
    }
    function listOfVendas() {
        global $conexao;
        $vendas = array();
        $sql = "SELECT * FROM venda";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            while($rs = mysqli_fetch_assoc($result)) {
                $venda = new vendas($rs['id'], $rs['id_cliente'], $rs['id_veiculo'], $rs['data'], $rs['valor_pago'] );
                array_push($vendas, $venda);
            }
        }
        return $vendas;
    }
 function searchVendas($id) {
    global $conexao;

    // Prevenção básica de SQL Injection
    $id = mysqli_real_escape_string($conexao, $id);

    $sql = "SELECT * FROM venda WHERE id='$id'";
    $result = mysqli_query($conexao, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $rs = mysqli_fetch_assoc($result);
        return new Venda($rs['id'], $rs['id_cliente'], $rs['id_veiculo'], $rs['data'], $rs['valor_pago']);
    } else {
        return null; // Não encontrou a venda
    }
}

    function updateVenda($venda) {
        global $conexao;
        $id = $venda->getID();
        $id_cliente = $venda->getIdCliente();
        $id_veiculo = $venda->getIdVeiculo();
        $data = $venda->getData();
        $valor_pago = $venda->getValorPago();
   
        $sql = "UPDATE venda SET id_cliente='$id_cliente', id_veiculo='$id_veiculo, data= '$data', valor_pago='$valor_pago'  WHERE id='$id'";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            echo "<script>alert('Venda nº{$id} atualizado com sucesso!')</script>";
            include '../View/listarVendas.php';
            header("Location: ../View/listarVendas.php");
        } else {
            echo "<script>alert('Erro na atualização do veículo!')</script>";
            include '../View/listarVeiculo.php';
        } 
    }
    function removerVendas($id) {
        global $conexao;
        $sql = "DELETE FROM venda WHERE id='$id'";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            echo "<script>alert('Venda removida com sucesso!')</script>";
            header("Location: ../View/listarVendas.php");
            include '../View/listarVendas.php';
        } else {
            echo "<script>alert('Erro na remoção da venda')</script>";
            include '../View/listarVeiculo.php';
        } 
    }

?>
 