<?php
$nome = filter_input(INPUT_GET, "nome");
$idade = filter_input(INPUT_GET, "idade", FILTER_VALIDATE_INT);

switch ($idade == true) {
    case $idade >= 60:
        $declaracao = "Melhor idade ";
        $descricao = "você é bem vindo ";
        break;
    
    case $idade >= 26:
        $declaracao = "Adulto ";
        $descricao = "você é bem vindo ";
        break;
    
    case $idade >= 18:
        $declaracao = "Joven ";
        $descricao = "você é bem vindo ";
        break;
    
    case $idade >= 12:
        $declaracao = "Adolescente ";
        $descricao = "você não pode entrar ";
        break;
    
    case $idade >= 11:
        $declaracao = "Crinça ";
        $descricao = "você não pode entrar ";
        break;
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/desconto.css">
    <title>Desconto</title>
</head>

<body>
    <div id="resultado">
        <h1>Sua idade</h1>
        <?= "Senhor(a) " . $nome . " sua idade é " . $idade . ", você é considerado " . $declaracao . "por tanto, " . $descricao ?>
    </div>
</body>

</html>