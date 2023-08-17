<?php
if (!isset($_SESSION)) {
    session_start();
}

const host = 'localhost';
const dbname = 'projeto_n_solucoes';
const user = 'gustavo';
const senha = 'Lu12345678@';

try {
    $pdo = new PDO('mysql:host=' . host . ';dbname=' . dbname . '', user, senha, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $erro) {
    echo "DATABASE CONNECTION ERROR";
}

$query = $pdo->prepare("SELECT * FROM projeto_n_solucoes.usuarios WHERE email LIKE ? AND senha LIKE ?");
$query->bindValue(1, $_POST['login'], PDO::PARAM_STR);
$query->bindValue(2, md5($_POST['senha']), PDO::PARAM_STR); // Usar senha MD5
$query->execute();
while ($row = $query->fetch()) {
    $_SESSION['login'] =  $_POST['login'];
    $_SESSION['id'] = $row["id"];;
}

if ($query->rowCount() == 1) {


    header('location:../home/index.php');
} else {

    //Caso contrário redireciona para a página de autenticação
    //Destrói
    session_destroy();

    //Limpa
    unset($_SESSION['login']);
    unset($_SESSION['senha']);

    //Redireciona para a página de autenticação
    $erro = 'SENHA OU USUARIO INCORRETOS!';
    $url = '../home/login.php';

    $data = array('erro' => $erro);
    $string = http_build_query($data);

    header('Location: ' . $url . '?' . $string);
}
