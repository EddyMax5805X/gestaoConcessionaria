<?php
session_start();

$nome =  $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

include("../../conexao.php");

// Receber filtros do formulário (GET)
$data_inicial = $_GET['data_inicial'] ?? '';
$data_final = $_GET['data_final'] ?? '';
$acao = $_GET['acao'] ?? '';

// Montar a consulta com os filtros
$sql = "SELECT * FROM auditoria WHERE 1=1";

if (!empty($data_inicial)) {
    $data_inicial = str_replace('T', ' ', $data_inicial) . ':00';
    $sql .= " AND data_hora >= '$data_inicial'";
}
if (!empty($data_final)) {
    $data_final = str_replace('T', ' ', $data_final) . ':00';
    $sql .= " AND data_hora <= '$data_final'";
}
if (!empty($acao)) {
    $sql .= " AND acao = '$acao'";
}

$sql .= " ORDER BY data_hora DESC";

$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/listaDeVeiculos.css">
    <title>Lista de Veiculos</title>
=======
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/lista.css">
    <title>Auditoria</title>
>>>>>>> f0997e8 (Auditoria)
</head>
<body data-perfil="<?php echo $perfil; ?>">
<<<<<<< HEAD
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/homeVersion3.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="cadastroVeiculo.php">Cadastrar Veiculo</a></li>
                <li class="a"><a href="../../Clientes/View/verClientes.php">Clientes</a></li>
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
        <h1>Lista de Veículos Cadastrados</h1>
=======
    <div class="container">
        <div class="perfil">
            <p><span><?php echo $nome . " " . $sobrenome; ?></br>
            <?php echo $email; ?></span></br>
            <span id="perfil"><strong>(<?php echo $perfil; ?>)</strong></span> </p>
            <i class="fa-solid fa-circle-user"></i>
        </div>

        <header>
            <nav>
                <ul class="nav-links">
                    <li><a href="../../Home/home2.php">Início</a></li>
                    <li><a href="../../Usuarios/View/listarUsuarios.php">Usuários</a></li>
                </ul>
            </nav>
        </header>

        <h1>Registros de Auditoria</h1>

        <form method="GET" action="">
            <label for="data_inicial">Data inicial:</label>
            <input type="datetime-local" name="data_inicial" id="data_inicial" value="<?= htmlspecialchars($data_inicial) ?>" />
            
            <label for="data_final">Data final:</label>
            <input type="datetime-local" name="data_final" id="data_final" value="<?= htmlspecialchars($data_final) ?>" />
            
            <label for="acao">Ação:</label>
            <select name="acao" id="acao">
                <option value="">Todos</option>
                <option value="Login" <?= $acao == 'Login' ? 'selected' : '' ?>>Login</option>
                <option value="Atualizar" <?= $acao == 'Atualizar' ? 'selected' : '' ?>>Atualizar</option>
                <option value="Remover" <?= $acao == 'Remover' ? 'selected' : '' ?>>Remover</option>
                <option value="Cadastrar" <?= $acao == 'Cadastrar' ? 'selected' : '' ?>>Cadastrar</option>
            </select>
            
            <button type="submit">Filtrar</button>
            <button type="button" onclick="limparFiltros()">Limpar</button>
        </form>

>>>>>>> f0997e8 (Auditoria)
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
                    <th>Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->num_rows > 0): ?>
                    <?php while ($row = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td data-label="ID"><?= htmlspecialchars($row['id']) ?></td>
                            <td data-label="Usuário"><?= htmlspecialchars($row['nome_do_usuario']) ?></td>
                            <td data-label="Perfil"><?= htmlspecialchars($row['perfil_do_usuario']) ?></td>
                            <td data-label="Ação"><?= htmlspecialchars($row['acao']) ?></td>
                            <td data-label="Tabela"><?= htmlspecialchars($row['tabela_afetada']) ?></td>
                            <td data-label="ID Registro"><?= htmlspecialchars($row['ID_do_registro']) ?></td>
                            <td data-label="Data/Hora"><?= htmlspecialchars($row['data_hora']) ?></td>
                            <td data-label="Operações">
                                <a href="visualizarAuditoria.php?id=<?= $row['id'] ?>">Visualizar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="8">Nenhum registro encontrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script>
        function limparFiltros() {
            window.location.href = window.location.pathname;
        }
    </script>
</body>
<<<<<<< HEAD

</html>
=======
</html>
>>>>>>> f0997e8 (Auditoria)
