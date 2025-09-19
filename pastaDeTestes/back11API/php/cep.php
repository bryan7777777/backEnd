<?php 

$cep = trim(filter_input(INPUT_GET,"cepBusca", FILTER_VALIDATE_INT));
$result = "";

switch ($cep) {
    case !isset($cep) || strlen($cep) != 8:
        $result = "ERRO, VALORES INVALIDOS";
        break;
    
    default:
    $url = "https://viacep.com.br/ws/{$cep}/json/";

    $options = [
        "http" => [
            "method" => "GET",
            "header" => "Content-Type: application/json"
        ]
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
        break;
}

?>