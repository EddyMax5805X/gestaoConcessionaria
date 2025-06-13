<?php 
    class Veiculo {
        private $ID;
        private $marca;
        private $modelo;
        private $ano;
        private $status;
        private $descricao;
        private $preco;
        private $tipo;
        private $data;

        function __construct($ID, $marca, $modelo, $ano, $status, $descricao, $preco, $tipo, $data) {
            $this->ID = $ID;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->ano = $ano;
            $this->status = $status;
            $this->descricao = $descricao;
            $this->preco = $preco;
            $this->tipo = $tipo;
            $this->data = $data;
        }

        function getID() { return $this->ID; }
        function getMarca() { return $this->marca; }
        function getModelo() { return $this->modelo; }
        function getAno() { return $this->ano; }
        function getStatus() { return $this->status; }
        function getDescricao() { return $this->descricao; }
        function getPreco() { return $this->preco; }
        function getTipo() { return $this->tipo; }
        function getData() { return $this->data; }

        function setID($ID) { $this->ID = $ID; }
        function setMarca($marca) { $this->marca = $marca; }
        function setModelo($modelo) { $this->modelo = $modelo; }
        function setAno($ano) { $this->ano = $ano; }
        function setStatus($status) { $this->status = $status; }
        function setDescricao($descricao) { $this->descricao = $descricao; }
        function setPreco($preco) { $this->preco = $preco; }
        function setTipo($tipo) { $this->tipo = $tipo; }
        function setData($data) { $this->data = $data; }
    }
?>