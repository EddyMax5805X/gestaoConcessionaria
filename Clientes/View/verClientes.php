<?php

    session_start();

    $nome =  $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email'];
    $perfil = $_SESSION['perfil'];


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    include("../Controller/conexao.php");
    include("../Controller/metodos.php");

    if (isset($_GET["id"])) {
        $idCliente = $_GET["id"];
        removerCliente($idCliente);
    } else {
       
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/verCliente2.css">
    <title>Gestão de Clientes</title>
</head>

<body>
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/homeVersion3.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="cadastroClientes.php">Cadastrar Cliente</a></li>
                <li class="a"><a href="../../Veiculos/View/listarVeiculo.php">Veiculos</a></li>
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
        <h1>Gestão de Clientes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Contacto</th>
                    <th>Endereço</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../Controller/conexao.php");

                $sql = "SELECT * FROM cliente;";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['nome']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['contacto']}</td>";
                        echo "<td>{$row['endereco']}</td>";
                        echo "<td><a href='verClientes.php?id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja remover este cliente?\")'>Remover</a></td>";
                        echo "<td><a href='atualizarClientes.php?id={$row['id']}'>Atualizar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Nenhum cliente encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>