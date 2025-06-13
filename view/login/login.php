<?php 
    include_once("..\..\controller\controllerUser.php");

    if (isset($_POST["entrar"])) {
        $unome = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        verifyUser($unome, $email, $password);
    }
?>