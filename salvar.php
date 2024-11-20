<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "formulario";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}


$nome = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$estado = $_POST['estado'] ?? '';


$erros = [];

if (empty($nome)) {
    $erros[] = "O nome é obrigatório.";
}

if (empty($email)) {
    $erros[] = "O e-mail é obrigatório.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "E-mail inválido.";
}

if (empty($telefone)) {
    $erros[] = "O telefone é obrigatório.";
}

if (empty($estado)) {
    $erros[] = "O estado é obrigatório.";
}

if (!empty($erros)) {
    foreach ($erros as $erro) {
        echo "<p style='color:red;'>$erro</p>";
    }
    echo "<a href='javascript:history.back();'>Voltar</a>";
    exit;
}

$sql = "INSERT INTO usuarios (nome, email, telefone, estado) VALUES ('$nome', '$email', '$telefone', '$estado')";

if ($conexao->query($sql) === TRUE) {
    echo "<p style='color:green;'>Cadastro realizado com sucesso!</p>";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();
?>
