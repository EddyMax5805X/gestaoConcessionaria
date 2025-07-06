<?php 
    class Veiculo {
        private $ID;
        private $marca;
        private $modelo;
        private $ano;
        private $preco;
        private $status;
        private $descricao;
        private $chassi;
        private $cor;
        private $cilindrada;
        private $transmissao;
        private $numeroChassi;
        private $quilometragem;
        private $combustivel;

        function __construct($ID, $marca, $modelo, $ano, $preco, $status, $descricao,
         $chassi, $cor, $cilindrada,$transmissao,$numeroChassi,$quilometragem,$combustivel) {
            $this->ID = $ID;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->ano = $ano;
            $this->preco = $preco;
            $this->status = $status;
            $this->descricao = $descricao;
            $this->chassi = $chassi;
            $this->cor = $cor;
            $this->cilindrada = $cilindrada;
            $this->transmissao = $transmissao;
            $this->numeroChassi = $numeroChassi;
            $this->quilometragem =  $quilometragem;
            $this->combustivel = $combustivel;
        }

        function getID() { return $this->ID; }
        function getMarca() { return $this->marca; }
        function getModelo() { return $this->modelo; }
        function getAno() { return $this->ano; }
        function getStatus() { return $this->status; }
        function getDescricao() { return $this->descricao; }
        function getPreco() { return $this->preco; }
        function getChassi() {return $this->chassi;}
        function getCor() {return $this->cor;}
        function getCilindrada() {return $this->cilindrada;}
        function getTransmissao() {return $this->transmissao;}
        function getNumeroChassi() {return $this->numeroChassi;}
        function getQuilometragem() {return $this->quilometragem;}
        function getCombustivel() {return $this-> combustivel;}

        


        function setID($ID) { $this->ID = $ID; }
        function setMarca($marca) { $this->marca = $marca; }
        function setModelo($modelo) { $this->modelo = $modelo; }
        function setAno($ano) { $this->ano = $ano; }
        function setStatus($status) { $this->status = $status; }
        function setDescricao($descricao) { $this->descricao = $descricao; }
        function setPreco($preco) { $this->preco = $preco; }
        function setChassi($chassi) { $this->chassi = $chassi;}
        function setCor($cor) { $this->cor = $cor;}
        function setCilindrada($cilindrada) {$this->cilindrada= $cilindrada; }
        function setTransmissao($transmissao) {$this->transmissao=$transmissao;}
        function setNumeroChassi($numeroChassi) {$this->numeroChassi= $numeroChassi;}
        function setQuilometragem($quilometragem) {$this->quilometragem= $quilometragem;}
        function setCombustivel($combustivel) {$this-> combustivel= $combustivel;}
    }
?>