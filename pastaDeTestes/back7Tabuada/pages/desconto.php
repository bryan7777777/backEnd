<?php
$divisor = filter_input(INPUT_GET, "divisor", FILTER_VALIDATE_INT);
$limite = filter_input(INPUT_GET, "limite", FILTER_VALIDATE_INT);
$result = "";

if ($divisor == false || $limite == false) {
    $result = "ERRO VALORES INVALIDOS";
}else{
    for ($i = 1; $i <= $limite; $i++) {
        $resultadado = $divisor*$i;
        $result = "<p>" . $divisor . " X " . $i . " = " . $resultadado . "</p>" . $result;
}}
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
        <?= $result?>
    </div>
</body>

</html>