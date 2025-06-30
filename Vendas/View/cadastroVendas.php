<?php
    session_start();

    $nome =  $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email'];



include_once("../Controller/Vendas.php");
include_once("../Controller/Conexao.php");
include_once("../Controller/ControllerVendas.php");

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
        $venda = new Venda(null, $id_cliente, $id_veiculo, $data, $valor_pago);
        addVenda($venda);
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

    <div class="perfil">
        <p><span><?php echo $nome." ".$sobrenome;?></span></br><?php echo $email;?></p>
        <i class="fa-solid fa-circle-user"></i>
    </div>

    <div class="container">
        <div class="links">
            <a href="../Home/home.php">Voltar ao Início</a>
            <a href="../View/listarVendas.php">Listar Vendas</a>
        </div>

        <h1>Cadastro de Venda</h1>

        <form method="post">
            <label for="id_cliente">Cliente:</label>
            <select name="id_cliente" id="id_cliente" required>
                <option value="">Selecione o cliente</option>
                <?php while ($c = $clientes->fetch_assoc()): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['id']." / ". $c['nome'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="id_veiculo">Veículo:</label>
            <select name="id_veiculo" id="id_veiculo" required>
                <option value="">Selecione o veículo</option>
                <?php while ($v = $veiculos->fetch_assoc()): ?>
                    <option value="<?= $v['ID'] ?>"><?= $v['ID']." / ". $v['marca'] . " " . $v['modelo'] ?></option>
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
