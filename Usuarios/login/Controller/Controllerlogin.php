<?php
include_once("../Controller/controllerUser.php");
include_once("../Controller/user.php");

if (isset($_POST["entrar"])) {
    $unome = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    if($usuario = verifyUser($unome, $email, $password)) {

        session_start();
        
        $_SESSION['nome'] = $usuario->getName();
        $_SESSION['sobrenome'] = $usuario->getSurname();
        $_SESSION['email'] = $usuario->getEmail();
        $_SESSION['perfil'] = $usuario->getPerfil();

        setcookie(
            'ultimo_login_exibicao',
            $_COOKIE['ultimo_login_registro'] ?? 'Primeiro acesso',
            time() + (60 * 24 * 60 * 60), // 60 dias
            "/"
        );
        
        setcookie(
            'ultimo_login_registro',
            date('d/m/Y H:i:s'),
            time() + (60 * 24 * 60 * 60), // 60 dias
            "/"
        );
        
        header("Location: ../../../Home/homeVersion3.php");
        exit();
    }
    echo "<script>alert('Usuário ou senha incorretos!');
            window.location.href = '../../index.php';</script>";
    exit();
}
?>