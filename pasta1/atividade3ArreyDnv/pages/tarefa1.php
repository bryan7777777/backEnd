<!-- 1. Crie um array com os números de 1 a 10 e faça o seguinte:
a-Exiba todos os números do array.
b-Calcule e exiba a soma de todos os números.
c-Inverta a ordem dos elementos no array e exiba o resultado. -->
<?php
$tarefa = filter_input(INPUT_GET, "tarefa");
$num = array(1,2,3,4,5,6,7,8,9,10);
$result = 0;

switch ($tarefa) {
    case $tarefa == 1:
        var_dump($num);
        break;
    case $tarefa == 2:
        for ($i=0; $i < 10 ; $i++) { 
            $result += $num[$i];
        }
        break;
    case $tarefa == 3:
        var_dump(array_reverse($num));
        break;
    default:
        $result = "ERRO";
        break;
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