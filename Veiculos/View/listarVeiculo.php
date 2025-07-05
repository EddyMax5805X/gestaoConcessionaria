<?php

    session_start();

    $nome =  $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email'];
    $perfil = $_SESSION['perfil'];

?>

<?php
include_once("../Controller/controllerVeiculo.php");
$veiculos = listOfVeiculos();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/listaDeVeiculos.css">
    <title>Lista de Veiculos</title>
</head>

<body data-perfil="<?php echo $perfil; ?>">
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/homeVersion3.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="cadastroVeiculo.php">Cadastrar Veiculo</a></li>
                <li class="a"><a href="../../Clientes/View/verClientes.php">Clientes</a></li>
                <li class="a"><a href="../../Vendas/View/listarVendas.php">Vendas</a></li>
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
        <h1>Lista de Veículos Cadastrados</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Status</th>
                <th>Descrição</th>
                <th>Operações</th>
            </thead>
            <tbody>
                <?php
                foreach ($veiculos as $carro) {
                    echo "
                            <tr>
                                <td data-label='ID'>{$carro->getID()}</td>
                                <td data-label='Marca'>{$carro->getMarca()}</td>
                                <td data-label='Modelo'>{$carro->getModelo()}</td>
                                <td data-label='Ano'>{$carro->getAno()}</td>
                                <td data-label='Preço'>MZN " . number_format($carro->getPreco(), 2, '.', ',') . "</td>
                                <td data-label='Status'>{$carro->getStatus()}</td>
                                <td data-label='Descrição'>{$carro->getDescricao()}</td>
                                <td data-label='Ações'><a href='../View/updateVeiculo.php?id={$carro->getID()}' class='btn-atualizar'>Modificar</a>
                                 &nbsp;&nbsp; <a href='../View/visualizarVeiculo.php?id={$carro->getID()}'>Visualizar</a></td>
                            </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>