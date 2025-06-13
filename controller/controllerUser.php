<?php 
    include_once("../../model/user.php");
    $conexao = new mysqli("localhost", "root", "", "gestao_concessionaria", 3306);
    
    function verifyUser($username, $email, $password) {
        global $conexao;
        $sql = "SELECT * FROM user WHERE unome='$username' AND senha='$password' OR email='$email' AND senha='$password'";
        $result = mysqli_query($conexao, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            header("Location: ../../view/home.php");
        } else {
            echo "<script>alert('Usuário ou senha incorretos!');</script>";
            
            include "login.html";
        }
    }

?>