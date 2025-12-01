<?php
require './conexao.php';
$sql="SELECT * FROM usuarios";
$stmt=$pdo->query($sql);
$usuarios=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="listar-container">
        <h1>listar der usuarior</h1>
        <table class="table-usuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>email</th>
                    <th>tipo</th>
                    <th>acoes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $u);?>
                <tr>
                <td><?=$u['id']?></td>
                <td><?=$u['nome']?></td>
                <td><?=$u['email']?></td>
                <td><?=ucfirst($u['tipo'])?></td>
                <td>
                    <a class="btn-editar" href="editar.php?id=<?= $u['id']?>">hello word</a>
                    <a class="btn-excluir" href="excluir.php?id=<?= $u['id']?>" onclick="return confirm('deseja realmente matar os dados?')">hello devil word</a>
                </td>
                </tr>
                <?php 
            // endforeach;
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>