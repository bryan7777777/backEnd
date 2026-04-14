<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// Incluir arquivos de banco de dados e modelo
include_once '../../config/Database.php';
include_once '../../models/Bebida.php';
 
// Instanciar o objeto Database e obter a conexão
$database = new Database();
$db = $database->getConnection();
 
// Instanciar o objeto bebida
$bebida = new Bebida($db);

$bebida->idBebida = isset($_GET['id']) ? $_GET['id'] : null;
 
if ($bebida->idBebida) {
    // Busca a bebida
    $bebida->read_single();
 if ($bebida->nome === null) {
    // Se nenhuma bebida for encontrada, definir o código de resposta como 404 Not Found
        http_response_code(404);
 
        // Informar ao usuário que nenhuma bebida foi encontrada
        echo json_encode(
            array("message" => "Nenhuma bebida encontrada.")
        );
 } else {
    // Cria o array de resposta
    $bebida_arr = array(
        "id" => $bebida->idBebida,
        "nome" => $bebida->nome,
        "alcoolica" => $bebida->alcoolica,
        "valor" => $bebida->valor
    );
 
    // Converte para JSON e envia a resposta
    // `JSON_PRETTY_PRINT` é opcional, mas deixa o JSON mais legível
    echo json_encode($bebida_arr, JSON_PRETTY_PRINT);
 }
} else {
    http_response_code(400);
    echo json_encode(array("erro" => "parametro id n fornecido"), JSON_PRETTY_PRINT);
}