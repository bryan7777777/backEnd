<?php
$n1 = filter_input(INPUT_GET,"n1");
$n2 = filter_input(INPUT_GET,"n2");
$passo = filter_input(INPUT_GET,"passo");
$result = "";

for ($i = 0; $n1 <= $n2; $n1 = $n1 + $passo){

    $result = $result . "<li> $n1 </li>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>FOR</h1>
    <ul>
        <?= $result ?>
    </ul>
</body>
</html>