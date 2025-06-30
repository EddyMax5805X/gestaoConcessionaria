<?php 
    include_once("../Controller/ControllerVendas.php");

    $code = $_GET['id'];
    removerVendas($code);
?>