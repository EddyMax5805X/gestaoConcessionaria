<?php
session_start();

// Verify if user is logged 

$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'] ?? '';
$email = $_SESSION['email'] ?? '';
$perfil = $_SESSION['perfil'] ?? '';

$ultimo_login = $_COOKIE["ultimo_logout_$nome"] ?? 'Primeiro acesso';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../Home/home3.css">
    <title>Home</title>
    <style>
        #ultimo-login {
            position: fixed;
            top: 10px;
            left: 10px;
            background: rgba(42, 58, 153, 0.9);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            z-index: 1000;
        }
    </style>
</head>

<body data-perfil="<?php echo htmlspecialchars($perfil); ?>">

    <!-- Last login display -->
    <div id="ultimo-login">
        <i class="fas fa-clock"></i> Último login: <?php echo $ultimo_login; ?>
    </div>

    <section>
        <div class="background-section">
            <video src="Home.mp4" autoplay muted loop></video>
        </div>
        <div class="box">
            <header>
                <nav id="navbar" class="nav-enhanced">
                    <i class="fa-solid fa-house"></i>
                    <ul id="nav_list">
                        <li class="nav_item" id="btnClientes"><a href="../Clientes/View/verClientes.php">Clientes</a></li>
                        <li class="nav_item"><a href="../Veiculos/View/listarVeiculo.php">Veículos</a></li>
                        <li class="nav_item" id="btnVendas"><a href="../Vendas/View/listarVendas.php">Vendas</a></li>
                        <li class="nav_item"><a href="../Usuarios/cadastroUsuario.php">Cadastro</a></li>
                        <li class="nav_item"><a href="../Auditoria/View/listaAuditoria.php">Auditoria</a></li>
                        <li class="nav_item"><a href="../Usuarios/index.php">Sair</a></li>
                    </ul>
                </nav>
            </header>

            <div id="texto">
                <h1>Bem-vindo à sua área administrativa da concessionária!</h1>
                <p>Explore nosso sistema para gerenciar clientes, veículos e vendas de forma eficiente.</p>
            </div>

            <div class="perfil">
                <p>
                    <span><?php echo htmlspecialchars($nome) . " " . htmlspecialchars($sobrenome); ?></span><br>
                    <span><?php echo htmlspecialchars($email); ?></span><br>
                    <span id="perfil"><strong>(<?php echo htmlspecialchars($perfil); ?>)</strong></span>
                </p>
                <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>