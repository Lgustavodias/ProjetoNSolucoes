<?php
if (!defined('DB_HOST')) {
  define('DB_HOST', 'localhost');
}

if (!defined('DB_NAME')) {
  define('DB_NAME', 'projeto_n_solucoes');
}

if (!defined('DB_USER')) {
  define('DB_USER', 'gustavo');
}

if (!defined('DB_PASSWORD')) {
  define('DB_PASSWORD', 'Lu12345678@'); 
}

try {
  $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . '', DB_USER, DB_PASSWORD, [PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'UTF8'"]);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'ERROR CONNECTING TO DATABASE';
  // echo $e;
}

session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['login'])) {
  $_SESSION = array();

  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      '',
      time() - 42000,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
    );
  }

  // Por último, destrói a sessão
  session_unset();
  session_destroy();
  session_write_close();
  setcookie(session_name(), '', 0, '/');

  //Redireciona para a página de autenticação
  header("location:../home/login.php");
  exit(); // Certifique-se de sair para evitar mais processamento após o redirecionamento
}

try {
  $stmt = $pdo->prepare("SELECT * FROM projeto_n_solucoes.usuarios WHERE id = ? AND email = ?");
  $stmt->bindParam(1, $_SESSION['id'], PDO::PARAM_INT);
  $stmt->bindParam(2, $_SESSION['login'], PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row) {
    $id_usuario = $row["id"];
    $nome = $row["nome"];
    $login = $row["email"];
    $nivel = $row["nivel"];
  } else {
    session_destroy();
    header('Location: ../home/login.php?erro=USUARIO OU SENHA INCORRETOS!');
    exit();
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>
