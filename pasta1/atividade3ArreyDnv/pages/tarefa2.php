<!-- 2. Crie um array associativo para armazenar informações de um produto:
 
a-Nome do produto, preço, quantidade em estoque.
b-Adicione 05 produtos e exiba as informações formatadas da seguinte forma:
    Produto: TV
    Preço: R$ 5.600,00
    Qtd: 08
c-Atualize o preço de todos os produto e exiba todos eles novamente, simulando um desconto de 10% em todos os produtos. -->
<?php
$tarefa = filter_input(INPUT_GET, "tarefa");
$produtos = array(["nome" => "agua", "preco" => 1, "qtd" => 9999999999999]);
$result = "";

switch ($tarefa) {
    case $tarefa == 1:
        var_dump($produtos);
        break;
    case $tarefa == 2:
        array_push($produtos, 
        ["nome" => "tv", "preco" => 10, "qtd" => 9], 
        ["nome" => "pc", "preco" => 11, "qtd" => 99], 
        ["nome" => "maquita", "preco" => 1200000000000000, "qtd" => 999], 
        ["nome" => "cama", "preco" => 13, "qtd" => 9999], 
        ["nome" => "leite", "preco" => 14, "qtd" => 99999]);
        // var_dump($produtos);
        for ($i=0; $i < 5; $i++) { 
        $result .=  "nome: ".$produtos[$i]["nome"]."<br>"."preço: ".$produtos[$i]["preco"]."<br>"."qtd: ".$produtos[$i]["qtd"]."<br>"."<br>";
        }
        break;
    case $tarefa == 3:
        array_push($produtos, 
        ["nome" => "tv", "preco" => 10, "qtd" => 9], 
        ["nome" => "pc", "preco" => 11, "qtd" => 99], 
        ["nome" => "maquita", "preco" => 120, "qtd" => 999], 
        ["nome" => "cama", "preco" => 13, "qtd" => 9999], 
        ["nome" => "leite", "preco" => 14, "qtd" => 99999]);
        // var_dump($produtos);
        for ($i=0; $i < 5; $i++) { 
        $result .=  "nome: ".$produtos[$i]["nome"]."<br>"."preço: ".$produtos[$i]["preco"]-($produtos[$i]["preco"]*0.10)."<br>"."qtd: ".$produtos[$i]["qtd"]."<br>"."<br>";
        }
        break;
    default:
        $result = "ERRO";
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/main.css">
    <title>Document</title>
</head>
<body>
    <h1>RESULTADO</h1>
    <div id="result"><?=$result?></div>
</body>
</html>