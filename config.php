<?php
$servidor = "localhost"; 
$usuario = "root";       
$senha = "";             
$banco = "formulario";    


$conexao = new mysqli($servidor, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}


echo "Conexão bem-sucedida!";
?>
