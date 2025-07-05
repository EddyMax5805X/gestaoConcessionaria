<?php
session_start();

$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

include_once("../Controller/ControllerVendas.php");
$vendas = listOfVendas();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vendas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/listaDeVendas.css">
</head>
<body>
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/homeVersion3.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="cadastroVendas.php">Registrar Venda</a></li>
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
        <h1>Lista de Vendas Cadastradas</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID do Cliente</th>
                    <th>ID do Veículo</th>
                    <th>Data da Venda</th>
                    <th>Valor Pago</th>
                    <th>Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $venda): ?>
                    <tr>
                        <td data-label="ID"><?= $venda->getId(); ?></td>
                        <td data-label="Cliente"><?php echo $venda->getIdCliente() . " - " . $venda->getCliente(); ?></td>
                        <td data-label="Veículo"><?php echo $venda->getIdVeiculo() . " - " . $venda->getMarcaVeiculo() . " - " . $venda->getModeloVeiculo(); ?></td>
                        <td data-label="Data da Venda"><?= $venda->getData(); ?></td>
                        <td data-label="Valor Pago">MZN <?= number_format($venda->getValorPago(), 2, '.', ','); ?></td>
                        <td data-label="Operações">
                            <a href="../View/UpdateVenda.php?id=<?= $venda->getId(); ?>">Modificar</a> &nbsp;&nbsp;
                            <a href="../Controller/removerVendas.php?id=<?= $venda->getId(); ?>" onclick="return confirm('Deseja mesmo remover esta venda?')">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
