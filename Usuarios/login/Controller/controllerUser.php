<?php 
    $conexao = new mysqli("localhost", "root", "123", "gestao_concessionaria", 3306);
    
    function verifyUser($username, $email, $password) {
        global $conexao;

        $username = mysqli_real_escape_string($conexao, $username);
        $email = mysqli_real_escape_string($conexao, $email);

        $sql = "SELECT * FROM user WHERE unome = '$username' OR email = '$email'";
        $result = mysqli_query($conexao, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);

        if (password_verify($password, $row[5])) {
               $nome = $row[1];
               $sobreNome = $row[2];
               $emaill = $row[4];
               $perfil = $row[6];
               return $usuario = new User(null, $nome, $sobreNome, null, $emaill, null, $perfil);
            }
        } else {
            echo "<script>alert('Usuário ou senha incorretos!');
            window.location.href = '../../index.php';</script>";
        }
    }

function adicionarUsuario($usuario) {
    global $conexao;

    $nome = $usuario->getName();
    $sobrenome = $usuario->getSurname();
    $username = $usuario->getUsername();
    $email = $usuario->getEmail();
    $senha = $usuario->getPassword();
    $perfil = $usuario->getPerfil();

    $sql = "INSERT INTO user (nome, snome, unome, email, senha, perfil) 
            VALUES ('$nome', '$sobrenome', '$username', '$email', '$senha', '$perfil')";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p style='color: red;'>Erro ao adicionar usuário: " . $conexao->error . "</p>";
    }
}
?>