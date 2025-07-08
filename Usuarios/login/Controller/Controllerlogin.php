<?php
include_once("../Controller/controllerUser.php");
include_once("../Controller/user.php");
include_once(__DIR__ . "/../../../Auditoria/Controller/Auditoria.php");
include_once(__DIR__ . "/../../../Auditoria/Controller/metodos.php");

if (isset($_POST["entrar"])) {
    $unome = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //verificação de senha
    if ($usuario = verifyUser($unome, $email, $password)) {

        session_start();

        $_SESSION['nome'] = $usuario->getName();
        $_SESSION['sobrenome'] = $usuario->getSurname();
        $_SESSION['email'] = $usuario->getEmail();
        $_SESSION['perfil'] = $usuario->getPerfil();

        //Auditoria
        $texto = "Senha: ----,";
        if (isset($unome)) {
            $texto .= "Username: $unome";
        } elseif (isset($email)) {
            $texto .= "Email: $email";
        }

        $usuario = $_SESSION['nome'] . " " . $_SESSION['sobrenome'];
        $perfil = $_SESSION['perfil'];
        $acao = "Login";
        $tabela = "Usuario";
        $idRegistro = "----";
        $valores_anteriores = "----";
        $valores_novos = $texto;

        $auditoria = new Auditoria(null, $usuario, $perfil, $acao, $tabela, $idRegistro, $valores_anteriores, $valores_novos, null);
        adicionarAuditoria($auditoria);

        header("Location: ../../../Home/home2.php");
        exit();
    }
    echo "<script>alert('Usuário ou senha incorretos!');
            window.location.href = '../../index.php';</script>";
    exit();
}
