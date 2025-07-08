<?php
session_start();

$nome =  $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];

include_once(__DIR__ ."/../Controller/Vendas.php");
include_once(__DIR__ ."/../../conexao.php");
include_once(__DIR__ ."/../Controller/ControllerVendas.php");

$clientes = $conexao->query("SELECT id, nome FROM cliente");
$veiculos = $conexao->query("SELECT ID, marca, modelo FROM veiculo WHERE status = 'Disponivel'");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_cliente = $_POST["id_cliente"];
    $id_veiculo = $_POST["id_veiculo"];
    $data = $_POST["data"];
    $valor_pago = $_POST["valor_pago"];

    if (empty($id_cliente) || empty($id_veiculo) || empty($data) || empty($valor_pago)) {
        echo "<script>alert('Preencha todos os campos!');</script>";
    } else {
        $usuario = $_SESSION['nome'] . " " . $_SESSION['sobrenome'];
        $perfil = $_SESSION['perfil'];
        $acao = "Cadastro";
        $tabela = "Vendas";
        $idRegistro = null;
        $valores_anteriores = "---";
        $valores_novos = "id_cliente: $id_cliente, id_veiculo: $id_veiculo, data: $data, valor pago: $valor_pago";

        $auditoria = new Auditoria(null, $usuario, $perfil, $acao, $tabela, $idRegistro, $valores_anteriores, $valores_novos, null);
        $venda = new Venda(null, $id_cliente, $id_veiculo, null, null, null, $data, $valor_pago);
        addVenda($venda, $auditoria);
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cadastrar Venda</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="video">
        <video src="../../Home/homeVid02.mp4" autoplay muted loop></video>
    </div>
    <header>
        <nav>
            <a id="linkHome" href="../../Home/homeVersion3.php"><i class="fa-solid fa-house"></i></a>
            <ul>
                <li class="a"><a href="listarVendas.php">Listar Vendas</a></li>
                <li class="a"><a href="../../Clientes/View/verClientes.php">Clientes</a></li>
                <li class="a"><a href="../../Veiculos/View/listarVeiculo.php">Veiculos</a></li>
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
        <h1>Cadastro de Venda</h1>

        <form method="post">
            <label for="id_cliente">Cliente:</label>
            <select name="id_cliente" id="id_cliente" required>
                <option value="">Selecione o cliente</option>
                <?php while ($c = $clientes->fetch_assoc()): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['id'] . " / " . $c['nome'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="id_veiculo">Veículo:</label>
            <select name="id_veiculo" id="id_veiculo" required>
                <option value="">Selecione o veículo</option>
                <?php while ($v = $veiculos->fetch_assoc()): ?>
                    <option value="<?= $v['ID'] ?>"><?= $v['ID'] . " / " . $v['marca'] . " " . $v['modelo'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="data">Data da Venda:</label>
            <input type="date" name="data" id="data" required>

            <label for="valor_pago">Valor Pago:</label>
            <input type="number" name="valor_pago" id="valor_pago" required placeholder="Valor em MZN">

            <button type="submit" class="buttons">Cadastrar</button>
        </form>
    </div>
</body>

</html>