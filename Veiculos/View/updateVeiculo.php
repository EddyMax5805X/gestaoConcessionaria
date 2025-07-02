<?php

    session_start();

    $nome =  $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email'];

    include_once("../Controller/controllerVeiculo.php");
    $id = $_GET['id'];
    $veiculo = searchVeiculo($id);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Formulário de Atualização de Veículos</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
      <div class="perfil">
                <p><span><?php echo $nome." ".$sobrenome;?></span></br><?php echo $email;?></p>
                <i class="fa-solid fa-circle-user"></i>
            </div>
    <div class="container">
        <div class="links">
            <p><a href="../home.php"><- Voltar ao Início</a></p>
            <p><a href="../View/listarVeiculo.php">Listar Veículos -></a></p>
        </div>
    
        <h1>Formulário de Atualização <br> de Veículos</h1>
        <form action="../Controller/atualizarVeiculo.php" method="post">
            <div class="inputs code">
                <input type="number" name="id" id="id" placeholder="Digite o ID (código) do Veículo" <?php echo "value={$veiculo->getID()} readonly" ?>>
                <label for="id">Código</label>
            </div>
            <div class="inputs marca">
                <select name="marca" id="marca" required>
                    <option value="" hidden disabled selected>Selecione a marca do veículo</option>
                    <option <?php if ($veiculo->getMarca() == "Aston-Martin") { echo "selected"; } ?> value="Aston-Martin">Aston-Martin</option>
                    <option <?php if ($veiculo->getMarca() == "Audi") { echo "selected"; } ?> value="Audi">Audi</option>
                    <option <?php if ($veiculo->getMarca() == "BMW") { echo "selected"; } ?> value="BMW">BMW</option>
                    <option <?php if ($veiculo->getMarca() == "Ferarri") { echo "selected"; } ?> value="Ferarri">Ferarri</option>
                    <option <?php if ($veiculo->getMarca() == "Ford") { echo "selected"; } ?> value="Ford">Ford</option>
                    <option <?php if ($veiculo->getMarca() == "Lamborghini") { echo "selected"; } ?> value="Lamborghini">Lamborghini</option>
                    <option <?php if ($veiculo->getMarca() == "Mac-Laren") { echo "selected"; } ?> value="Mac-Laren">Mac-Laren</option>
                    <option <?php if ($veiculo->getMarca() == "Mercedes") { echo "selected"; } ?> value="Mercedes">Mercedes</option>
                    <option <?php if ($veiculo->getMarca() == "Nissan") { echo "selected"; } ?> value="Nissan">Nissan</option>
                    <option <?php if ($veiculo->getMarca() == "Suzuki") { echo "selected"; } ?> value="Suzuki">Suzuki</option>
                    <option <?php if ($veiculo->getMarca() == "Toyota") { echo "selected"; } ?> value="Toyota">Toyota</option>
                    <option <?php if ($veiculo->getMarca() == "Volvo") { echo "selected"; } ?> value="Volvo">Volvo</option>
                    <option <?php if ($veiculo->getMarca() == "Volkswagen (VW)") { echo "selected"; } ?> value="Volkswagen (VW)">Volkswagen (VW)</option>
                </select>
                <label for="marca">Marca</label>
            </div>
            <div class="inputs modelo">
                <input type="text" name="modelo" id="modelo" required placeholder="Digite o modelo do veículo" <?php echo "value={$veiculo->getModelo()}" ?>>
                <label for="modelo">Modelo</label>
            </div>
            <div class="inputs ano">
                <input type="number" name="ano" id="ano" min="1950" max="2025" placeholder="Digite o ano de fabrico do veículo" <?php echo "value={$veiculo->getAno()}" ?>>
                <label for="ano">Ano de fabrico</label>
            </div>
            <div class="inputs preco">
                <input type="number" name="preco" id="preco" maxlength="8" placeholder="Digite o preço do veículo" <?php echo "value={$veiculo->getPreco()}" ?> required>
                <label for="preco">Preço</label>
            </div>
            <div class="radios status">
                <label>Status do veículo:</label><br>
                <input type="radio" name="status" id="status1" value="Disponivel" required <?php if($veiculo->getStatus() == "Disponivel") { echo "checked"; } ?>><label for="status1">Disponivel</label>
                <input type="radio" name="status" id="status2" value="Vendido" <?php if($veiculo->getStatus() == "Vendido") { echo "checked"; } ?>><label for="status2">Vendido</label>
                <input type="radio" name="status" id="status3" value="Reservado" <?php if($veiculo->getStatus() == "Reservado") { echo "checked"; } ?>><label for="status3">Reservado</label>
            </div>
            <div class="inputs desc">
                <textarea name="desc" id="desc" placeholder="Descrição do veículo (caracteristicas, especificações, etc)"><?php echo "{$veiculo->getDescricao()}" ?></textarea>
                <label for="desc">Descrição</label>
            </div>
            <span id="msgErro"></span>
            <div class="btns">
                <input type="reset" value="Limpar" name="limpar" class="buttons limpar">
                <input type="submit" value="Atualizar"  name="submit" class="buttons submit">
            </div>
        </form>
    </div>
</body>
</html>