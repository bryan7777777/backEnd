<?php
session_start();
if(!isset($_SESSION['usuario_id'])){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Bem - vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']);?>!</h1>
    <p>Você está logado.</p>
    <a href = "logout.php"> Sair</a>
</body>
</html>