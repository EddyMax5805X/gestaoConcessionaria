<?php
session_start();

$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];

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
    <div class="container">
        <div class="perfil">
            <p><span><?php echo $nome . " " . $sobrenome; ?></span><br><?php echo $email; ?></p>
            <i class="fa-solid fa-circle-user"></i>
        </div>

        <header>
            <nav>
                <ul class="nav-links">
                    <li><a href="../../Home/home.php">Início</a></li>
                    <li><a href="../View/cadastroVendas.php">Cadastrar Venda</a></li>
                </ul>
            </nav>
        </header>

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
                        <td data-label="ID do Cliente"><?= $venda->getIdCliente(); ?></td>
                        <td data-label="ID do Veículo"><?= $venda->getIdVeiculo(); ?></td>
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
