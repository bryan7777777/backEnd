<?php

function horas(){
    date_default_timezone_set("America/Sao_Paulo");
    $hj = date("h:i:sa");
    $hj2 = date("Y-m-d",time());
    $diaHora = "{$hj2} <br><br> {$hj}";
    return $diaHora;
}
    function validarEntrada($nome,$notas) {
        if (isset($_GET['nome']) && !empty($_GET['nome']) && isset($_GET['notas']) && is_array($notas) && count($notas) > 0) {
            foreach ($notas as $nota) {
                if (!is_numeric($nota) || $nota < 0 || $nota > 10) {
                    return false;
                }
            }
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

if (validarEntrada($nome, $notas)) { 
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
        
        <h1>Performance do Aluno</h1>
        <p id="<?= $media>=7 ? "aprovado" : "reprovado"; ?>"><?= $result ?></p>
        <p><?=$horario?></p>
    </main>
</body>

</html>