<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include("../Usuarios/login/Controller/user.php");
    include("../Usuarios/login/Controller/controllerUser.php");

    $nome = $_POST["nome"];
    $snome = $_POST["snome"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $perfil = $_POST["perfil"];

    $usuario = new User(null, $nome, $snome, $username, $email, $senha, $perfil);


    adicionarUsuario($usuario);
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
    <link rel="stylesheet" href="../Usuarios/login/style/cadastroUsuario.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Adicionar Usuário</h1>
        <form action="" method="post">
            <div class="input-group">
                <input type="text" name="nome" id="nome" required placeholder=" ">
                <label for="nome">Nome</label>
            </div>

            <div class="input-group">
                <input type="text" name="snome" id="snome" required placeholder=" ">
                <label for="snome">Sobrenome</label>
            </div>

            <div class="input-group">
                <input type="text" name="username" id="username" required placeholder=" ">
                <label for="username">Nome de Usuário</label>
            </div>

            <div class="input-group">
                <input type="email" name="email" id="email" required placeholder=" ">
                <label for="email">Email</label>
            </div>

            <div class="input-group">
                <input type="password" name="senha" id="senha" required placeholder=" ">
                <label for="senha">Senha</label>
            </div>

            <div class="input-group">
                <?php
                    session_start();
                    $perfilS = $_SESSION['perfil'];

                    if ($perfilS === "admin") {
                        echo "
                        <select name='perfil' id='perfil' required>
                            <option value='' disabled selected hidden>Selecione o perfil</option>
                            <option value='cliente'>Cliente</option>
                            <option value='admin'>Administrador</option>
                        </select>
                        <label for='perfil'>Perfil</label>";
                    } else {
                        echo "
                        <select name='perfil' id='perfil' disabled>
                            <option value='cliente' selected>Cliente</option>
                        </select>
                        <label for='perfil'>Perfil</label>
                        <input type='hidden' name='perfil' value='cliente' />";
                    }
                ?>
            </div>


            <div class="btns">
                <button type="submit" class="buttons">Adicionar</button>
                <button type="reset" class="buttons">Limpar</button>
            </div>
        </form>
    </div>
</body>

</html>