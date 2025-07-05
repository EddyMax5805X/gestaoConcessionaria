<?php

session_start();

$nome =  $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

include_once("../Controller/ControllerVendas.php");
$id = $_GET['id'];
$venda = searchVendas($id);
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/style.css">
    <title>Formulário de Atualização de Vendas</title>
</head>

<body>
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/homeVersion3.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="listarVendas.php">Listar Vendas</a></li>
                <li class="a"><a href="../../Clientes/View/verClientes.php">Clientes</a></li>
                <li class="a"><a href="../../Veiculos/View/listarVeiculo.php">Veiculos</a></li>
            </ul>
            <div class="perfil">
                <p><span><?php echo $nome." ".$sobrenome . " - " ;?> <span id="perfil"><strong>(<?php echo $perfil;?>)</strong></span></br>
                        <?php echo $email;?></span></br>
                </p>
                <i class="fa-solid fa-circle-user"></i>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Formulário de Atualização <br> de Vendas</h1>

        <form action="../Controller/actualizarVendas.php" method="post">

            <div class="inputs code">
                <label for="id">Código da Venda</label>
                <input type="number" name="id" id="id" placeholder="Digite o ID da venda" value="<?php echo $venda->getId(); ?>" readonly>
            </div>

            <div class="id_cliente">
                <label for="id_cliente">ID do Cliente</label>
                <input type="number" name="id_cliente" id="id_cliente" required placeholder="Digite o ID do Cliente" value="<?php echo $venda->getIdCliente(); ?>" readonly>
            </div>

            <div class="id_veiculo">
                <label for="id_veiculo">ID do Veículo</label>
                <input type="number" name="id_veiculo" id="id_veiculo" required placeholder="Digite o ID do Veículo" value="<?php echo $venda->getIdVeiculo(); ?>" readonly>
            </div>

            <div class="data">
                <label for="data">Data da Venda</label>
                <input type="date" name="data" id="data" required value="<?php echo $venda->getData(); ?>">
            </div>

            <div class="valor_pago">
                <label for="valor_pago">Valor Pago</label>
                <input type="number" name="valor_pago" id="valor_pago" maxlength="12" required placeholder="Digite o valor pago" value="<?php echo $venda->getValorPago(); ?>">
            </div>

            <button type="submit" name="submit" class="buttons">Atualizar</button>

        </form>
    </div>
</body>

</html>