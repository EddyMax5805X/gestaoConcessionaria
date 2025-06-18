<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Menu</h1>
        <div class="btns">
            <a href="../Clientes/View/cadastroClientes.php"><button class="buttons">Cadastrar Cliente</button></a>
            <a href="../Clientes/View/verClientes.php"><button class="buttons">Listar Clientes</button></a>
            <a href="#"><button class="buttons">Registrar Venda</button></a>
            <a href="#"><button class="buttons">Tabela de Vendas</button></a>
            <a href="../Veiculos/View/cadastroVeiculo.php"><button class="buttons">Cadastrar Veiculo</button></a>
            <a href="../Veiculos/View/listarVeiculo.php"><button class="buttons">Listar Veiculos</button></a>
        </div>
    </div>
</body>
</html>