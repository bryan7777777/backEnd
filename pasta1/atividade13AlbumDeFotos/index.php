<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = session_id();
}

$pasta = "uploads/" . $_SESSION['user'];

if(!is_dir($pasta)){
    mkdir($pasta);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Galeria</title>
<link rel="stylesheet" href="./style.css">
</head>

<body>

    
<form action="upload.php" method="post" enctype="multipart/form-data">
<h1>Galeria de imagens</h1>
<div id="env"><input type="file" name="image">
<button type="submit">Enviar imagem</button></div>

</form>

<div class="gallery">
<?php 
$files = glob("uploads/" . $_SESSION['user'] . "/*.*");
foreach ($files as $file) {
echo '<img src="' . $file . '" alt="Imagem">';
}
?>
</div>

</body>
</html>