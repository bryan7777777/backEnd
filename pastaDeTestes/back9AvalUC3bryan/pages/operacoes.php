<!-- B) Criar um algoritmo que receba um número qualquer e faça uma das operações que o usuário escolher com este número (Adição ou Subtração). Esta operação deve ser realizada com os números de 1 a 10 e o resultado mostrado na tela.
 
Exemplo: Usuário escolheu o 6 e Adição.
 
Saída:
6 + 1 = 7
6 + 2 = 8
6 + 3 = 9
6 + 4 = 10
6 + 5 = 11
6 + 6 = 12
6 + 7 = 13
6 + 8 = 14
6 + 9 = 15
6 + 10 = 16 -->

<?php
$n1 = filter_input(INPUT_GET,"num1", FILTER_VALIDATE_FLOAT);
$operacao = filter_input(INPUT_GET,"operacao");
$result = "";
$resultConta = "";

for ($i=1; $i <= 10; $i++) { 
    switch (true) {
        case $n1 == false:
            $result = "ERRO, VALORES INVALIDOS";
            break;
        case $operacao == "1":
            $resultConta = $n1 + $i;
            $result = $result . "<tr>" ."<td>" . "</td>" . "<td>" . $n1 . "</td>" . "<td>" . "+" . "</td>" . "<td>" . $i . "</td>" . "<td>" . "=" . "</td>" . "<td>" . round($resultConta, 2) . "</td>" . "</tr>";
            break;

        case $operacao == "2":
            $resultConta = $n1 - $i;
            $result = $result . "<tr>" ."<td>" . "</td>" . "<td>" . $n1 . "</td>" . "<td>" . "-" . "</td>" . "<td>" . $i . "</td>" . "<td>" . "=" . "</td>" . "<td>" . round($resultConta, 2) . "</td>" . "</tr>";
            break;

        case $operacao == "3":
            $resultConta = $n1 * $i;
            $result = $result . "<tr>" ."<td>" . "</td>" . "<td>" . $n1 . "</td>" . "<td>" . "X" . "</td>" . "<td>" . $i . "</td>" . "<td>" . "=" . "</td>" . "<td>" . round($resultConta, 2) . "</td>" . "</tr>";
            break;

        case $operacao == "4":
            $resultConta = $n1 / $i;
            $result =  $result . "<tr>" . "<td>" . "</td>" . "<td>" . $n1 . "</td>" . "<td>" . "/" . "</td>" . "<td>" . $i . "</td>" . "<td>" . "=" . "</td>" . "<td>" . round($resultConta, 2) . "</td>" . "</tr>";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/main.css">
    <title>CALCULO</title>
</head>
<body>
    <table><?=$result?></table>
</body>
</html>