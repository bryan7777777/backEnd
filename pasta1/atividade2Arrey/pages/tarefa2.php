<!-- B) Criar um algoritmo que receba 10 números e exiba
todos eles na tela. Use um array de números para auxiliar
a executar o algoritmo. -->

<?php
$n1 = filter_input(INPUT_GET, "n1");
$n2 = filter_input(INPUT_GET, "n2");
$n3 = filter_input(INPUT_GET, "n3");
$n4 = filter_input(INPUT_GET, "n4");
$n5 = filter_input(INPUT_GET, "n5");
$n6 = filter_input(INPUT_GET, "n6");
$n7 = filter_input(INPUT_GET, "n7");
$n8 = filter_input(INPUT_GET, "n8");
$n9 = filter_input(INPUT_GET, "n9");
$n10 = filter_input(INPUT_GET, "n10");

$result = "";
$coisas = array($n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10);

for ($i=0; $i < 10; $i++) { 
    $result = $result . $coisas[$i] . "<br>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/main.css">
    <title>Document</title>
</head>
<body>
    <h1>RESULTADO</h1>
    <div id="result"><?=$result?></div>
</body>
</html>