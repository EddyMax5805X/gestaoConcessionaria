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
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/homeVersion3.php"><i class="fa-solid fa-house"></i></a>
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
        <h1>Formulário de Cadastro de Veículos</h1>
        <form action="../Controller/cadastrarVeiculo.php" method="post">
            <div class="sides">
                <div class="left">
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
                        <option value="Outra">Outra</option>
                    </select>
                    <label for="marca">Marca</label>
                </div>
                <div class="inputs marcaInput">
                    <input type="text" name="marcaInput" id="marcaInput" placeholder="Digite a marca do veículo">
                    <label for="marcaInput">Marca do Veiculo</label>
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
                <div class="radios transmissao">
                    <label>Transmissão:</label><br>
                    <input type="radio" name="transmissao" id="manual" value="Manual" required checked><label for="manual">Manual</label>
                    <input type="radio" name="transmissao" id="automatico" value="Automático"><label for="automatico">Automático</label>
                </div>
            </div>
            <div class="right">
                <div class="inputs chassi">
                    <input type="text" name="chassi" id="chassi" placeholder="Chassi">
                    <label for="chassi">Chassi</label>
                </div>
                <div class="numeroChassi inputs">
                    <input type="text" name="numeroChassi" id="numeroChassi" placeholder="Número do Chassi">
                    <label for="numeroChassi">Número do Chassi</label>
                </div>
                <div class="inputs cilindrada">
                    <input type="text" name="cilindrada" id="cilindrada" placeholder="Cilindrada">
                    <label for="cilindrada">Cilindrada</label>
                </div>
                <div class="cor inputs">
                    <select name="cor" id="cor">
                        <option value="" hidden disabled selected>Selecione uma das opções de cores</option>
                        <option value="Branca">Branca</option>
                        <option value="Preta">Preta</option>
                        <option value="Vermelha">Vermelha</option>
                        <option value="Azul">Azul</option>
                        <option value="Prata">Prata</option>
                        <option value="Cinza">Cinza</option>
                        <option value="Verde">Verde</option>
                        <option value="Amarela">Amarela</option>
                        <option value="Laranja">Laranja</option>
                        <option value="Roxa">Roxa</option>
                        <option value="Marrom">Marrom</option>
                        <option value="Dourada">Dourada</option>
                        <option value="Outra">Outra</option>
                    </select>
                    <label for="cor">Cor</label>
                </div>
                <div class="inputs corInput">
                    <input type="text" name="corInput" id="corInput" placeholder="Digite a cor do veículo">
                    <label for="corInput">Cor do Veículo</label>
                </div>
                <div class="inputs combustivel">
                    <select name="combustivel" id="combustivel">
                        <option value="" hidden disabled selected>Selecione o tipo de combustível</option>
                        <option value="Gasolina">Gasolina</option>
                        <option value="Gasóleo">Gasóleo (Diesel)</option>
                        <option value="Elétrico">Elétrico</option>
                        <option value="Híbrido">Híbrido</option>
                    </select>
                    <label for="combustivel">Combustível</label>
                </div>
                
            </div>
            </div>
            
            <div class="inputs desc">
                <textarea name="desc" id="desc" placeholder="Descrição do veículo (caracteristicas, especificações, etc)" ></textarea>
                <label for="desc">Descrição</label>
            </div>
            <span id="msgErro"></span>
            <div class="btns">
                <input type="reset" value="Limpar" name="limpar" class="buttons limpar">
                <input type="submit" value="Submeter" name="submit" class="buttons submit">
            </div>
        </form>
    </div>
</body>
</html>