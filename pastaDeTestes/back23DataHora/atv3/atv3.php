<?php
$tempo = $_GET['data'];
$demi = $_GET['dataDemi'];

$total_segundos=strtotime($demi) - strtotime($data1);
// Definindo as constantes (usando o underscore para facilitar a leitura)
$SEG_POR_ANO = 31_536_000;
$SEG_POR_MES = 2_592_000;
$SEG_POR_DIA = 86_400;

// Calculando os Anos
$anos = floor($total_segundos / $SEG_POR_ANO);
$resto = $total_segundos % $SEG_POR_ANO;

// Calculando os Meses (do que sobrou dos anos)
$meses = floor($resto / $SEG_POR_MES);
$resto = $resto % $SEG_POR_MES;

// Calculando os Dias (do que sobrou dos meses)
$dias = floor($resto / $SEG_POR_DIA);

echo "Resultado: $anos anos, $meses meses e $dias dias.";

?>