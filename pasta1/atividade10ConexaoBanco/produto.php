<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $descricao = $_POST["descricao"];

    if (!empty($nome)) {

        $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao)
                VALUES (:nome, :preco, :quantidade, :descricao)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":descricao", $descricao);

        if ($stmt->execute()) {
            $mensagem = "produto cadastrado com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar produto.";
        }
    } else {
        $mensagem = "O campo nome é obrigatório!";
    }
}
$sql="SELECT * FROM produtos ORDER BY id DESC";
$stmt=$pdo->query($sql);
$produtos=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de produto</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="form-container">
    <h2>Cadastro de produto</h2>

    <form method="POST">
        <label>nome:</label>
        <input type="text" name="nome" required>

        <label>preço:</label>
        <input type="text" name="preco" required>

        <label>quantidade:</label>
        <input type="text" name="quantidade" required>

        <label>descricao:</label>
        <input type="text" name="descricao">

        <button type="submit">Cadastrar produto</button>
    </form>

    <?php if (isset($mensagem)) { ?>
        <div class="mensagem"><?= $mensagem ?></div>
    <?php } ?>

    <?php
    if (!empty($produtos)) {?>
    <div class="tabela-container">
        <h3>produtos localizados</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nome</th>
                    <th>preço</th>
                    <th>quantidade</th>
                    <th>desc</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($produtos as $produto){?>
                    <tr>
                        <td><?= $produto['id']?></td>
                        <td><?= htmlspecialchars($produto['nome'])?></td>
                        <td><?= htmlspecialchars($produto['preco'])?></td>
                        <td><?= htmlspecialchars($produto['quantidade'])?></td>
                        <td><?= htmlspecialchars($produto['descricao'])?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
    


</body>
</html>
