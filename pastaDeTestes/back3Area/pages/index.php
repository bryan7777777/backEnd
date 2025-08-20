<?php
//FILTRANDO OS DADOS RECEBIDOS VIA GET DAS INPUT POR SEU ID/NAME E VALIDANDO
$base = filter_input(INPUT_GET,"base", FILTER_VALIDATE_FLOAT);
$altura = filter_input(INPUT_GET,"altura", FILTER_VALIDATE_FLOAT);

if ($base == false|| $altura == false) {
    $result = "ERRO, VALORES INVALIDOS";
}else{
    $area = ($base * $altura) / 2;
    $result = "o calculo da area é: ".$area;
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