<?php
//POST itens privados, GET velocidade 
// echo $_POST;
// echo $_GET;

//var_dump exibe conteudo dentro de um arrey
// var_dump($_POST);
// var_dump($_GET); 

//type: é o tipo que recebe a info, post ou get
//var_name: o nome do name no front
//filter: é o filtro escolhido para fzr a filtragem do conteudo do name
$lado1 = filter_input(INPUT_GET,"lado1",FILTER_VALIDATE_FLOAT);

$lado2 = filter_input(INPUT_GET,"lado2",FILTER_VALIDATE_FLOAT);

$lado3 = filter_input(INPUT_GET,"lado3",FILTER_VALIDATE_FLOAT);

if ($lado1==false || $lado2==false || $lado3==false) {
    $mensagem = "ERRO falatal, valor invalido, não sera possivel calcular a conta, utilize magia ou consute algum mago, ele sabera responder o motivo do sol ser de uma cor colorida";
} else {
    $perimetro = $lado1 + $lado2 + $lado3;
    $mensagem = "<p> lado 1:" .$_GET["lado1"]. "</p>".
                "<p> lado 2:" .$_GET["lado2"]. "</p>".
                "<p> lado 3:" .$_GET["lado3"]. "</p>".
                "o valor do perimetro é ".$perimetro;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Perimetro</title>
</head>

<body>
    <div id="resultado">
        <h1>Calculo perimetro</h1>
        <?php echo $mensagem ?>
    </div>
</body>

</html>