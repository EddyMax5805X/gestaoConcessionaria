<?php 
    session_start();

    $nomeS =  $_SESSION['nome'];
    $sobrenomeS = $_SESSION['sobrenome'];
    $emailS = $_SESSION['email'];
    $perfil = $_SESSION['perfil'];


    include_once("../Controller/Cliente.php");
    include_once("../../conexao.php");
    include_once("../Controller/metodos.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    $sql = "SELECT * FROM cliente WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $nome_Anterior = $row["nome"];
        $email_Anterior = $row["email"];
        $telefone_Anterior = $row["contacto"];
        $endereco_Anterior = $row["endereco"];
    } else {
        echo "Cliente não encontrado.";
        exit();
    }

    $texto_Anterior = "";
    $texto_Actual = "";

    if ($nome_Anterior != $nome) {
        $texto_Anterior .= "Nome: $nome_Anterior";
        $texto_Actual .= "Nome: $nome";
    }
    if ($email_Anterior != $email) {
        $texto_Anterior .= "Email: $email_Anterior";
        $texto_Actual .= "Email: $email";
    }
    if ($telefone_Anterior != $telefone) {
        $texto_Anterior .= "Telefone: $telefone_Anterior";
        $texto_Actual .= "Telefone: $telefone";
    }
    if ($endereco_Anterior != $endereco) {
        $texto_Anterior .= "Endereco: $endereco_Anterior";
        $texto_Actual .= "Endereco: $endereco";
    }

    $usuario = $_SESSION['nome'] . " " . $_SESSION['sobrenome'];
    $perfil = $_SESSION['perfil'];
    $acao = "Atualizar";
    $tabela = "cliente";
    $idRegistro = $id;
    $valores_anteriores = $texto_Anterior;
    $valores_novos = $texto_Actual;

    
    if(!isset($idRegistro)){
          echo "<script>alert('$idRegistro')</script>";
    
    }else{

    $auditoria = new Auditoria(null, $usuario, $perfil, $acao, $tabela, $idRegistro,
    $valores_anteriores, $valores_novos, null);

    echo "<script>console.log('$id')</script>";
    $cliente = new Cliente($nome, $email, $telefone, $endereco);
    $cliente->setId($id);

    atualizarCliente($cliente, $auditoria);
    }
}
?>