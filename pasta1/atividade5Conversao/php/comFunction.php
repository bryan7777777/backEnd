<?php 
$valor = filter_input(INPUT_GET, "valor", FILTER_VALIDATE_FLOAT);
$opcao = filter_input(INPUT_GET, "moeda", FILTER_VALIDATE_INT);
$result = "";

// teste para ver se na valodação ele vem null
// echo $valor==null? "sim":"no";

function validarNotNull($val1, $val2){
if ($val1==null || $val2 == null) {
    return header("Location: ../index.html");
}
}

function conversao($val, $opcao){
switch ($opcao) {
    case 1:
        $resultado = number_format($val*0.16, 2, ",", ".");
        break;
        
    case 2:
        $resultado = number_format($val*0.1877, 2, ",", ".");
        break;
    
    case 3:
        $resultado = number_format($val*27.60, 2, ",", ".");
        break;
    
    default:
        break;
}
return $resultado;
}

function moeda($opcao){
    switch ($opcao) {
    case 1:
        $resultado = "Dolar";
        break;
    case 2:
        $resultado = "Euro";
        break;
    case 3:
        $resultado = "Yens";
        break;
    
    default:
        break;
}
return $resultado;
}

function exibirMsg($msg, $moeda, $result){
    return "{$msg} {$result} {$moeda}";
}

validarNotNull($valor, $opcao);
$result = conversao($valor, $opcao);
$moedaTipo = moeda($opcao);
$msg = exibirMsg("O resultado da conversão é: ", $moedaTipo, $result)
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style.css">
    <title>RESULTADO DA CONVERSÃO</title>
</head>
<body>
    <div id="result">
        <?=$msg?>
    </div>
</body>
</html>