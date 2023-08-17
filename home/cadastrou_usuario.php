<?php
require_once("../generics/config.php");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$level = $_POST["level"];
$cpf = $_POST["cpf"];
$birthdate = $_POST["birthdate"];
$endereco = $_POST["endereco"];
$cep = $_POST["cep"];

try {
    $query_cadastra_usuario = ("INSERT INTO `usuarios` (`nome`, `email`, `senha`, `nivel`, `cpf`, `data_nascimento`, `endereco`, `cep`) VALUES (?,?,?,?,?,?,?,?);");
    $result_cadastro_usuario = $pdo->prepare($query_cadastra_usuario);
    $result_cadastro_usuario->bindValue(1, $_POST["name"], PDO::PARAM_STR);
    $result_cadastro_usuario->bindValue(2, $_POST["email"], PDO::PARAM_STR);
    $result_cadastro_usuario->bindValue(3, md5($_POST["password"]), PDO::PARAM_STR);
    $result_cadastro_usuario->bindValue(4, $_POST["level"], PDO::PARAM_STR);
    $result_cadastro_usuario->bindValue(5, $_POST["cpf"], PDO::PARAM_STR);
    $result_cadastro_usuario->bindValue(6, $_POST["birthdate"], PDO::PARAM_STR);
    $result_cadastro_usuario->bindValue(7,  $_POST["endereco"], PDO::PARAM_STR);
    $result_cadastro_usuario->bindValue(8, $_POST["cep"], PDO::PARAM_STR);
    $result_cadastro_usuario->execute();
} catch (PDOException $e) {
    $response = array(
        'error' => true,
        'message' => 'Erro ao cadastrar: ' . $e->getMessage()
    );
}
if (!isset($response)) {
    $response = array(
        'error' => false,
        'message' => 'Operação realizada!'
    );
}
 // Redirecionar para a mesma página após a operação de cadastro
 header('Location: ../home/cadastro_usuario.php');
 exit; // Certifique-se de que o script seja encerrado após o redirecionamento
