<!-- A)Criar um algoritmo para realizar as seguintes ações:
 
1) Criar um array qualquer com conteúdo em PHP, contendo cinco elementos. Mostrar os cinco elementos do array usando estruturas de repetição. 
2) Adicionar um elemento ao array na terceira posição. Mostrar os elementos do array usando
estruturas de repetição.
3) Excluir um elemento do array na última posição. Mostrar os elementos do array usando estruturas de repetição.
4) Criar um código que utilize o array filter ou array search ou array map. -->
<?php
$humano = filter_input(INPUT_GET, "humano");
$dog = filter_input(INPUT_GET, "dog");
$gato = filter_input(INPUT_GET, "gato");
$passaro = filter_input(INPUT_GET, "passaro");
$sobremesa = filter_input(INPUT_GET, "sobremesa");
$tarefa = filter_input(INPUT_GET, "tarefa");
$result = "";

$coisas = array($humano,$dog,$gato,$sobremesa,$passaro);

switch ($tarefa) {
    case $tarefa == 1:
        for ($i = 0; $i < 5 ; $i++) {
        $result = $result . $coisas[$i] . "<br>";
        }
        break;
    case $tarefa == 2:

        break;
    case $tarefa == 3:

        break;
    case $tarefa == 4:

        break;
    default:
        $result = $coisas[0];
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