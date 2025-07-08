<?php
    include_once("../../Auditoria/Controller/Auditoria.php");
    include_once("../../Auditoria/Controller/metodos.php");
    include_once("../../conexao.php");

function adicionarCliente($cliente, $auditoria)
{
    global $conexao;

    $nome = $conexao->real_escape_string($cliente->getNome());
    $email = $conexao->real_escape_string($cliente->getEmail());
    $telefone = $conexao->real_escape_string($cliente->getTelefone());
    $endereco = $conexao->real_escape_string($cliente->getEndereco());

    $sql = "INSERT INTO cliente (nome, email, contacto, endereco) VALUES ('$nome', '$email', '$telefone', '$endereco')";

    if (mysqli_query($conexao, $sql)) {
        if ($auditoria !== null) {
            $auditoria->setIDdoRegistro($conexao->insert_id);
            adicionarAuditoria($auditoria);
        }
        header("Location: ../View/verClientes.php");
        exit();
    } else {
        echo "<p style='color: red;'>Erro ao adicionar cliente: " . $conexao->error . "</p>";
    }
}

function removerCliente($id, $auditoria) {
    global $conexao;

    $sql = "DELETE FROM cliente WHERE id = '$id'";
    try {
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            if ($auditoria !== null) {
                $auditoria->setIDdoRegistro($id);
                adicionarAuditoria($auditoria);
        }
            header("Location: ../View/verClientes.php");
            exit();
        } else {
            echo "<p style='color: red;'>Erro ao remover cliente: " . $conexao->error . "</p>";
        }
    } catch (mysqli_sql_exception $ex) {
        echo "<script>alert('ERRO! Não pode remover o cliente uma vez que tem uma ligação com um veículo!')</script>";
    }
    
}

function atualizarCliente($cliente, $auditoria) {
    global $conexao;

    $id = $cliente->getId();
    $nome = $conexao->real_escape_string($cliente->getNome());
    $email = $conexao->real_escape_string($cliente->getEmail());
    $telefone = $conexao->real_escape_string($cliente->getTelefone());
    $endereco = $conexao->real_escape_string($cliente->getEndereco());
    try {
        $sql = "UPDATE cliente SET
                nome = '$nome',
                email = '$email',
                contacto = '$telefone',
                endereco = '$endereco'
                WHERE id = '$id'";

        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            if ($auditoria !== null) {
                $auditoria->setIDdoRegistro($id);
                adicionarAuditoria($auditoria);
            }

        if ($resultado) {
            header("Location: ../View/verClientes.php");
            exit();
        } else {
            echo "<p style='color: red;'>Erro ao atualizar cliente: " . $conexao->error . "</p>";
        }
    }

    }catch (Exception $th) {
        echo "<script> alert('ERRO! Não pode atualizar o cliente!')</script>";
    }
    
}
?>