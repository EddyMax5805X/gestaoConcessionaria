<?php 
    session_start();
    $nome = $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'] ?? '';
    $email = $_SESSION['email'] ?? '';
    $perfil = $_SESSION['perfil'] ?? '';

    $ultimo_login = isset($_COOKIE["ultimo_login_$nome"]) ? 
                    htmlspecialchars($_COOKIE["ultimo_login_$nome"]) : 
                    'Primeiro acesso';

    setcookie(
        "ultimo_login_$nome",
        date('d/m/Y H:i:s'),
        time() + (30 * 24 * 60 * 60),
        "/"
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="homeVersion3.css">
    <title>Home</title>
</head>

<body>
    <div class="video">
        <video src="homeVid02.mp4" autoplay muted loop></video>
    </div>
    <div class="container">
        <header>
                <nav>
                    <a id="ahh" href="homeVersion3.php" style="visibility: hidden;"><i class="fa-solid fa-house"></i></a>
                    <ul style="visibility: hidden;">
                        <li class="a"><a href="../Veiculos/View/listarVeiculo.php">Veiculos</a></li>
                        <li class="a"><a href="../Clientes/View/verClientes.php">Clientes</a></li>
                        <li class="a"><a href="../Vendas/View/listarVendas.php">Vendas</a></li>
                    </ul>
                    <div class="perfil">
                        <p><span><?php echo $nome." ".$sobrenome . " - " ;?> <span id="perfil"><strong>(<?php echo $perfil;?>)</strong></span></br>
                                <?php echo $email;?></span></br>
                        </p>
                        <i class="fa-solid fa-circle-user"></i>
                    </div>
                </nav>
        </header>
            <aside id="mySidebar" class="sidebar">
                <a id="linkHome" href="homeVersion3.php"><i class="fa-solid fa-house"></i></a>
                <div class="perfil-info">
                    <h2>Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h2>
                    <p>Último login: <?php echo $ultimo_login; ?></p>
                    <p>Perfil: <?php echo htmlspecialchars($perfil); ?></p>
                </div>

                <a class="links link1" id="menuItem" href="javascript:void(0)" data-target='submenu1'>
                    <i class="fa-solid fa-car"></i> 
                    <span class="links-text">Veículos</span>
                </a>
                <div id="submenu1" class="submenu">
                    <a href="../Veiculos/View/cadastroVeiculo.php"><i class="fa-solid fa-circle-plus"></i> Cadastrar Veículo</a>
                    <a href="../Veiculos/View/listarVeiculo.php"><i class="fa-solid fa-table-list"></i> Listar Veículos</a>
                </div>
                <a class="links link2" id="menuItem" href="javascript:void(0)" data-target='submenu2'>
                    <i class="fa-solid fa-person"></i> 
                    <span class="links-text">Clientes</span>
                </a>
                <div id="submenu2" class="submenu">
                    <a href="../Clientes/View/cadastroClientes.php"><i class="fa-solid fa-circle-plus"></i> Cadastrar Cliente</a>
                    <a href="../Clientes/View/verClientes.php"><i class="fa-solid fa-table-list"></i> Listar Clientes</a>
                </div>
                <a class="links link3" id="menuItem" href="javascript:void(0)" data-target='submenu3'>
                    <i class="fa-solid fa-shopping-cart"></i> 
                    <span class="links-text">Vendas</span>
                </a>
                <div id="submenu3" class="submenu">
                    <a href="../Vendas/View/cadastroVendas.php"><i class="fa-solid fa-circle-plus"></i> Cadastrar Venda</a>
                    <a href="../Vendas/View/listarVendas.php"><i class="fa-solid fa-table-list"></i> Listar Vendas</a>
                </div>
                <a class="links link4" href="../Usuarios/cadastroUsuario.php">
                    <i class="fa-solid fa-user-plus"></i> 
                    <span class="links-text">Cadastrar User</span>
                </a>
                <a class="links link5" href="../Usuarios/index.php">
                    <i class="fa-solid fa-door-open"></i> 
                    <span class="links-text">Sair</span>
                </a>
            </aside>
            <div class="main-content">
                <h1>Bem-vindo ao Sistema de Gerenciamento</h1>
                <p>Use o menu para navegar entre as seções.</p>
                <p>Esta é uma plataforma para gerenciar veículos, clientes e vendas.</p>
            </div>
    <script src="script.js"></script>
</body>

</html>