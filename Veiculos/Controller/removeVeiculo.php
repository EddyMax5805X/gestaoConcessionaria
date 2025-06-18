<?php 
    include_once("../Controller/controllerVeiculo.php");

    $code = $_GET['id'];
    removeVeiculo($code);
?>