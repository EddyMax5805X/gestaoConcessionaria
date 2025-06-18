<?php 
    include_once("../Controller/user.php");
    $conexao = new mysqli("localhost", "root", "123", "gestao_concessionaria", 3306);
    
    function verifyUser($username, $email, $password) {
        global $conexao;
        $sql = "SELECT * FROM user WHERE unome='$username' AND senha='$password' OR email='$email' AND senha='$password'";
        $result = mysqli_query($conexao, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            header("Location: ../../../Home/home.php");
        } else {
            echo "<script>alert('Usuário ou senha incorretos!');</script>";
            
            include "../View/login.php";
        }
    }

?>