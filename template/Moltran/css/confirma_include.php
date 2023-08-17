<?php $id = $_GET["id"]; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/favicon_1.ico">
  <title>Confirmação</title>
  <!-- Base Css Files -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Icons -->
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
  <link href="css/material-design-iconic-font.min.css" rel="stylesheet">
  <!-- animate css -->
  <link href="css/animate.css" rel="stylesheet" />
  <!-- Waves-effect -->
  <link href="css/waves-effect.css" rel="stylesheet">
  <!-- Custom Files -->
  <link href="css/helper.css" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
  <script src="js/modernizr.min.js"></script>
</head>
<body>
  <div class="wrapper-page">
    <div class="ex-page-content text-center">
      <div class="panel panel-default">

        <div class="panel-heading">
          <h2>Include efetuado com sucesso!</h2>
          <br>
        </div>
        <div class="panel-body">
          <!-- Zueiras -->
          <div class="row">
            <picture><img src="images/rick.gif" height=auto></picture>
          </div>
          <br>
          <!-- zueiras a parte -->
          <a href="edita_include.php?id=<?php echo $id; ?>"><button class="btn btn-info  m-b-5">Voltar</button></a>
        </div>
      </div>
    </div>
  </div>
  <script>
  var resizefunc = [];
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/waves.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="assets/jquery-detectmobile/detect.js"></script>
  <script src="assets/fastclick/fastclick.js"></script>
  <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
  <script src="assets/jquery-blockui/jquery.blockUI.js"></script>
  <!-- CUSTOM JS -->
  <script src="js/jquery.app.js"></script>
</body>
</html>
