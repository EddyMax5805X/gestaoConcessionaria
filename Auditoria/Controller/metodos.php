<?php 
    include_once("Auditoria.php");
    include_once("../../conexao.php");

function adicionarAuditoria(Auditoria $auditoria) {
    global $conexao;

    $nome = $conexao->real_escape_string($auditoria->getNomeDoUsuario());
    $perfil = $conexao->real_escape_string($auditoria->getPerfilDoUsuario());
    $acao = $conexao->real_escape_string($auditoria->getAcao());
    $tabela = $conexao->real_escape_string($auditoria->getTabelaAfetada());
    $idRegistro = $conexao->real_escape_string($auditoria->getIDDoRegistro());
    $valores_anteriores = $conexao->real_escape_string($auditoria->getValoresAnteriores());
    $valores_novos = $conexao->real_escape_string($auditoria->getValoresNovos());

    $sql = "INSERT INTO auditoria (nome_do_usuario, perfil_do_usuario, acao, tabela_afetada, ID_do_registro, valores_anteriores, valores_novos)
        VALUES ('$nome', '$perfil', '$acao', '$tabela', '$idRegistro', '$valores_anteriores', '$valores_novos')";


    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        echo "<script>alert('Registro de auditoria inserido com sucesso');</script>";
        return true;
    } else {
        echo "<p style='color: red;'>Erro ao inserir auditoria: " . $conexao->error . "</p>";
        return false;
    }
}

function buscarAuditoriaPorId($id) {
    global $conexao;

    $sql = "SELECT * FROM auditoria WHERE id = '$id'";
    $result = mysqli_query($conexao, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);

        $id = $row[0];
        $usuario = $row[1];
        $perfil = $row[2];
        $acao = $row[3];
        $tabela = $row[4];
        $idRegistro = $row[5];
        $valoresAnteriores = $row[6];
        $valoresNovos = $row[7];
        $dataHora = $row[8];

        $auditoria = new Auditoria($id, $usuario, $perfil, $acao, $tabela,
                    $idRegistro, $valoresAnteriores, $valoresNovos, $dataHora);

        return $auditoria;
    }

    return null;
}
?>