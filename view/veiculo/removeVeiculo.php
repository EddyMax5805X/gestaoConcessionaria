<?php 
    include_once("../../controller/controllerVeiculo.php");

    $code = $_GET['id'];
    removeVeiculo($code);
?>