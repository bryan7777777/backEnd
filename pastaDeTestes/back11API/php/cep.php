<?php
$cep = preg_replace('/\D/', '', $_GET['cepBuscado'] ?? '');
$mensagem = "";
$url = "";

if (!isset($cep) || strlen($cep) != 8) {
    $mensagem = "ERRO, VALORES INVÁLIDOS";
} else {
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $options = [
        "http" => [
            "method" => "GET",
            "header" => "Content-Type: application/json"
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    if ($response === false) {
        $mensagem = "Erro ao acessar a API ViaCEP.";
    } else {
        $dados = json_decode($response, true);

        if (isset($dados["erro"])) {
            $mensagem = "CEP não encontrado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Consulta de CEP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <span id="erro"><?= $mensagem ?></span>
    <div>
        <input type="text" value="<?= isset($dados['logradouro']) ? $dados['logradouro'] : "" ?>">
        <input type="text" value="<?= isset($dados['complemento']) ? $dados['complemento'] : "" ?>">
        <input type="text" value="<?= isset($dados['bairro']) ? $dados['bairro'] : "" ?>">
        <input type="text" value="<?= isset($dados['localidade']) ? $dados['localidade'] : "" ?>">
        <input type="text" value="<?= isset($dados['estado']) ? $dados['estado'] : "" ?>">

        <!-- <div><?= isset($dados['logradouro']) ? $dados['logradouro'] : "" ?></div>
        <div><?= isset($dados['logradouro']) ? $dados['complemento'] : "" ?></div>
        <div><?= isset($dados['logradouro']) ? $dados['bairro'] : "" ?></div>
        <div><?= isset($dados['logradouro']) ? $dados['localidade'] : "" ?></div>
        <div><?= isset($dados['logradouro']) ? $dados['estado'] : "" ?></div> -->
    </div>
</body>

</html>