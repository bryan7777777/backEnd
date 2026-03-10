<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Galeria de Imagens</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image/*">
        <button type="submit">Enviar Imagem</button>
    </form>
    <div class="gallery">
        <?php
        $files=glob("uploads/*.*");
        foreach ($files as $file) {
            echo '<img src="'.$file.'" alt="Imagem">';
        }
        ?>
    </div>
</body>
</html>