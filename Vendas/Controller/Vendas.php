<?php 
    class Vendas {
        private $ID;
        private $id_cliente;
        private $id_veiculo;
        private $data;
        private $valor_pago;
        

        function __construct($ID, $id_cliente, $id_veiculo, $data, $valor_pago) {
            $this->ID = $ID;
            $this->id_cliente = $id_cliente;
            $this->id_veiculo = $id_cliente;
            $this->data = $data;
            $this->valor_pago = $valor_pago;
            
        }

        function getID() { return $this->ID; }
        function getId_cliente() { return $this-> id_cliente;}
        function getId_veiculo() { return $this->id_veiculo; }
        function getData() { return $this->data; }
        function getValor_pago() { return $this->valor_pago; }
       

        function setID() { return $this->ID; }
        function setId_cliente() { return $this-> id_cliente;}
        function setId_veiculo() { return $this->id_veiculo; }
        function setData() { return $this->data; }
        function setValor_pago() { return $this->valor_pago; }
    }
?>