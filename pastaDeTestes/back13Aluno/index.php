<?php
require_once "Aluno.php"
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./odeioCss.css">
</head>
<body>
    <h1>castrar aluno</h1>
    <form action="" method="post">
        <label for="nome">numbre</label>
        <input type="text" name="nome" placeholder="nome do elemento" required>
        <label for="cidade">cidadus cidadam</label>
        <input type="text" name="cidade" placeholder="cidade do elemento" required>
        <label for="bairro">barro</label>
        <input type="text" name="bairro" placeholder="bairro do elemento" required>
        <label for="curso">cobre</label>
        <select name="curso" required id="">
            <option value="vender abacate sem perder um rin">Como vender abacate sem perder um rin</option>
            <option value="curso de onipotencia">Como virar o alien-x</option>
            <option value="como ficar rico em menos de 1semana">Como ficar rico em menos de 1 semana</option>
        </select>
        <input type="submit" value="cadastro do elemento">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $nome=$_POST["nome"];
        $cidade=$_POST["cidade"];
        $bairro=$_POST["bairro"];
        $curso=$_POST["curso"];
        
    }
    ?>
</body>
</html>