<!-- C) Criar um algoritmo que receba três números e que informe ao final os números digitados e quantos deles são ímpares e pares.
 
Exemplo: Usuário digitou 5,7,8
 
Saída:
 
Números digitados: 5,7 e 8
Números pares: 1
Números ímpares: 2 -->

<?php
$n1 = filter_input(INPUT_GET,"n1", FILTER_VALIDATE_FLOAT);
$n2 = filter_input(INPUT_GET,"n2", FILTER_VALIDATE_FLOAT);
$n3 = filter_input(INPUT_GET,"n3", FILTER_VALIDATE_FLOAT);

$valor1 = $n1 % 2;
$valor2 = $n2 % 2;
$valor3 = $n3 % 2;
$impar = 0;
$par = 0;

for ($i=0; $i <= 3 ; $i++) { 
    if ($valor1 == 0) {
        $par++;
        $valor1 = 3;
    } else if ($valor2 == 0) {
        $par++;
        $valor2 = 3;
    } else if ($valor3 == 0) {
        $par++;
        $valor3 = 3;
    } else if ($valor1 == 1) {
        $impar++;
        $valor1 = 3;
    } else if ($valor2 == 1) {
        $impar++;
        $valor2 = 3;
    } else if ($valor3 == 1) {
        $impar++;
        $valor3 = 3;
    }
}



if ($n1 == false || $n2 == false || $n3 == false) {
    $result = "ERRO, VALORES INVALIDOS";
} else {
    $result = "<p>" . "numeros digitados: " . $n1 . "," . $n2 . "," . $n3 . "</p>" .
    "<p>" . "numeros pares presentes: " . $par . "</p>" .
    "<p>" . "numeros impares presentes: " . $impar . "</p>";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUMEROS IMPARES E PAR</title>
</head>
<body>
    <div class="result"><?=$result?></div>
</body>
</html>