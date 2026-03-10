<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    if ($_FILES['image']['error']== UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "o arquivo". basename($_FILES["image"]["name"])." foi enviado com sucesso.";
            } else {
                echo "Desculpe, houve um erro ao enviar o seu arquivo.";
            }
        } else {
            echo "O arquivo não é uma imagem.";
        }
    } else {
        echo "Nenhum arquivo enviado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
</head>
<body>
    <p>Redirecionando para a galeria...</p>
</body>
</html>