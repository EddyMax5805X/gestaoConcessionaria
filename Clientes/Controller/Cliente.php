<?php
class Cliente {
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $endereco;

    public function __construct($nome, $email, $telefone, $endereco) {
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
}
?>