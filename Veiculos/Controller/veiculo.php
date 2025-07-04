<?php 
    class Veiculo {
        private $ID;
        private $marca;
        private $modelo;
        private $ano;
        private $preco;
        private $status;
        private $descricao;

        function __construct($ID, $marca, $modelo, $ano, $preco, $status, $descricao) {
            $this->ID = $ID;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->ano = $ano;
            $this->preco = $preco;
            $this->status = $status;
            $this->descricao = $descricao;
        }

        function getID() { return $this->ID; }
        function getMarca() { return $this->marca; }
        function getModelo() { return $this->modelo; }
        function getAno() { return $this->ano; }
        function getStatus() { return $this->status; }
        function getDescricao() { return $this->descricao; }
        function getPreco() { return $this->preco; }

        function setID($ID) { $this->ID = $ID; }
        function setMarca($marca) { $this->marca = $marca; }
        function setModelo($modelo) { $this->modelo = $modelo; }
        function setAno($ano) { $this->ano = $ano; }
        function setStatus($status) { $this->status = $status; }
        function setDescricao($descricao) { $this->descricao = $descricao; }
        function setPreco($preco) { $this->preco = $preco; }
    }
?>