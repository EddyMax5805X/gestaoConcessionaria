<?php
session_start();

$nome =  $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

include_once("../Controller/controllerVeiculo.php");
$id = $_GET['id'];
$veiculo = searchVeiculo($id);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Veículo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/home2.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="listarVeiculo.php">Listar Veiculos</a></li>
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
        <h1>Formulário de Atualização de Veículo</h1>
        <form action="../Controller/atualizarVeiculo.php" method="post">
            <input type="hidden" name="id" value="<?php echo $veiculo->getID(); ?>">

            <div class="inputs marca">
                <select name="marca" required>
                    <?php
                    $marcas = ["Aston-Martin","Audi","BMW","Ferarri","Ford","Lamborghini","Mac-Laren","Mercedes","Nissan","Suzuki","Toyota","Volvo","Volkswagen (VW)"];
                    foreach ($marcas as $marca) {
                        $selected = $veiculo->getMarca() === $marca ? "selected" : "";
                        echo "<option value=\"$marca\" $selected>$marca</option>";
                    }
                    ?>
                </select>
                <label for="marca">Marca</label>
            </div>

            <div class="inputs modelo">
                <input type="text" name="modelo" required value="<?php echo $veiculo->getModelo(); ?>">
                <label for="modelo">Modelo</label>
            </div>

            <div class="inputs ano">
                <input type="number" name="ano" min="1950" max="2025" required value="<?php echo $veiculo->getAno(); ?>">
                <label for="ano">Ano de Fabrico</label>
            </div>

            <div class="inputs preco">
                <input type="number" name="preco" step="0.01" required value="<?php echo $veiculo->getPreco(); ?>">
                <label for="preco">Preço</label>
            </div>

            <div class="radios status">
                <label>Status do veículo:</label><br>
                <?php
                $statusOptions = ["Disponivel", "Vendido", "Reservado"];
                foreach ($statusOptions as $status) {
                    $checked = $veiculo->getStatus() === $status ? "checked" : "";
                    echo "<input type=\"radio\" name=\"status\" value=\"$status\" $checked> <label>$status</label>";
                }
                ?>
            </div>

            <div class="inputs chassi">
                <select name="chassi" required>
                    <?php
                    $tipos = ["Monobloco", "Sobre-chassi", "Space-frame", "Escada"];
                    foreach ($tipos as $tipo) {
                        $selected = $veiculo->getChassi() === $tipo ? "selected" : "";
                        echo "<option value=\"$tipo\" $selected>$tipo</option>";
                    }
                    ?>
                </select>
                <label for="chassi">Tipo de Chassi</label>
            </div>

            <div class="inputs cor">
                <input type="text" name="cor" required value="<?php echo $veiculo->getCor(); ?>">
                <label for="cor">Cor</label>
            </div>

            <div class="inputs cilindrada">
                <input type="number" name="cilindrada" required value="<?php echo $veiculo->getCilindrada(); ?>">
                <label for="cilindrada">Cilindrada (cc)</label>
            </div>

            <div class="radios transmissao">
                <label>Tipo de transmissão:</label><br>
                <?php
                $transmissoes = ["Manual", "Automatico", "Semi-automatico"];
                foreach ($transmissoes as $tipo) {
                    $checked = $veiculo->getTransmissao() === $tipo ? "checked" : "";
                    echo "<input type=\"radio\" name=\"transmissao\" value=\"$tipo\" $checked> <label>$tipo</label>";
                }
                ?>
            </div>

            <div class="inputs numeroChassi">
                <input type="text" name="numeroChassi" required value="<?php echo $veiculo->getNumeroChassi(); ?>">
                <label for="numeroChassi">Número do Chassi (VIN)</label>
            </div>

            <div class="inputs quilometragem">
                <input type="number" name="quilometragem" required value="<?php echo $veiculo->getQuilometragem(); ?>">
                <label for="quilometragem">Quilometragem (km)</label>
            </div>

            <div class="inputs combustivel">
                <select name="combustivel" required>
                    <?php
                    $tiposCombustivel = ["Gasolina", "Diesel", "Eletrico", "Hibrido", "Flex"];
                    foreach ($tiposCombustivel as $tipo) {
                        $selected = $veiculo->getCombustivel() === $tipo ? "selected" : "";
                        echo "<option value=\"$tipo\" $selected>$tipo</option>";
                    }
                    ?>
                </select>
                <label for="combustivel">Combustível</label>
            </div>

            <div class="inputs desc">
                <textarea name="descricao" required><?php echo $veiculo->getDescricao(); ?></textarea>
                <label for="descricao">Descrição</label>
            </div>

            <span id="msgErro"></span>
            <div class="btns">
                <input type="reset" value="Limpar" class="buttons limpar">
                <input type="submit" value="Atualizar" name="submit" class="buttons submit">
            </div>
        </form>
    </div>
</body>
</html>
