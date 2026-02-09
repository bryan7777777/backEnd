<?php
// Importa o arquivo que faz a conexão com o banco de dados
require '../conexao.php';

// Cria um comando SQL para buscar todos os usuários na tabela "usuarios"
$sql = "SELECT * FROM usuarios";

// Executa o comando SQL diretamente, pois não há parâmetros
$stmt = $pdo->query($sql);

// Pega todos os resultados da consulta e transforma em um array (lista)
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lista de Usuários</title>
<link rel="stylesheet" href="../CSS/style.css">

<style>
.btn-voltar {
    display: inline-block;
    padding: 10px 18px;
    background-color: #555;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    margin-bottom: 15px;
}
.btn-voltar:hover {
    background-color: #333;
}
</style>

</head>
<body>

<div class="lista-container">
    <h1>Lista de Usuários</h1>

    <!-- BOTÃO VOLTAR -->
    <a class="btn-voltar" href="../painel.php">Voltar para o Painel</a>

    <table class="tabela-usuarios">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['nome'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= ucfirst($u['tipo']) ?></td>
                <td>
                    <a class="btn-editar" href="editar.php?id=<?= $u['id'] ?>">Editar</a>
                    <a class="btn-excluir" href="excluir.php?id=<?= $u['id'] ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
