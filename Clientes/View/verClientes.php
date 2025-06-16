<?php
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
    <link rel="stylesheet" href="../style/verCliente.css">
    <title>Gestão de Clientes</title>
</head>
<body>
    <h1>Gestão de Clientes</h1>
    <div class="Adicionar">
        <button><a href="cadastroClientes.php">Adicionar Cliente</a></button>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th colspan="2">Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include("../Controller/conexao.php");

                $sql = "SELECT * FROM clientes;";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['nome']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['telefone']}</td>";
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
</body>
</html>
