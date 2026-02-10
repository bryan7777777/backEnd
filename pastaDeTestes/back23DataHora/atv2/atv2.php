<?php
$tempo = $_GET['data'];

$data1=date('Y-m-d');
$diferenca=strtotime($data1) - strtotime($tempo);
$dias=floor($diferenca/(60*60*24));
echo"DIAS: ".$dias."<br>"."<br>";

$data1=date('Y-m-d');
$diferenca=strtotime($data1) - strtotime($tempo);
$mes=floor($diferenca/(60*60*24*30));
echo"MESES: ".$mes."<br>"."<br>";

$data1=date('Y-m-d');
$diferenca=strtotime($data1) - strtotime($tempo);
$anos=floor($diferenca/(60*60*24*365));
echo"ANOS: ".$anos."<br>"."<br>";
?>