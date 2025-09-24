<?php
// =====================================
// 1. Recebendo os dados do formulário
// =====================================
$paises = $_GET['pais'];  
$atributo = $_GET['atributo'];  
$txt = '';
 
if (empty($paises) || empty($atributo)) {
    $txt = "Informe o nome do país e o atributo desejado.";
    exit;
}  
 
// =====================================
// 2. Montando a URL de consulta
// =====================================
$url = "https://restcountries.com/v3.1/name/" . urlencode($paises) . "?fields=" . urlencode($atributo);
 
// =====================================
// 3. Fazendo a requisição HTTP
// =====================================
$options = [
    "http" => [
        "method" => "GET",
        "header" => "Content-Type: application/json"
    ]
];
 
$context = stream_context_create($options);
$response = @file_get_contents($url, false, $context);
 
// Verifica se a requisição foi bem-sucedida
if ($response === false) {
    $txt = "Erro ao acessar a API RestCountries.";
    exit;
}
 
// =====================================
// 4. Convertendo o JSON para array PHP
// =====================================
$data = json_decode($response, true);
 
// =====================================
// 5. Validando se o país existe e o atributo desejado
// =====================================
if (isset($data[0][$atributo])) {
    $valor = $data[0][$atributo];
 
    // Caso seja a bandeira, exibe como imagem
    if ($atributo === "flags" && is_array($valor) && isset($valor['png'])) {
        $txt = "<img src='" . htmlspecialchars($valor['png'], ENT_QUOTES, 'UTF-8') . "' alt='Bandeira de " . htmlspecialchars($paises, ENT_QUOTES, 'UTF-8') . "'>";
    }
    // Caso seja um valor booleano de independência
    elseif ($atributo === "independent") {
        $valor = $valor ? "Sim" : "Não";
        $txt = "O país '" . htmlspecialchars($paises, ENT_QUOTES, 'UTF-8') . "' é independente? {$valor}";
    }
    // Se for array, junta os valores
    elseif (is_array($valor)) {
        $valor = implode(", ", $valor);
        $txt = "O valor do atributo '" . htmlspecialchars($atributo, ENT_QUOTES, 'UTF-8') . "' para o país '" . htmlspecialchars($paises, ENT_QUOTES, 'UTF-8') . "' é: {$valor}";
    }
    // Caso contrário, exibe o valor diretamente
    else {
        $txt = "O valor do atributo '" . htmlspecialchars($atributo, ENT_QUOTES, 'UTF-8') . "' para o país '" . htmlspecialchars($paises, ENT_QUOTES, 'UTF-8') . "' é: {$valor}";
    }
 
} else {
    $txt = "País ou atributo não encontrado na API.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/style.css">
  <title>Seleção de País</title>
</head>
<body>
    <div id="bloco" class="bloco"><?= $txt ?></div>
</body>
</html>