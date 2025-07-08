<?php

class Auditoria {
    private $id;
    private $nome_do_usuario;
    private $perfil_do_usuario;
    private $acao;
    private $tabela_afetada;
    private $ID_do_registro;
    private $valores_anteriores;
    private $valores_novos;
    private $data_hora;

    public function __construct($id ,$nome_do_usuario, $perfil_do_usuario,
    $acao, $tabela_afetada, $ID_do_registro, $valores_anteriores,
    $valores_novos, $data_hora) {
        $this->id = $id;
        $this->nome_do_usuario = $nome_do_usuario;
        $this->perfil_do_usuario = $perfil_do_usuario;
        $this->acao = $acao;
        $this->tabela_afetada = $tabela_afetada;
        $this->ID_do_registro = $ID_do_registro;
        $this->valores_anteriores = $valores_anteriores;
        $this->valores_novos = $valores_novos;
        $this->data_hora = $data_hora;
    }

    public function getId() { return $this->id; }
    public function getNomeDoUsuario() { return $this->nome_do_usuario; }
    public function getPerfilDoUsuario() { return $this->perfil_do_usuario; }
    public function getAcao() { return $this->acao; }
    public function getTabelaAfetada() { return $this->tabela_afetada; }
    public function getIDDoRegistro() { return $this->ID_do_registro; }
    public function getValoresAnteriores() { return $this->valores_anteriores; }
    public function getValoresNovos() { return $this->valores_novos; }
    public function getDataHora() { return $this->data_hora; }

    public function setId($id) { $this->id = $id; }
    public function setNomeDoUsuario($nome) { $this->nome_do_usuario = $nome; }
    public function setPerfilDoUsuario($perfil) { $this->perfil_do_usuario = $perfil; }
    public function setAcao($acao) { $this->acao = $acao; }
    public function setTabelaAfetada($tabela) { $this->tabela_afetada = $tabela; }
    public function setIDDoRegistro($idRegistro) { $this->ID_do_registro = $idRegistro; }
    public function setValoresAnteriores($valores) { $this->valores_anteriores = $valores; }
    public function setValoresNovos($valores) { $this->valores_novos = $valores; }
    public function setDataHora($dataHora) { $this->data_hora = $dataHora; }
}

?>
