<?php 
    include_once('../Controller/Vendas.php');
    include_once('../Controller/Conexao.php');

    
class Venda {
    private $id;
    private $id_cliente;
    private $id_veiculo;
    private $data;
    private $valor_pago;

    public function __construct($id, $id_cliente, $id_veiculo, $data, $valor_pago) {
        $this->id = $id;
        $this->id_cliente = $id_cliente;
        $this->id_veiculo = $id_veiculo;
        $this->data = $data;
        $this->valor_pago = $valor_pago;
    }

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
?>