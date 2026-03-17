<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = session_id();
}

$target_dir = "uploads/" . $_SESSION['user'] . "/";

if(!is_dir($target_dir)){
    mkdir($target_dir);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {

if ($_FILES['image']['error'] == UPLOAD_ERR_OK ) {

$targetfiles = $target_dir . basename($_FILES['image']['name']);

$imagefiletype = strtolower(pathinfo($targetfiles, PATHINFO_EXTENSION));

//verificação do arquivo para ver se ele é real 
$check = getimagesize($_FILES["image"]["tmp_name"]);

if ($check !== false) {

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetfiles)) {

echo "O arquivo " . basename($_FILES["image"]["name"]). " foi enviado com sucesso";

}

else {
echo "Desculpe, houve um erro ao enviar esse arquivo.";
}

}

else {
echo "O arquivo não é uma imagem";
}

}

else {
echo "erro no upload:" . $_FILES['image']['error'];
}

}

else {
echo "Nenhum arquivo enviado";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><h2>Uploads de imagens</h2></title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <p>Redirecionando para a galeria... </p>
    <button><a href="index.php">Voltar</a></button>
</body>
</html>

