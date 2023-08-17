<?php
require_once "../generics/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   function sendJsonResponse($success, $message)
   {
      header('Content-Type: application/json');
      echo json_encode(array('success' => $success, 'message' => $message));
   }
   $nome = $_POST["nome"];
   $valor = $_POST["valor"];
   $tamanho = $_POST["tamanho"];
   $peso = $_POST["peso"];

   require_once "../generics/FileUpload.php";
   $destino = '../images/produtos';
   $tiposPermitidos = array(
      "jpeg",
      "png",
      "jpg",
      "pdf"
   );
   $fileUpload = new FileUpload($destino, $tiposPermitidos);
   try {
      $foto = $fileUpload->moveFile($_FILES['foto']);

      $query = $pdo->prepare("INSERT INTO `produtos` (`nome`, `valor`, `tamanho`, `peso`, `foto`) VALUES (?,?,?,?,?);");
      $query->bindValue(1, $nome, PDO::PARAM_STR);
      $query->bindValue(2, $valor, PDO::PARAM_STR);
      $query->bindValue(3, $tamanho, PDO::PARAM_STR);
      $query->bindValue(4, $peso, PDO::PARAM_STR);
      $query->bindValue(5, $foto, PDO::PARAM_STR);
      $query->execute();
      
      sendJsonResponse(true, 'Arquivo enviado com sucesso');
   } catch (Exception $e) {
      sendJsonResponse(false, 'Tipo de arquivo inválido. Somente imagens JPEG, PNG e PDF são permitidas. Detalhes: ' . $e->getMessage());
   }
}
