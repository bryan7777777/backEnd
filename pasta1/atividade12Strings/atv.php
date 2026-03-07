<?php
$nome = $_POST['nome'] ?? $_GET['nome'] ?? null;
$email = $_POST['email'] ?? $_GET['email'] ?? null;
$frase = $_POST['frase'] ?? $_GET['frase'] ?? null;

// 1 =======================
$resultado = strtolower($nome); 
echo "<h3>1 Nome formatado</h3>";
echo $resultado;
echo "<hr>";

$resultado = ucfirst($nome); 
echo "<h3>1 Nome formatado para a primeira letra maiscula </h3>";
echo $resultado;
echo "<hr>";



// 2 =======================
$resultado =strlen($nome);
echo "<h3>2 Quantidade de caracteres</h3>";
echo $resultado;
echo "<hr>";



// 3 =======================
$partes = explode(" ", $nome);
$primeiro_nome = $partes[0];

echo "<h3>3 Primeiro nome</h3>";
echo $primeiro_nome;
echo "<hr>";



// 4 =======================
if ( strpos($email, "@")  === false) {
    $mensagem = "Email inválido";
    echo "<h3>4 Verificação de Email</h3>";
    echo $mensagem;
    echo "<hr>";

} else {
    $mensagem = "Email válido";
    echo "<h3>4 Verificação de Email</h3>";
    echo $mensagem;
    echo "<hr>";
}

echo "<h3>5 Frase digitada</h3>";
echo $frase;
echo "<hr>";

// 5 =======================

$resultado = str_replace("Programação" | "programação" & "programacao","Tecnologia" , $frase);
echo "<h3>5 Palavra Trocada </h3>";
echo $resultado;
echo "<hr>";



// 6 =======================
$strlen = $frase;
$resultado = strrev($strlen);
echo "<br> <h3>6 Palavra ao contrario </h3> " .$resultado;
echo "<hr>";



// 7 =======================
 if (strcasecmp($primeiro_nome, "admin") == 0) {
    echo "<h3>7 Usuario administrador detectado !! </h3>";
    echo "<hr>";

 } else {
    echo "<h3>7 Usuário Comum</h3> ";
    echo "<hr>";
 }

echo "<h3> Desafios Extras</h3>";

echo "<h3>1) Mostrar o nome em MAIÚSCULO</h3>";
echo strtoupper($nome);
echo "<hr>";

echo "<h4>2) 10 primeiros caracteres da frase</h4>";
echo substr($frase, 0, 10);
echo "<hr>";

echo "<br><br>";
echo "<h4>3) Repetir a frase 3 vezes</h4>";
echo str_repeat($frase.'<br>', 3);
echo "<hr>";

echo "<br><br>";
echo "<h4>4) Contar quantas vezes aparece a letra 'A' </h4>";
echo substr_count(strtolower($frase), "a");
echo "<hr>";

?>