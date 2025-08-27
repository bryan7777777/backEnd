<?php
$nome = filter_input(INPUT_GET, "nome");
$vip = filter_input(INPUT_GET, "vip");
$valor = filter_input(INPUT_GET, "valor", FILTER_VALIDATE_FLOAT);
$idade = filter_input(INPUT_GET, "idade", FILTER_VALIDATE_INT);

if ($valor == false || $idade == false) {
    //erro nos valores inseridos pelo user
    $result = "ERRO VALORES INVALIDOS";
} elseif ($idade > 65 && $valor > 1000 && $vip == "sim") {
    //desnto para idoso VIP
    $desconto = $valor - ((20 / 100) * $valor);
    $result = "sr. " . $nome . " o valor inserido foi " . $valor . " e seu desconto é de 20% devido ao VIP, sua idade e o valor da compra ser a cima de 1000, com o desconto aplicado o valor fica: R$" . $desconto;
} elseif ($vip == "sim") {
    //desnto para VIP
    $desconto = $valor - ((10 / 100) * $valor);
    $result =  "sr. " . $nome . " o valor inserido foi " . $valor . " e seu desconto é de 10% devido ao VIP, com o desconto aplicado o valor fica: R$" . $desconto;
} elseif ($idade > 65 && $valor > 1000) {
    //desnto para idoso
    $desconto = $valor - ((10 / 100) * $valor);
    $result = "sr. " . $nome . " o valor inserido foi " . $valor . " e seu desconto é de 10% devido a sua idade e o valor da compra ser a cima de 1000, com o desconto aplicado o valor fica: R$" . $desconto;
} else {
    //sem descontos
    $desconto = $valor;
    $result = "sr. " . $nome . " o valor inserido foi " . $valor . " e você não possui nenhum desconto,o valor fica: R$" . $desconto;
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/desconto.css">
    <title>Desconto</title>
</head>

<body>
    <div id="resultado">
        <h1>O valor a se pagar é:</h1>
        <?= $result ?>
    </div>
</body>

</html>