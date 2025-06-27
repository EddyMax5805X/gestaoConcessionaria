<?php 
    include_once("../Controller/ControllerVendas.php");
    $id = $_GET['id'];
    $venda = searchVendas($id);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Atualização de Vendas</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="container">
        
        <div class="links">
            <p><a href="../Home/home.php">&larr; Voltar ao Início</a></p>
            <p><a href="../View/listarVendas.php">Listar Vendas</a></p>
        </div>
    
        <h1>Formulário de Atualização <br> de Vendas</h1>
        
        <form action="../Controller/atualizarVendas.php" method="post">

            <div class="inputs code">
                <label for="id">Código da Venda</label>
                <input type="number" name="id" id="id" placeholder="Digite o ID da venda" value="<?php echo $venda->getId(); ?>" readonly>
            </div>
            
            <div class="id_cliente">
                <label for="id_cliente">ID do Cliente</label>
                <input type="number" name="id_cliente" id="id_cliente" required placeholder="Digite o ID do Cliente" value="<?php echo $venda->getIdCliente(); ?>">
            </div>

            <div class="id_veiculo">
                <label for="id_veiculo">ID do Veículo</label>
                <input type="number" name="id_veiculo" id="id_veiculo" required placeholder="Digite o ID do Veículo" value="<?php echo $venda->getIdVeiculo(); ?>">
            </div>

            <div class="data">
                <label for="data">Data da Venda</label>
                <input type="date" name="data" id="data" required value="<?php echo $venda->getData(); ?>">
            </div>

            <div class="valor_pago">
                <label for="valor_pago">Valor Pago</label>
                <input type="number" name="valor_pago" id="valor_pago" maxlength="12" required placeholder="Digite o valor pago" value="<?php echo $venda->getValorPago(); ?>">
            </div>

            <div class="submit">
                <button type="submit" class="buttons">Atualizar Venda</button>
            </div>
            
        </form>
    </div>
</body>
</html>
