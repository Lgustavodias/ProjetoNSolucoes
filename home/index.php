<?php
require_once("../generics/config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto N Soluções</title>
    <link rel="stylesheet" type="text/css" href="../css/sidetopbar.css">
</head>

<body>
    <?php
    require_once("../generics/sidebar.php");
    require_once("../generics/topbar.php");
    ?>
    <div class="content">
    <div align="center">
        <?php echo "<b style=\"color:black;\">Bem vindo(a) $nome_usuario!</b>" ?>
    </div>
    </div>
    <div class="page-wrapper">
    <?php
    include_once("../generics/footer.php");
    ?>
    </div>
    <script src="../js/sidebar.js"></script>
</body>

</html>