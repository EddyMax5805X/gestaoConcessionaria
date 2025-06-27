<?php

    session_start();

    $nome =  $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email']

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home - Gestão de Veiculos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            background: #e3e9ff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            flex-direction: column;
        }

        .container {
            background: #d5dcff;
            border-radius: 30px;
            padding: 50px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow:
                20px 20px 60px #aab8ff,
                -20px -20px 60px #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 0;
        }

        .container h1 {
            font-weight: 700;
            color: #2a3a99;
            margin-bottom: 25px;
            text-align: center;
            letter-spacing: 0.03em;
        }

        .btns {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 20px;
        }

        .buttons {
            width: 350px;
            flex: 1;
            padding: 16px 0;
            font-weight: 700;
            font-size: 1rem;
            color: #2a3a99;
            background: #d5dcff;
            border-radius: 20px;
            border: none;
            box-shadow:
                6px 6px 10px #a0afff,
                -6px -6px 10px #e2e7ff;
            cursor: pointer;
            transition:
                box-shadow 0.3s ease,
                background-color 0.3s ease,
                color 0.3s ease;
        }

        .buttons:hover {
            box-shadow:
                inset 5px 5px 8px #7288ff,
                inset -5px -5px 8px #cbd6ff;
            background-color: #2a3a99;
            color: #f0f4ff;
            font-weight: 800;

        }

        .perfil {
            color: black;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
            margin-left: 1100px;
            padding: 10px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid black;
            margin-bottom: 30px;
            margin-top: -100px;
            position: absolute;
            bottom: 620px;
        }

        .perfil i {
            font-size: 3rem;
        }

        .perfil span {
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <div class="perfil">
        <p><span><?php echo $nome." ".$sobrenome;?></span></br><?php echo $email;?></p>
        <i class="fa-solid fa-circle-user"></i>
    </div>
    <div class="container">
        <h1>Menu</h1>
        <div class="btns">
            <a href="../Clientes/View/cadastroClientes.php"><button class="buttons">Cadastrar Cliente</button></a>
            <a href="../Clientes/View/verClientes.php"><button class="buttons">Listar Clientes</button></a>
            <a href="../Vendas/View/cadastroVendas.php"><button class="buttons">Registrar Venda</button></a>
            <a href="../Vendas/View/listarVendas.php"><button class="buttons">Tabela de Vendas</button></a>
            <a href="../Veiculos/View/cadastroVeiculo.php"><button class="buttons">Cadastrar Veiculo</button></a>
            <a href="../Veiculos/View/listarVeiculo.php"><button class="buttons">Listar Veiculos</button></a>
        </div>
    </div>
</body>

</html>