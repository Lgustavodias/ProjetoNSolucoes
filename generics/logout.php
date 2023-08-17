<?php
session_start(); // Iniciar a sessão
session_destroy(); // Destruir a sessão
header("Location: ../home/login.php"); // Redirecionar para a página de login
exit();
?>