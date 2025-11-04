<?php
include 'Calculadora.php';
$num1=$num2=$result=$opcao='';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    $operacao=$_POST['operacao'];

    //criacao obj
    // $calc= new Calculadora($num1,$num2);
    // switch ($operacao) {
    //     case 'somar':
    //         $result=$calc->somar();
    //         break;
    //     case 'sub':
    //         $result=$calc->sub();
    //         break;
    //     case 'div':
    //         $result=$calc->div();
    //         break;
    //     case 'mult':
    //         $result=$calc->mult();
    //         break;
        
    //     default:
    //         echo "ERRO MORTAL SEM VALOR SEM PLACA DE VIDEO INTACTA";
    //         break;
    // }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Calc</title>
</head>
<h1>calcs sinistros</h1>
<body>
    <form action="" method="post">
        <label for="num1">n1:</label>
        <input type=" number" name="num1" value="<?=$num1?>" required>

        <label for="num2">n2:</label>
        <input type=" number" name="num2" value="<?=$num2?>" required>

        <label for="operacao">operacao:</label>
        <select name="operacao" id="operacao">
            <option value="somar" <?=($operacao=='somar')?'selected':'';?>>soma</option>
            <option value="sub" <?=($operacao=='sub')?'selected':'';?>>sub</option>
            <option value="div" <?=($operacao=='div')?'selected':'';?>>div</option>
            <option value="mult" <?=($operacao=='mult')?'selected':'';?>>mult</option>
        </select>
        <input type="submit" value="confirmar decisão continental">
    </form>
    <?php 
    if ($result!=='') {
        echo "<h2>result de tudo o que aconteceu esse ano:$result</h2>";
    }
    ?>
</body>
</html>