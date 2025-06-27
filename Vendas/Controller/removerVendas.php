<?php 
    include_once("../Controller/controllerVendas.php");

    $code = $_GET['id'];
    removeVeiculo($code);
?>