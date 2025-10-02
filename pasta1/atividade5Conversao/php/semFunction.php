<!-- Criar um algoritmo em php que permita três tipos de conversão:
- Conversão de Real para Dólar
- Conversão de Real para Euro
- Conversão de Real para qualquer moeda que vocês escolherem
 
O usuário deverá informar o valor em real e escolher em qual moeda deseja ver a
conversão. Importante realizar todas as validações e impedir que erros ocorram.
 
Usar o conceito de function para validar as entradas, exibir as mensagens, e para
realizar a conversão.
 
Importante
- Entrega feita no GitHub
- O repositório deverá ter os seguintes commits
     - estruturação do html e estilização com css
     - criação da página php sem functions mas funcional
     - criação da função que valida entradas
     - criação da função que exibe a mensagem
     - criação da função que converte para dólar
     - criação da função que converte para euro
     - criação da função que converte para a moeda de sua escolha  -->

<?php 
$valor = filter_input(INPUT_GET, "valor", FILTER_VALIDATE_FLOAT);
$opcao = filter_input(INPUT_GET, "moeda", FILTER_VALIDATE_INT);
$result = "";

// teste para ver se na valodação ele vem null
// echo $valor==null? "sim":"no";

if ($valor==null || $opcao == null) {
    header("Location: ../index.html");
}

switch ($opcao) {
    case 1:
        $result = number_format($valor*0.16, 2, ",", ".");
        break;
        
    case 2:
        $result = number_format($valor*0.1877, 2, ",", ".");
        break;
    
    case 3:
        $result = number_format($valor*27.60, 2, ",", ".");
        break;
    
    default:
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style.css">
    <title>RESULTADO DA CONVERSÃO</title>
</head>
<body>
    <div id="result">
        <h1><?="O resultado da conversão é:"?></h1>
        <?=$result?>
    </div>
</body>
</html>