<?php
$divisor = filter_input(INPUT_GET, "divisor", FILTER_VALIDATE_INT);
$limite = filter_input(INPUT_GET, "limite", FILTER_VALIDATE_INT);
$result = "";

if ($divisor == false || $limite == false) {
    $result = "ERRO VALORES INVALIDOS";
}else{
    for ($i = 1; $i <= $limite; $i++) {
        $resultadado = $divisor*$i;
        $result = $result . "<tr>" . "<td>" . $divisor . "</td>" . "<td>" . " X " . "</td>" . "<td>" . $i . "</td>" . "<td>" . " = " . "</td>" . "<td>" . $resultadado . "</td>" . "</tr>";
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
    <div id="form">
        <h1>TABELA</h1>
    <table id="resultado">
        <?= $result?>
    </table>
    </div>
</body>

</html>