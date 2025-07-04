<?php
session_start();

$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

$id = $_GET['id'];

include_once("../Controller/controllerVeiculo.php");
$veiculo = searchVeiculo($id);

if (!$veiculo) {
    header("Location: listarVeiculo.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <title>Visualizar Veículo - <?php echo $veiculo->getModelo(); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../style/visualizar.css" />
</head>
<body data-perfil="<?php echo $perfil; ?>">
    <div class="perfil">
        <p><span><?php echo $nome." ".$sobrenome;?></br>
        <?php echo $email;?></span></br>
        <span id="perfil"><strong>(<?php echo $perfil;?>)</strong></span> </p>
        <i class="fa-solid fa-circle-user"></i>
    </div>
        <header>
            <nav>
                <ul class="nav-links">
                    <li><a href="../../Home/home2.php">Início</a></li>
                    <li><a href="../View/listarVeiculo.php">Lista de Veículos</a></li>
                    <li><a href="../View/cadastroVeiculo.php">Cadastrar Veículo</a></li>
                </ul>
            </nav>
        </header>
    <div class="container">
        <h1>Detalhes do Veículo</h1>

        <div class="details-card">
            <div class="detail-row">
                <span class="label">ID:</span>
                <span class="value"><?php echo $veiculo->getID(); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Marca:</span>
                <span class="value"><?php echo $veiculo->getMarca(); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Modelo:</span>
                <span class="value"><?php echo $veiculo->getModelo(); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Ano:</span>
                <span class="value"><?php echo $veiculo->getAno(); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Preço:</span>
                <span class="value">MZN <?php echo number_format($veiculo->getPreco(), 2, '.', ','); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Status:</span>
                <span class="value"><?php echo $veiculo->getStatus(); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Descrição:</span>
                <span class="value"><?php echo nl2br($veiculo->getDescricao()); ?></span>
            </div>

            <div class="actions">
                <a href="../View/updateVeiculo.php?id=<?php echo $veiculo->getID(); ?>" class="button modify-btn">
                    <i class="fa-solid fa-pen-to-square"></i> Modificar
                </a>
                <a href="../Controller/removeVeiculo.php?id=<?php echo $veiculo->getID(); ?>" class="button remove-btn" onclick="return confirm('Deseja mesmo remover este veículo?')">
                    <i class="fa-solid fa-trash"></i> Remover
                </a>
                <a href="../View/listarVeiculo.php" class="button back-btn">
                    <i class="fa-solid fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
    <script src="../js/scriptVisualizar.js"></script>
</body>
</html>