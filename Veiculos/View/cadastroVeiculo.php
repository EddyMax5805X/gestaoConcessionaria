<?php

    session_start();

    $nome =  $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email'];
    $perfil = $_SESSION['perfil'];

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Formulário de Cadastro de Veículos</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="perfil">
        <p><span><?php echo $nome." ".$sobrenome;?></br>
        <?php echo $email;?></span></br>
        <span id="perfil"><strong>(<?php echo $perfil;?>)</strong></span> </p>
        <i class="fa-solid fa-circle-user"></i>
    </div>
    <div class="container">
        <div class="links">
            <p><a href="../../Home/home.php">Volta ao inicio</a></p>
            <p><a href="../View/listarVeiculo.php">Listar Veículos -></a></p>
        </div>
    
        <h1>Formulário de Cadastro de Veículos</h1>
        <form action="../Controller/cadastrarVeiculo.php" method="post">
            <div class="inputs marca">
                <select name="marca" id="marca" required>
                    <option value="" hidden disabled selected>Selecione a marca do veículo</option>
                    <option value="Aston-Martin">Aston-Martin</option>
                    <option value="Audi">Audi</option>
                    <option value="BMW">BMW</option>
                    <option value="Ferarri">Ferarri</option>
                    <option value="Ford">Ford</option>
                    <option value="Lamborghini">Lamborghini</option>
                    <option value="Mac-Laren">Mac-Laren</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Volvo">Volvo</option>
                    <option value="Volkswagen (VW)">Volkswagen (VW)</option>
                </select>
                <label for="marca">Marca</label>
            </div>
            <div class="inputs modelo">
                <input type="text" name="modelo" id="modelo" required placeholder="Digite o modelo do veículo">
                <label for="modelo">Modelo</label>
            </div>
            <div class="inputs ano">
                <input type="number" name="ano" id="ano" min="1950" max="2025" placeholder="Digite o ano de fabrico do veículo">
                <label for="ano">Ano de fabrico</label>
            </div>
            <div class="inputs preco">
                <input type="number" name="preco" id="preco" maxlength="8" placeholder="Digite o preço do veículo" required>
                <label for="preco">Preço</label>
            </div>
            <div class="radios status">
                <label>Status do veículo:</label><br>
                <input type="radio" name="status" id="status1" value="Disponivel" required checked><label for="status1">Disponivel</label>
                <input type="radio" name="status" id="status2" value="Vendido"><label for="status2">Vendido</label>
                <input type="radio" name="status" id="status3" value="Reservado"><label for="status3">Reservado</label>
            </div>
            <div class="inputs desc">
                <textarea name="desc" id="desc" placeholder="Descrição do veículo (caracteristicas, especificações, etc)" ></textarea>
                <label for="desc">Descrição</label>
            </div>
            <span id="msgErro"></span>
            <div class="btns">
                <input type="reset" value="Limpar" name="limpar" class="buttons limpar">
                <input type="submit" value="Submeter"  name="submit" class="buttons submit">
            </div>
        </form>
    </div>
</body>
</html>