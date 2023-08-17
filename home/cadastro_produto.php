<?php
require_once "../generics/config.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <!-- Base Css Files -->
    <link href="../template/Moltran/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Icons -->
    <link href="../template/Moltran/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../template/Moltran/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
    <link href="../template/Moltran/css/material-design-iconic-font.min.css" rel="stylesheet">
    <!-- Custom Files -->
    <link href="../template/Moltran/css/helper.css" rel="stylesheet" type="text/css" />
    <link href="../template/Moltran/css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/sidetopbar.css">
</head>

<body class="fixed-left">
    <!-- Inicio -->
    <div id="wrapper">
        <?php
        require_once "../generics/topbar.php";
        require_once "../generics/sidebar.php";
        ?>
        <div class="content-page">
            <!-- Inicio do content -->
            <div class="content">
                <!-- Inicio do conteiner -->
                <div class="container-alt">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-inverse">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-center">INFORMAÇÕES DO PRODUTO</h3>
                                </div>
                                <div class="panel-body">
                                    <div id="form-messages"></div> <!-- Div para exibir mensagens -->
                                    <form id="formprod" class="form-horizontal" role="form" enctype="multipart/form-data">
                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nome</label>
                                            <div class="col-md-6">
                                                <input type="text" name="nome" class="form-control" placeholder="NOME DO PRODUTO" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Valor</label>
                                            <div class="col-md-6">
                                                <input type="text" name="valor" class="form-control" placeholder="Valor do produto" required>
                                            </div>
                                        </div>
                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tamanho do produto</label>
                                            <div class="col-md-6">
                                                <input type="text" name="tamanho" class="form-control" placeholder="Tamanho do produto" required>
                                            </div>
                                        </div>
                                        <!-- form-group -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Peso do produto</label>
                                            <div class="col-md-6">
                                                <input type="text" name="peso" class="form-control" placeholder="Peso do produto" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="ft_volta">Foto do produto</label>
                                            <div class="col-md-6">
                                                <input type="file" class="form-control input-lg" id="foto" name="foto" accept="image/*;capture=camera" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="reset" class="btn btn-md btn-info waves-effect waves-light pull-right">Limpar</button>
                                        </div>
                                        <div class="col-md-5">
                                            <button type="button" id="cadastrar-btn" class="btn btn-md btn-success waves-effect waves-light pull-right">Cadastrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- panel-body -->
                    <!-- Fim docontainer -->
                </div>
                <!-- Fim docontent -->
            </div>
        </div>
        <?php
        include_once("../generics/footer.php");
        ?>
    </div>
    <script src="../js/sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#cadastrar-btn").on("click", function() {
                var formData = new FormData($("#formprod")[0]);
                
                $.ajax({
                    type: "POST",
                    url: "../home/cadastrou_produto.php", // Substitua pela URL correta
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#form-messages").html('<div class="' + (response.success ? 'success' : 'error') + '">' + response.message + '</div>');
                        if (response.success) {
                            window.location.href = '../home/cadastro_produto.php'; // Substitua pelo caminho correto
                        }
                    },
                    error: function(response) {
                        $("#form-messages").html('<div class="error">Erro ao enviar o formulário</div>');
                    }
                });
            });
        });
    </script>
</body>

</html>
