<?php
    session_start();

    $nome_S =  $_SESSION['nome'];
    $sobrenome_S = $_SESSION['sobrenome'];
    $email_S = $_SESSION['email'];
    $perfil_S = $_SESSION['perfil'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include("../Usuarios/login/Controller/user.php");
    include("../Usuarios/login/Controller/controllerUser.php");
    include_once("../Auditoria/Controller/Auditoria.php");

    $nome = $_POST["nome"];
    $snome = $_POST["snome"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $perfil = $_POST["perfil"];

    $usuario = $_SESSION['nome'] . " " . $_SESSION['sobrenome'];
    $perfil = $_SESSION['perfil'];
    $acao = "Cadastro";
    $tabela = "Usuario";
    $idRegistro = null;
    $valores_anteriores = "---";
    $valores_novos = "Nome: $nome, Sobrenome $snome, Username email: $email, senha: ----, Novo perfil: $perfil";

    $auditoria = new Auditoria(null, $usuario, $perfil, $acao, $tabela, $idRegistro, $valores_anteriores, $valores_novos, null);
    $usuario = new User(null, $nome, $snome, $username, $email, $senha, $perfil);

    adicionarUsuario($usuario, $auditoria);
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
    <div class="video">
        <video src="../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../Home/homeVersion3.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="../Veiculos/View/listarVeiculo.php">Veiculo</a></li>
                <li class="a"><a href="../../Clientes/View/verClientes.php">Clientes</a></li>
                <li class="a"><a href="../../Vendas/View/listarVendas.php">Vendas</a></li>
            </ul>
            <div class="perfil">
                <p><span><?php echo $nome_S." ".$sobrenome_S . " - " ;?> <span id="perfil"><strong>(<?php echo $perfil_S;?>)</strong></span></br>
                        <?php echo $email_S;?></span></br>
                </p>
                <i class="fa-solid fa-circle-user"></i>
            </div>
        </nav>
    </header>
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
                    if ($perfil_S === "admin") {
                        echo "
                        <select name='perfil' id='perfil' required>
                            <option value='' disabled selected hidden>Selecione o perfil</option>
                            <option value='usuario'>Cliente</option>
                            <option value='admin'>Administrador</option>
                        </select>
                        <label for='perfil'>Perfil</label>";
                    } else {
                        echo "
                        <select name='perfil' id='perfil' disabled>
                            <option value='usuario' selected>Usuario</option>
                        </select>
                        <label for='perfil'>Perfil</label>
                        <input type='hidden' name='perfil' value='usuario' />";
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