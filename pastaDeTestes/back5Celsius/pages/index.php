<?php
//FILTRANDO OS DADOS RECEBIDOS VIA GET DAS INPUT POR SEU ID/NAME E VALIDANDO
$celsius = filter_input(INPUT_GET,"celsius", FILTER_VALIDATE_FLOAT);

if ($celsius == false) {
    $result = "ERRO, VALORES INVALIDOS";
}else{
    $conversao = ($celsius * (9/5)) + 32;
    $result = "o calculo da conversão é: ".$conversao;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>area</title>
</head>
<body>
    <div id="resultado">
        <h1>area</h1>
        <?=$result?>
    </div>
</body>
</html>