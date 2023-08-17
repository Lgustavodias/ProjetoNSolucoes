<?php
require_once("../generics/config.php");

$dados_requisicao = $_REQUEST;

// Obter quantidade total de registros
$query_qtd_usuarios = "SELECT count(id) AS qtd_usuarios FROM projeto_n_solucoes.usuarios";
$result_qtd_usuarios = $pdo->prepare($query_qtd_usuarios);
$result_qtd_usuarios->execute();
$row_qtd_usuarios = $result_qtd_usuarios->fetch(PDO::FETCH_ASSOC);

// Definir limites para a consulta (usando start e length do DataTables)
$start = $dados_requisicao['start'];
$length = $dados_requisicao['length'];

// Obter coluna e direção de ordenação (se aplicável)
$columns = array("id", "nome", "email", "nivel", "cpf", "data_nascimento", "endereco", "cep");
$orderby = "";

if (isset($dados_requisicao['order'][0]['column']) && isset($dados_requisicao['order'][0]['dir'])) {
    $column_index = intval($dados_requisicao['order'][0]['column']);
    $column = $columns[$column_index];
    $order_dir = $dados_requisicao['order'][0]['dir'];
    $orderby = "ORDER BY $column $order_dir";
}

// Obter registros com ordenação
$query_usuarios = "SELECT id, nome, email, nivel, CONCAT(SUBSTR(cpf,1,3),'.',SUBSTR(cpf,4,3),'.',SUBSTR(cpf,7,3),'-',SUBSTR(cpf,10,2)) AS cpf, DATE_FORMAT(data_nascimento, '%d/%m/%Y') AS data_nascimento, endereco, CONCAT(SUBSTRING(cep,1,2),'.',SUBSTRING(cep,3,3),'-',SUBSTRING(cep,6,3)) AS cep FROM projeto_n_solucoes.usuarios $orderby LIMIT $start, $length";
$result_usuarios = $pdo->prepare($query_usuarios);
$result_usuarios->execute();

$dados = array();

while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    $registro = array(
        $row_usuario['id'],
        $row_usuario['nome'],
        $row_usuario['email'],
        $row_usuario['nivel'],
        $row_usuario['cpf'],
        $row_usuario['data_nascimento'],
        $row_usuario['endereco'],
        $row_usuario['cep']
    );
    $dados[] = $registro;
}

// Cria array de informações para serem retornadas para o js
$resultado = array(
    "draw" => intval($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qtd_usuarios['qtd_usuarios']),
    "recordsFiltered" => intval($row_qtd_usuarios['qtd_usuarios']),
    "data" => $dados
);

// Retorna o objeto para o js
echo json_encode($resultado);
?>
