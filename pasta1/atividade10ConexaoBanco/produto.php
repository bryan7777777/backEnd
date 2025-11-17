<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $descricao = $_POST["descricao"];

    if (!empty($nome)) {

        // Cria o comando SQL de inserção com parâmetros nomeados (:nome, :preco, etc.)
        // Isso evita SQL Injection e é mais seguro
        $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao)
                VALUES (:nome, :preco, :quantidade, :descricao)";

        // Prepara o comando SQL antes da execução
        $stmt = $pdo->prepare($sql);

        // Faz a ligação (bind) dos valores do formulário com os parâmetros da query
        $stmt->bindParam(":nome", $nome);//serve para pegar as informações da variavel e inserir no comando SQL
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":descricao", $descricao);

        // Executa o comando SQL preparado
        if ($stmt->execute()) {
            // Se deu certo, cria uma mensagem de sucesso
            $mensagem = "produto cadastrado com sucesso!";
        } else {
            // Caso ocorra algum erro na execução da query
            $mensagem = "Erro ao cadastrar produto.";
        }
    } else {
        // Caso o campo "nome" esteja vazio, mostra uma mensagem de aviso
        $mensagem = "O campo nome é obrigatório!";
    }
}
//criar uma consulta no banco para mostrar as informações
$sql="SELECT * FROM produtos ORDER BY id DESC";
$stmt=$pdo->query($sql);
$produtos=$stmt->fetchAll(PDO::FETCH_ASSOC);//slv all registros num arrey assoc


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de produto</title>
    <!-- Importa o arquivo CSS externo com o estilo da página -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<!-- Container principal do formulário -->
<div class="form-container">
    <h2>Cadastro de produto</h2>

    <!-- Formulário de envio de dados (método POST) -->
    <form method="POST">
        <label>nome:</label>
        <!-- Campo obrigatório (required) -->
        <input type="text" name="nome" required>

        <label>preço:</label>
        <input type="text" name="preco" required>

        <label>quantidade:</label>
        <input type="text" name="quantidade" required>

        <label>descricao:</label>
        <input type="text" name="descricao">

        <button type="submit">Cadastrar produto</button>
    </form>

    <!-- Se existir uma mensagem (erro ou sucesso), ela será exibida aqui -->
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
