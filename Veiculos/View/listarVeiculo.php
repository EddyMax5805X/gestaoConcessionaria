<?php
    session_start();

    $nome_S =  $_SESSION['nome'];
    $sobrenome_S = $_SESSION['sobrenome'];
    $email_S = $_SESSION['email'];
    $perfil_S = $_SESSION['perfil'];
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/listaDeVeiculos.css">
    <title>Gestão de Veículos</title>
</head>

<body>
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/homeVersion3.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="cadastroVeiculo.php">Cadastrar Veículo</a></li>
                <li class="a"><a href="../../Clientes/View/verClientes.php">Clientes</a></li>
                <li class="a"><a href="../../Vendas/View/listarVendas.php">Vendas</a></li>
            </ul>
            <div class="perfil">
                <p><span><?php echo $nome_S." ".$sobrenome_S . " - " ;?> <span id="perfil"><strong>(<?php echo $perfil_S;?>)</strong></span></br>
                    <?php echo $email_S;?></span></br>
                </p>
                <i class="fa-solid fa-circle-user"></i>
            </div>
        </nav>
    </header>
    <h1>Gestão de Veículos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Status</th>
                <th>Descrição</th>
                <th>Chassi</th>
                <th>Cor</th>
                <th>Cilindrada</th>
                <th>Transmissão</th>
                <th>Nº Chassi</th>
                <th>Quilometragem</th>
                <th>Combustível</th>
                <th colspan="3">Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("../../conexao.php");

            $sql = "SELECT * FROM veiculo;";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['marca']}</td>";
                    echo "<td>{$row['modelo']}</td>";
                    echo "<td>{$row['ano']}</td>";
                    echo "<td>{$row['preco']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "<td>{$row['descricao']}</td>";
                    echo "<td>{$row['chassi']}</td>";
                    echo "<td>{$row['cor']}</td>";
                    echo "<td>{$row['cilindrada']}</td>";
                    echo "<td>{$row['transmissao']}</td>";
                    echo "<td>{$row['numeroChassi']}</td>";
                    echo "<td>{$row['quilometragem']}</td>";
                    echo "<td>{$row['combustivel']}</td>";
                    echo "<td><a href='../Controller/removeVeiculo.php?id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja remover este veículo?\")'>Remover</a></td>";
                    echo "<td><a href='updateVeiculo.php?id={$row['id']}'>Atualizar</a></td>";
                    echo "<td><a href='visualizarVeiculo.php?id={$row['id']}'>Visualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='15'>Nenhum veículo encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>