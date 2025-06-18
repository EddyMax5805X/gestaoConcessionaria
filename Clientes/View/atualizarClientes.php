<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../Controller/Cliente.php");
    include("../Controller/Conexao.php");
    include("../Controller/metodos.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    echo "$id";
    $cliente = new Cliente($nome, $email, $telefone, $endereco);
    $cliente->setId($id);

    atualizarCliente($cliente);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include("../Controller/Cliente.php");
    include("../Controller/Conexao.php");
    include("../Controller/metodos.php");

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT * FROM cliente WHERE id = '$id'";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $id = $row["id"];
            $nome = $row["nome"];
            $email = $row["email"];
            $telefone = $row["contacto"];
            $endereco = $row["endereco"];
        } else {
            echo "Cliente não encontrado.";
            exit();
        }
    } else {
        echo "ID do cliente não informado.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/Cliente.css">
    <title>Atualizar Cliente</title>
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <ul class="nav-links">
                    <li><a href="../View/verClientes.php">Voltar</a></li>
                </ul>
            </nav>
        </header>

        <form method="post">
            <h1>Atualizar Cliente</h1>

            <div>
                <label for="id">ID</label>
                <input type="text" name="id" id="id" value="<?php echo $id; ?>" readonly>
            </div>

            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $email; ?>">
            </div>

            <div>
                <label for="telefone">Contacto</label>
                <input type="text" name="telefone" id="telefone" value="<?php echo $telefone; ?>">
            </div>

            <div>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="<?php echo $endereco; ?>">
            </div>

            <input type="submit" value="Atualizar">
        </form>
    </div>
</body>

</html>