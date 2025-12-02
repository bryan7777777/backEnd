<?php
require '/conexao.php';
$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $disponivel = password_hash($_POST['disponivel'], PASSWORD_DEFAULT);
    $imagem = $_FILES['imagem'];

    try {
        $sql = "INSERT INTO livros (titulo,autor,disponivel,imagem)
        VALUES(:titulo,:autor,:disponivel,:imagem)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':disponivel' => $disponivel,
            ':imagem' => $imagem
        ]);
        $mensagem = "<p class='sucesso'>sucesso vc foi sceito em figadus moguidus." . $e->getMessage() . "</p>";
        header("location:/painel.php");
        exit;
    } catch (PDOException $e) {
        $mensagem = "<p class='erro'>Erro fatal, delete seu pc." . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar usuario</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div class="container">
        <h1>Castrar</h1>
        <?= $mensagem ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder="Título">
            <input type="text" name="autor" placeholder="Autor">
            <input type="checkbox" name="disponivel"> Disponível
            <input type="file" name="imagem" accept="image/*">
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>