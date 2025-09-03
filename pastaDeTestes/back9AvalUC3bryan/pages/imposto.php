<!-- A) Faça um algoritmo que efetue o cálculo do salário líquido de um trabalhador. As informações fornecidas serão: valor da hora trabalhada, número de horas trabalhadas no mês e percentual de desconto de impostos. Imprima na tela o salário líquido final (descontado o imposto) e o valor pago em impostos. O imposto será de 5% se o usuário ganhar mais de R$ 2.000,00 por mês, se ganhar menos, será isento de impostos. -->

<?php
$hr = filter_input(INPUT_GET,"hora", FILTER_VALIDATE_FLOAT);
$mes = filter_input(INPUT_GET,"mes", FILTER_VALIDATE_FLOAT);
$imposto = filter_input(INPUT_GET,"imposto", FILTER_VALIDATE_FLOAT);
$salario = $mes * $hr;

if ($hr == false || $mes == false|| $imposto == false) {
    $result = "ERRO, VALORES INVALIDOS";
} elseif ($salario >= 2000) {
    $imposto2 = ($imposto / 100) * $salario;
    $imposto3 = $salario - $imposto2;
    $result = "seu salario considerando o imposto é: " . $imposto3;
} else {
    $result = "seu salario considerando que você é isento de imposto: " . $salario;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMPOSTO</title>
</head>
<body>
    <div class="result"><?=$result?></div>
</body>
</html>