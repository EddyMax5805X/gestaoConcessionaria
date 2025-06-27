<?php
include_once("../Controller/controllerVendas.php");
$vendas = listOfVendas();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/listadeVendas.css">
    <title>Lista de Vendas</title>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <ul class="nav-links">
                    <li><a href="../Home/home.php">Início</a></li>
                    <li><a href="../View/cadastroVendas.php">Cadastrar Veículo</a></li>
                    
                </ul>
            </nav>
        </header>
        <h1>Lista de Vendas Cadastradas</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>ID DO CLIENTE</th>
                <th>ID DO VEICULO</th>
                <th>DATA DA VENDA</th>
                <th>VALOR PAGO</th>
                <th>OPERACOES</th>
            </thead>
            <tbody>
                <?php
                foreach ($vendas as $venda) {
                    echo "
                            <tr>
                                <td data-label='ID'>{$venda->getID()}</td>
                                <td data-label='ID DO CLIENTE'>{$venda->getId_cliente()}</td>
                                <td data-label='id-_veiculo'>{$venda->getId_veiculo()}</td>
                                <td data-label='data'>{$venda->getData()}</td>
                                <td data-label='valor_pago'>MZN " . number_format($venda->getValor_pago(), 2, '.', ',') . "</td>
                                <td data-label='Ações'><a href='../View/updateVenda.php?id={$venda->getID()}'>Modificar</a> &nbsp;&nbsp; <a href='../Controller/removeVenda.php?id={$venda->getID()}'>Remover</a></td>
                            </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>