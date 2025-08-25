<?php
//FILTRANDO OS DADOS RECEBIDOS VIA GET DAS INPUT POR SEU ID/NAME E VALIDANDO
$nome = filter_input(INPUT_GET,"nome");
$renda = filter_input(INPUT_GET,"renda", FILTER_VALIDATE_FLOAT);

if ($renda == false) {
    $result = "ERRO, VALORES INVALIDOS";
}else{
    $imposto = (7.5/100) * $renda;
    $result = "o calculo do seu imposto Sr. " . $nome ." é: ".$imposto;
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