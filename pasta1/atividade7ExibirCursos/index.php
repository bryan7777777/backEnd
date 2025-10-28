<?php
include 'Exibir.php';
$nome=$cidade=$bairro=$curso='';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $nome=$_POST['nome'];
    $cidade=$_POST['cidade'];
    $bairro=$_POST['bairro'];
    $curso=$_POST['curso'];

    $result= new Exibir($nome,$cidade,$bairro,$curso);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>wallace matador de onça</title>
</head>
<body>
    <form action="" method="post">
        <label for="">aluno apelido?</label>
        <input type="text" name="aluno" placeholder="nome">
        <label for="">onde habitas?</label>
        <input type="text" name="aluno" placeholder="cidade">
        <label for="">barro?</label>
        <input type="text" name="aluno" placeholder="bairro">
        <label for="">fez o cursinho de como ganhar 1mil esse ano?</label>
        <input type="text" name="aluno" placeholder="curso">
        <input type="submit" value="verificar sua existencia">
    </form>
    <?php 
    if ($result!=='') {
        echo "<h2>result de tudo o que aconteceu esse ano:$result</h2>";
    }
    ?>
</body>
</html>