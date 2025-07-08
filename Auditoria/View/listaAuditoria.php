<?php
session_start();

$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

include("../../conexao.php");

// Receber filtros do formulário (GET)
$data_inicial = $_GET['data_inicial'] ?? '';
$data_final = $_GET['data_final'] ?? '';
$acao = $_GET['acao'] ?? '';

// Montar a consulta básica
$sql = "SELECT * FROM auditoria WHERE 1=1";

// Adicionar filtros se preenchidos
if ($data_inicial != '') {
    // Trocar T por espaço para formato correto do MySQL datetime
    $data_inicial = str_replace('T', ' ', $data_inicial) . ':00';
    $sql .= " AND data_hora >= '$data_inicial'";
}
if ($data_final != '') {
    $data_final = str_replace('T', ' ', $data_final) . ':00';
    $sql .= " AND data_hora <= '$data_final'";
}
if ($acao != '') {
    $sql .= " AND acao = '$acao'";
}

$sql .= " ORDER BY data_hora DESC";

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/lista.css">
    <title>Document</title>
</head>
<body>

    <div class="perfil">
        <p><span><?php echo $nome." ".$sobrenome;?></br>
        <?php echo $email;?></span></br>
        <span id="perfil"><strong>(<?php echo $perfil;?>)</strong></span> </p>
        <i class="fa-solid fa-circle-user"></i>
    </div>
    <h1>Registros de Auditoria</h1>

    <form method="GET" action="">
        Data inicial: <input type="datetime-local" name="data_inicial" value="<?= htmlspecialchars($_GET['data_inicial'] ?? '') ?>" />
        Data final: <input type="datetime-local" name="data_final" value="<?= htmlspecialchars($_GET['data_final'] ?? '') ?>" />
        Ação:
        <select name="acao">
            <option value="">Todos</option>
            <option value="Login" <?= $acao == 'Login' ? 'selected' : '' ?>>Login</option>
            <option value="Atualizar" <?= $acao == 'Atualizar' ? 'selected' : '' ?>>Atualizar</option>
            <option value="Remover" <?= $acao == 'Remover' ? 'selected' : '' ?>>Remover</option>
            <option value="Cadastro" <?= $acao == 'Cadastro' ? 'selected' : '' ?>>Cadastro</option>
        </select>
        <button type="submit">Filtrar</button>
        <button type="button" onclick="window.location='<?= $_SERVER['PHP_SELF'] ?>'">Limpar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Perfil</th>
                <th>Ação</th>
                <th>Tabela</th>
                <th>ID Registro</th>
                <th>Data/Hora</th>
                <th>Visualizar</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultado && $resultado->num_rows > 0): ?>
                <?php while ($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['nome_do_usuario']) ?></td>
                        <td><?= htmlspecialchars($row['perfil_do_usuario']) ?></td>
                        <td><?= htmlspecialchars($row['acao']) ?></td>
                        <td><?= htmlspecialchars($row['tabela_afetada']) ?></td>
                        <td><?= htmlspecialchars($row['ID_do_registro']) ?></td>
                        <td><?= htmlspecialchars($row['data_hora']) ?></td>
                        <td><a href="visualizarAuditoria.php?id=<?php echo $row['id']; ?>">Visualizar</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="9">Nenhum registro encontrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>
