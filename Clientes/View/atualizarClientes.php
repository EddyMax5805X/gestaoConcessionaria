<?php

    session_start();

    $nomeS =  $_SESSION['nome'];
    $sobrenomeS = $_SESSION['sobrenome'];
    $emailS = $_SESSION['email'];
    $perfil = $_SESSION['perfil'];

    include_once("../Controller/Cliente.php");
    include_once("../../conexao.php");
    include_once("../Controller/metodos.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT * FROM cliente WHERE id = '$id'";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $id_Anterior = $row["id"];
            $nome_Anterior = $row["nome"];
            $email_Anterior = $row["email"];
            $telefone_Anterior = $row["contacto"];
            $endereco_Anterior = $row["endereco"];
        } else {
            echo "Cliente não encontrado.";
            exit();
        }
    } else {
        echo "ID do cliente não informado.";
        exit();
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
    <title>Atualizar Cliente</title>
</head>

<body>
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/home2.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="verClientes.php">Listar Clientes</a></li>
                <li class="a"><a href="../../Veiculos/View/listarVeiculo.php">Veiculos</a></li>
                <li class="a"><a href="../../Vendas/View/listarVendas.php">Vendas</a></li>
            </ul>
            <div class="perfil">
                <p><span><?php echo $nomeS." ".$sobrenomeS . " - " ;?> <span id="perfil"><strong>(<?php echo $perfil;?>)</strong></span></br>
                        <?php echo $emailS;?></span></br>
                </p>
                <i class="fa-solid fa-circle-user"></i>
            </div>
        </nav>
    </header>
    <div class="container">

        <form method="post" action="../Controller/AtualizarCliente.php">
            <h1>Atualizar Cliente</h1>

            <div>
                <label for="id">ID</label>
                <input type="text" name="id" id="id" value="<?php echo $id_Anterior; ?>" readonly>
            </div>

            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?php echo $nome_Anterior; ?>">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $email_Anterior; ?>">
            </div>

            <div>
                <label for="telefone">Contacto</label>
                <input type="text" name="telefone" id="telefone" value="<?php echo $telefone_Anterior; ?>">
            </div>

            <div>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="<?php echo $endereco_Anterior; ?>">
            </div>

            <input class="buttons" type="submit" value="Atualizar">
        </form>
    </div>
</body>

</html>