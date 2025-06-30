<?php
    session_start();

    $nome =  $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include("../Controller/conexao.php");
    include("../Controller/Cliente.php");
    include("../Controller/metodos.php");

    if (empty($_POST["nome"]) || empty($_POST["email"]) || empty($_POST["telefone"]) || empty($_POST["endereco"])) {
        echo "<p style='color: red;'>Por favor, preencha todos os campos.</p>";
    } else {
        $nome = $conexao->real_escape_string($_POST["nome"]);
        $email = $conexao->real_escape_string($_POST["email"]);
        $telefone = $conexao->real_escape_string($_POST["telefone"]);
        $endereco = $conexao->real_escape_string($_POST["endereco"]);

        $cliente = new Cliente($nome, $email, $telefone, $endereco);

        adicionarCliente($cliente);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/Cliente.css">
    <title>Cadastrar Cliente</title>
</head>

<body>
      <div class="perfil">
            <p><span><?php echo $nome." ".$sobrenome;?></span></br><?php echo $email;?></p>
            <i class="fa-solid fa-circle-user"></i>
        </div>
    <div class="container">

        <form action="" method="post">
            <h1>Adicionar Cliente</h1>

            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="telefone">Contacto</label>
                <input type="text" name="telefone" id="telefone" required>
            </div>

            <div>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" required>
            </div>

            <div class="bnt">
            <input type="submit" value="Adicionar">
            <a href="../View/verClientes.php">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>