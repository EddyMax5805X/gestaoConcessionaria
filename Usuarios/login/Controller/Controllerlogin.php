<?php 
    include_once("../Controller/controllerUser.php");
    include_once("../Controller/user.php");

    if (isset($_POST["entrar"])) {
        $unome = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        if($usuario = verifyUser($unome, $email, $password)){

            session_start();

            $_SESSION['nome'] = $usuario->getName();
            $_SESSION['sobrenome'] = $usuario->getSurname();
            $_SESSION['email'] = $usuario->getEmail();

            header("Location: ../../../Home/home.php");
        }
  
                    
    }
?>