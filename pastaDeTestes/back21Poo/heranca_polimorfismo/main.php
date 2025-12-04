<?php
require 'personagens.php';
require 'tipoPersonagem.php';

$nome = $_GET["nome"];
$classe = $_GET['classe'];

$personagem = new $classe($nome,$classe);

$personagem->__set('nome', $nome);
$personagem->__set('tipoClasse', $classe);
echo $personagem->__get('nome')." o ".$classe."<br>";
echo "hp: ".$personagem->__get('hp')."<br>";
echo "atk: ".$personagem->__get('atk')."<br>";
echo "def: ".$personagem->__get('def')."<br>";
echo "abilidade do personagem:<br>";
$personagem->especial();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sal de cozinha</title>
</head>
<body>

</body>
</html>