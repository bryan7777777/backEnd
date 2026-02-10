<?php
echo "<hr>";
echo"EXPLICAÇÃO BASICA SOBRE COISAS BASICAS, BASICAMENTE BASICAS SOBRE COISAS BASICAS, BASICAMENTE SÓ O BASICO"."<br>"."<br>";
date_default_timezone_set('America/Sao_Paulo');
echo "data ".date('Y-m-d')."<br>";
echo "data ".date('H:i:s')."<br>";
echo "data ".date('y-m-d H:i:s')."<br>";
echo "<hr>";

echo"FORMATAÇÃO PARA OS BR ENTENDER AS HORAS"."<br>"."<br>";
$data = date('Y-m-d');
$data_formatada = date('d/m/y', strtotime($data));
echo "data: ".$data_formatada;
echo "<hr>";

echo"CALCULOS MATEMAGICOS +1 DIA"."<br>"."<br>";
$nova_data=date('y/m/d',strtotime($data."+ 1 day"));
echo "dia +1: ". $nova_data."<br>";

$nova_data=date('y/m/d',strtotime($data."+ 1 month"));
echo "mes +1: ". $nova_data."<br>";

$nova_data=date('y/m/d',strtotime($data."+ 1 year"));
echo "ano +1: ". $nova_data."<br>";
echo "<hr>";

echo"SUBTRAÇÃO ENTRE 2 DATAS IMPORTANTES"."<br>"."<br>";
$data1="2001-01-01";
$data11="2000-01-01";
$diferenca=strtotime($data1) - strtotime($data11);
$dias=floor($diferenca/(60*60*24));
echo"a diferença em dias: ".$dias."<br>";
echo "<hr>";

echo"RETORNA A DATA ATUAL EM SEG DESDE O ANO 1970 EU ACHO"."<br>"."<br>";
echo time();
echo "<hr>";

echo"ATV"."<br>"."<br>";

echo '<a href="./atv1/atv1.html">ATV1</a> <br>';
echo '<a href="./atv2/atv2.html">ATV2</a> <br>';
echo '<a href="./atv3/atv3.html">ATV3</a> <br>';
?> 