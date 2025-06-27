<?php
    include_once("../Controller/Vendas.php");
    include_once("../Controller/vendas.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $id_cliente = $_POST['id_cliente'];
        $id_veiculo = $_POST['id_veiculo'];
        $data= $_POST['data'];
        $valor_pago = $_POST['valor_pago'];
      
        
        if (empty($id) or empty($id_cliente) or empty($id_veiculo) or empty($data) or empty($valor_pago) ) {
            echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        } else {
           $venda = new Venda(null, $id_cliente, $id_veiculo, $data, $valor_pago);
            addVenda($venda);
        }
    }

    ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Vendas</title>
    
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
            width: 100%;
            max-width: 550px;
            margin: 10px;
            padding: 20px;
            background: #d5dcff;
            border-radius: 30px;
            box-shadow: 20px 20px 60px #aab8ff, -20px -20px 60px #ffffff;
            color: #2a3a99;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .links {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .links a {
            color: #2a3a99;
            text-decoration: none;
            font-weight: 600;
        }

        .links a:hover {
            text-decoration: underline;
        }

        h1 {
            font-weight: 700;
            color: #2a3a99;
            text-align: center;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form label {
            font-weight: 600;
            color: #5664c7;
            margin-bottom: 5px;
        }

        form input, form select {
            width: 100%;
            padding: 14px 20px;
            font-size: 16px;
            border: none;
            border-radius: 20px;
            background: #d5dcff;
            color: #2a3a99;
            box-shadow: inset 6px 6px 8px #a0afff, inset -6px -6px 8px #e2e7ff;
            transition: box-shadow 0.5s ease;
        }

        form input:focus {
            outline: none;
            box-shadow: inset 3px 3px 6px #7288ff, inset -3px -3px 6px #e6ecff, 0 0 8px 2px rgba(50, 70, 255, 0.45);
        }

        .buttons {
            padding: 16px 0;
            font-weight: 700;
            font-size: 1rem;
            color: #2a3a99;
            background: #d5dcff;
            border-radius: 20px;
            border: none;
            box-shadow: 6px 6px 10px #a0afff, -6px -6px 10px #e2e7ff;
            cursor: pointer;
            transition: box-shadow 0.3s ease, background-color 0.3s ease, color 0.3s ease;
            user-select: none;
        }

        .buttons:hover {
            box-shadow: inset 5px 5px 8px #7288ff, inset -5px -5px 8px #cbd6ff;
            background-color: #2a3a99;
            color: #f0f4ff;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .links {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
        }
    </style>
    
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="container">
        
        <div class="links">
            <p><a href="../Home/home.php">Voltar ao Início</a></p>
            <p><a href="../View/listarVendas.php">Listar Vendas</a></p>
        </div>
    
        <h1>Formulário de Cadastro de Vendas</h1>
        
        <form action="../Controller/cadastrarVendas.php" method="post">
            
            <label for="id">ID DA VENDA</label>
            <input type="number" id="id" name="id" placeholder="ID DA VENDA">
           
            <label for="id_cliente">ID DO CLIENTE</label>
            <input type="number" id="id_cliente" name="id_cliente" placeholder="ID DO CLIENTE">
        
            <label for="id_veiculo">ID DO VEÍCULO</label>
            <input type="number" id="id_veiculo" name="id_veiculo" placeholder="ID DO VEÍCULO">

            <label for="data_venda">DATA DA VENDA</label>
            <input type="date" id="data_venda" name="data_venda">

            <label for="valor_pago">VALOR PAGO</label>
            <input type="number" id="valor_pago" name="valor_pago" placeholder="Valor Pago">

            <button type="submit" class="buttons">Cadastrar</button>
        
        </form>
    </div>
</body>

</html>
