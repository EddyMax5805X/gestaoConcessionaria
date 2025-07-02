<?php 
    include_once("../Controller/user.php");
    $conexao = new mysqli("localhost", "root", "", "gestao_concessionaria", 3306);
    
    function verifyUser($username, $email, $password) {
        global $conexao;
        $sql = "SELECT * FROM user WHERE unome='$username' AND senha='$password' OR email='$email' AND senha='$password'";
        $result = mysqli_query($conexao, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_row($result)){
                $nome = $row[1];
                $sobreNome = $row[2];
                $emaill = $row[4];
                return $usuario = new User(null, $nome, $sobreNome, null, $emaill, null);
            }
        } else {
            echo "<script>alert('Usuário ou senha incorretos!');
            window.location.href = '../../index.php';</script>";
        }
    }

?>