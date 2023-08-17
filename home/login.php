<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php if (isset($_GET['erro'])) { ?>
        <h4 class="text-center m-t-10" style="color:#ff0000"><?php echo $_GET['erro'] ?></h4>
    <?php } ?>
    <form method="POST" action="../home/login2.php">
        <div class="login">
            <h1>Login</h1>
            <div>
                <input type="text" placeholder="e-mail" id="login" name="login"> <!-- Adicione o atributo name -->
                <br><br>
                <input type="password" placeholder="Senha" id="senha" name="senha"> <!-- Adicione o atributo name e corrija o id -->
            </div>
            <div>
                <span class="input-group-text" id="visiblePass"><i class="bi bi-eye-fill"></i></span>
            </div>
            <br>
            <button type="submit" id="botao_enviar">Entrar</button> <!-- Altere o type para "submit" -->
        </div>
    </form>
    <script src="../js/login.js"></script>
</body>

</html>