<?php

function horas(){
    $hj = time();
    $hj2 = date("Y-m-d",$hj);
    return $hj2;
}
function validarEntradas($paramNome, $paramNotas){
    if (isset($paramNome)&&count($paramNotas)!=0) {
        return true;
    } else {
        return false;
    }
}
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

function msg($mensagem){
    return $mensagem;
}

function result($valMedia, $msg){
    if ($valMedia == true) {
        $msg2 = "COM BASE NA SUA MEDIA VC PASSOU";
    } else {
        $msg2 = "COM BASE NA SUA MEDIA VC NAO PASSOU";
    }

    return "{$msg} <br> {$msg2}";
}

$nome = trim($_GET['nome']);
$notas = $_GET['notas'];

if (validarEntradas($nome, $notas)) { 
    $media = calcular($notas);
    $valMedia = number_format(valMedia($media), 2);
    $msg = msg("Olá, {$nome}! Sua média é: {$media}");
    $result = result($valMedia, $msg);
    $horario = horas();
} else {
    header("Location: ../index.html");
}

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
        <p><?=$horario ?></p>
        <h1>Performance do Aluno</h1>
        <p id="<?= $media>=7 ? "aprovado" : "reprovado"; ?>"><?= $result ?></p>
    </main>
</body>

</html>