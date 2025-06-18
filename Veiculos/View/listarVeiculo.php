<?php
include_once("../Controller/controllerVeiculo.php");
$veiculos = listOfVeiculos();
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/listaDeVeiculos.css">
    <title>Lista de Veiculos</title>
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <ul class="nav-links">
                    <li><a href="../index.php">Início</a></li>
                    <li><a href="../View/cadastroVeiculo.php">Cadastrar Veículo</a></li>
                    <!-- Adicione ou remova <li> conforme necessário -->
                </ul>
            </nav>
        </header>
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
                                <td data-label='Ações'><a href='../View/updateVeiculo.php?id={$carro->getID()}'>Modificar</a> &nbsp;&nbsp; <a href='../Controller/removeVeiculo.php?id={$carro->getID()}'>Remover</a></td>
                            </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>