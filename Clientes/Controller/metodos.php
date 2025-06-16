<?php
function adicionarCliente($cliente) {
    global $conexao;

    $nome = $conexao->real_escape_string($cliente->getNome());
    $email = $conexao->real_escape_string($cliente->getEmail());
    $telefone = $conexao->real_escape_string($cliente->getTelefone());
    $endereco = $conexao->real_escape_string($cliente->getEndereco());

    $sql = "INSERT INTO clientes (nome, email, telefone, endereco)
            VALUES ('$nome', '$email', '$telefone', '$endereco')";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        header("Location: ../View/verClientes.php");
        exit();
    } else {
        echo "<p style='color: red;'>Erro ao adicionar cliente: " . $conexao->error . "</p>";
    }
}

function removerCliente($id) {
    global $conexao;

    $sql = "DELETE FROM clientes WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        header("Location: ../View/verClientes.php");
        exit();
    } else {
        echo "<p style='color: red;'>Erro ao remover cliente: " . $conexao->error . "</p>";
    }
}

function atualizarCliente($cliente) {
    global $conexao;

    $id = $cliente->getId();
    $nome = $conexao->real_escape_string($cliente->getNome());
    $email = $conexao->real_escape_string($cliente->getEmail());
    $telefone = $conexao->real_escape_string($cliente->getTelefone());
    $endereco = $conexao->real_escape_string($cliente->getEndereco());

    $sql = "UPDATE clientes SET
                nome = '$nome',
                email = '$email',
                telefone = '$telefone',
                endereco = '$endereco'
            WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        header("Location: ../View/verClientes.php");
        exit();
    } else {
        echo "<p style='color: red;'>Erro ao atualizar cliente: " . $conexao->error . "</p>";
    }
}
?>