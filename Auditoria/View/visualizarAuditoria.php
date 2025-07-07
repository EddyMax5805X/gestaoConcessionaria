<?php
session_start();

$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

$id = $_GET['id'];

include_once("../Controller/metodos.php");
$auditoria = buscarAuditoriaPorId($id);

if (!$auditoria) {
    header("Location: listarAuditoria.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <title>Visualizar Auditoria - ID <?php echo $auditoria->getId(); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../style/visualizar2.css" />
</head>

<body data-perfil="<?php echo $perfil; ?>">
    <div class="perfil">
        <p><span><?php echo $nome . " " . $sobrenome; ?><br />
                <?php echo $email; ?></span><br />
            <span id="perfil"><strong>(<?php echo $perfil; ?>)</strong></span>
        </p>
        <i class="fa-solid fa-circle-user"></i>
    </div>
    <header>
        <nav>
            <ul class="nav-links">
                <li><a href="../../Home/home2.php">Início</a></li>
                <li><a href="../View/listaAuditoria.php">Lista de Auditorias</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Detalhes da Auditoria</h1>

        <div class="details-card">
            <div class="detail-row">
                <span class="label">ID:</span>
                <span class="value"><?php echo $auditoria->getId(); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Usuário:</span>
                <span class="value"><?php echo ($auditoria->getNomeDoUsuario()); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Perfil:</span>
                <span class="value"><?php echo ($auditoria->getPerfilDoUsuario()); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Ação:</span>
                <span class="value"><?php echo ($auditoria->getAcao()); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Tabela Afetada:</span>
                <span class="value"><?php echo ($auditoria->getTabelaAfetada()); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">ID do Registro:</span>
                <span class="value"><?php echo ($auditoria->getIDDoRegistro()); ?></span>
            </div>
            <?php if ($auditoria->getAcao() === "Remover"): ?>
            <?php elseif ($auditoria->getAcao() === "Atualizar"): ?>
                <div class="detail-row">
                    <span class="label">Valores Antigos:</span>
                    <span class="value"><?php echo nl2br(str_replace(',', '<br>', $auditoria->getValoresAnteriores())); ?></span>
                </div>
                <div class="detail-row">
                    <span class="label">Valores Recentes:</span>
                    <span class="value"><?php echo nl2br(str_replace(',', '<br>', $auditoria->getValoresNovos())); ?></span>
                </div>
            <?php elseif ($auditoria->getAcao() === "Cadastro"): ?>
                <div class="detail-row">
                    <span class="label">Valores Adicionados:</span>
                    <span class="value"><?php echo nl2br(str_replace(',', '<br>', $auditoria->getValoresNovos())); ?></span>
                </div>
            <?php elseif ($auditoria->getAcao() === "Login"): ?>
                <div class="detail-row">
                    <span class="label">Dados do Usuario:</span>
                    <span class="value"><?php echo nl2br(str_replace(',', '<br>', $auditoria->getValoresNovos())); ?></span>
                </div>
            <?php else: ?>
                <div class="detail-row">
                    <span class="label">Erro:</span>
                    <span class="value">Ação desconhecida.</span>
                </div>
            <?php endif; ?>
            <div class="detail-row">
                <span class="label">Data/Hora:</span>
                <span class="value"><?php echo $auditoria->getDataHora(); ?></span>
            </div>
        </div>
    </div>
</body>

</html>