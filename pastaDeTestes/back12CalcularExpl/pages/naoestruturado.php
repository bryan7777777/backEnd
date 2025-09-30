<?php
function exibir(){
    $hora = time();
    echo "hello world, {$hora}";
}

function calcular($notasArray){
    return array_sum($notasArray) / count($notasArray);    
}

function valMedia($media){
    return $media >= 7?true:false;
}

$nome = trim($_GET['nome']);
$notas = $_GET['notas'];

$media = calcular($notas);
$result = valMedia($media);

$mensagemBoasVindas = "Olá, {$nome}! Sua média é: {$media}";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance do Aluno</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <main class="container">
        <h1>Performance do Aluno</h1>
        <p><?= $mensagemBoasVindas ?></p>
        <p id="<?= $media>=7 ? "aprovado" : "reprovado"; ?>"><?= $mensagemResultado ?></p>
    </main>
</body>

</html>