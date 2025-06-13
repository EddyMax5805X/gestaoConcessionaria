<?php 
    include_once("..\..\controller\controllerVeiculo.php");
    $veiculos = listOfVeiculos();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veiculos</title>
    <style>
        /* Reset */
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
            max-width: 100%;
            margin: 40px auto;
            padding: 20px;
            background: #d5dcff; /* azul pastel vivo */
            border-radius: 30px;
            box-shadow:
                18px 18px 40px #a0afff,
                -18px -18px 40px #ffffff;
            color: #2a3a99;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: auto;
        }
        .container h1 {
            font-weight: 700;
            color: #2a3a99;
            margin-bottom: 15px;
            text-align: center;
            letter-spacing: 0.05em;
        }
        /* Estilizando a tabela em si */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 14px; /* espaçamento vertical entre linhas para efeito flutuante */
            min-width: 800px; /* ajuda pessoas com dados mais largos */
        }

        /* Cabeçalho da tabela */
        thead tr {
            background: #5671f5; /* azul vivo */
            box-shadow: inset 4px 4px 10px #445dde,
                        inset -4px -4px 10px #6b82ff;
            border-radius: 20px;
        }

        /* Cabeçalho - células arredondadas para cantos */
        thead th {
            padding: 18px 15px;
            color: #f0f4ff;
            font-weight: 700;
            font-size: 1.1rem;
            text-align: left;
            user-select: none;
        }

        /* Arredondar cantos do cabeçalho */
        thead th:first-child {
            border-top-left-radius: 20px;
        }
        thead th:last-child {
            border-top-right-radius: 20px;
        }

        /* links no cabeçalho com mesma cor e estilo */
        thead th a {
            color: #f0f4ff;
            font-weight: 700;
            text-decoration: none;
            transition: color 0.5s ease;
        }

        thead th a:hover {
            color: #c0c9ff;
            text-decoration: underline;
        }

        /* Linhas do corpo da tabela - fundo e sombra neomorphic */
        tbody tr {
            background: #d5dcff;
            box-shadow:
                8px 8px 20px #a0afff,
                -8px -8px 20px #e2e7ff;
            border-radius: 20px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Linhas pares com tom levemente diferente para facilitar leitura */
        tbody tr:nth-child(even) {
            background: #e1e8ff;
            box-shadow:
                8px 8px 18px #8ba0ff,
                -8px -8px 18px #f0f4ff;
        }

        /* Estilo células corpo */
        tbody td {
            padding: 16px 15px;
            color: #2a3a99;
            font-size: 1rem;
            vertical-align: middle;
            border: none;
            user-select: text;

            white-space: nowrap;        /* texto não quebra para outra linha */
            overflow: hidden;           /* oculta o texto excedente */
            text-overflow: ellipsis;    /* coloca reticências '...' no fim */
        }

        /* Corte específico para coluna Descrição */
        tbody td[data-label="Descrição"] {
            max-width: 200px;  /* largura máxima para o texto da descrição */
            white-space: nowrap;        /* não quebra linha */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Borda fina sutil entre colunas */
        tbody td + td {
            border-left: 1px solid #a9b0fa33; /* azul translúcido */
        }

        /* Links nas células corpo com estilo harmônico */
        tbody td a {
            color: #2a3a99; /* mesmo tom azul escuro do texto */
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;       /* evita quebra em links */
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }

        tbody td a:hover {
            color: #5671f5;
            text-decoration: underline;
        }

        /* Estado hover da linha */
        tbody tr:hover {
            background: #5671f5;
            box-shadow:
                inset 4px 4px 12px #445dde,
                inset -4px -4px 12px #6b82ff;
            color: #f0f4ff;
            cursor: pointer;
            transition: background-color 0.25s ease, box-shadow 0.25s ease, color 0.25s ease;
        }

        /* Textos nas células na linha hover */
        tbody tr:hover td {
            color: #f0f4ff;
        }

        /* Links na linha hover ficam mais claros */
        tbody tr:hover td a {
            color: #cbd4ff;
            cursor: pointer;
        }

        /* Scrollbar customizada para container da tabela */
        .container::-webkit-scrollbar {
            height: 9px;
        }

        .container::-webkit-scrollbar-track {
            background: #d5dcff;
            border-radius: 20px;
        }

        .container::-webkit-scrollbar-thumb {
            background: #5671f5;
            border-radius: 20px;
        }

        /* Responsividade */

        @media (max-width: 720px) {
            table {
                min-width: 600px;
            }
        }

        @media (max-width: 480px) {
            /* simplificar visual da tabela em telas pequenas */
            thead {
                display: none; /* esconde cabeçalho em celular */
            }

            tbody tr {
                display: block;
                margin-bottom: 25px;
                box-shadow:
                    8px 8px 20px #a0afff,
                    -8px -8px 20px #e2e7ff;
                border-radius: 20px;
                padding: 20px;
            }

            tbody tr:nth-child(even) {
                background: #d5dcff;
            }

            tbody td {
                display: flex;
                justify-content: space-between;
                padding: 12px 0;
                border: none !important;
                font-size: 0.9rem;
                white-space: normal; /* para celular, permitir quebra */
                overflow: visible;
                text-overflow: clip;
            }

            tbody td::before {
                content: attr(data-label);
                font-weight: 700;
                color: #344070;
                flex-basis: 45%;
                user-select: none;
                white-space: normal;
            }

            tbody td a {
                white-space: nowrap;
                font-weight: 600;
                color: #5671f5;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Veículos Cadastrados</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Tipo de Preço</th>
                <th>A partir de</th>
                <th>Status</th>
                <th>Descrição</th>
                <th><a href="cadastroVeiculo.html">+Add</a></th>
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
                                    <td data-label='Preço'>MZN " . number_format($carro->getPreco(), 2, '.', ',') ."</td>
                                    <td data-label='Tipo de Preço'>{$carro->getTipo()}</td>
                                    <td data-label='A partir de'>{$carro->getData()}</td>
                                    <td data-label='Status'>{$carro->getStatus()}</td>
                                    <td data-label='Descrição'>{$carro->getDescricao()}</td>
                                    <td data-label='Ações'><a href='updateVeiculo.php'>Modificar</a> &nbsp;&nbsp; <a href='#'>Status</a> &nbsp;&nbsp; <a href='removeVeiculo.php?id={$carro->getID()}'>Remover</a></td>
                                </tr>
                            ";  
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>