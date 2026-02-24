<?php
//strlen - Retorna o tamanho da String
$palavra="Senac Santos";
$tamanho=strlen($palavra);
echo $tamanho."<br>";

//strpos - Verifica quantos caracteres existem antes da palavre
$resultado=strpos($palavra,"Santos");
echo $resultado."<br>";

//str_replace - subistitui um palavra
$palavra="Seja bem vindo ao Google";
$resultado=str_replace("Google","Senac",$palavra);
echo $resultado."<br>";

//substr - Retorna parte do texto
$resultado=substr($palavra,5,10);
echo $resultado."<br>";

//strlower - Transforma em minuscula
$palavra="COMTEMPLE O MAGOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO";
echo $palavra."<br>";
$resultado=strtolower($palavra);
echo $resultado."<br>";

//strtoupper - letra maiúscula
$palavra="comtemple o magoooooooooooooooooooooooooooooooooooooooooooo";
echo $palavra."<br>";
$resultado=strtoupper($palavra);
echo $resultado."<br>";

//ucfirst - converte o primeiro caractere de uma String em maiúsculo
$palavra="mago";
echo $palavra."<br>";
$resultado=ucfirst($palavra);
echo $resultado."<br>";

//ucwords - cada palavra a primeira em maiusculo
$palavra="contemple o magoooooooo";
echo $palavra."<br>";
$resultado=ucwords($palavra);
echo $resultado."<br>";

//str_repeat - repete uma string um numero especifico de vezes
$palavra="mago";
echo $palavra."<br>";
$resultado=str_repeat($palavra,10);
echo $resultado."<br>";

//strrev - inverte a string 
$palavra="mago";
echo $palavra."<br>";
$resultado=strrev($palavra);
echo $resultado."<br>";

//strcmp - comparacao de trins (sensivel letra maiuscula e minuscula)
$palavra="mago";
$palavra2="Mago";
$resultado=strcmp($palavra, $palavra2);
echo $resultado."<br>";
?>