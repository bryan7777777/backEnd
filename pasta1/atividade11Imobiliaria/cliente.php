<?php
// cadastro_cliente.php
require_once "conexao.php"; // deve definir $pdo (PDO)

$mensagem = "";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Recebe dados do formulário (use os mesmos names do HTML abaixo)
        $nome = trim($_POST["nome"] ?? "");
        $cpf = trim($_POST["cpf"] ?? "");
        $celular = trim($_POST["celular"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $cidade = trim($_POST["cidade"] ?? "");
        $estado = trim($_POST["estado"] ?? "");
        $cep = trim($_POST["cep"] ?? "");
        $tipoLogradouro = trim($_POST["tipoLogradouro"] ?? "");
        $nomeLogradouro = trim($_POST["nomeLogradouro"] ?? "");
        $numero = trim($_POST["numero"] ?? "");
        $complemento = trim($_POST["complemento"] ?? "");

        if ($nome === "") {
            $mensagem = "O campo nome é obrigatório.";
        } else {
            $sql = "INSERT INTO cliente
                (nomeCliente, cpf, celular, email, cidade, estado, cep, tipoLogradouro, nomeLogradouro, numero, complemento)
                VALUES
                (:nomeCliente, :cpf, :celular, :email, :cidade, :estado, :cep, :tipoLogradouro, :nomeLogradouro, :numero, :complemento)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue("nomeCliente", $nome);
            $stmt->bindValue(":cpf", $cpf);
            $stmt->bindValue(":celular", $celular);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":cidade", $cidade);
            $stmt->bindValue(":estado", $estado);
            $stmt->bindValue(":cep", $cep);
            $stmt->bindValue(":tipoLogradouro", $tipoLogradouro);
            $stmt->bindValue(":nomeLogradouro", $nomeLogradouro);
            $stmt->bindValue(":numero", $numero);
            $stmt->bindValue(":complemento", $complemento);

            if ($stmt->execute()) {
                $mensagem = "Cliente cadastrado com sucesso!";
                // opcional: evitar reenvio ao atualizar a página
                header("Location: " . $_SERVER['PHP_SELF'] . "?ok=1");
                exit;
            } else {
                $mensagem = "Erro ao executar inserção de cliente.";
            }
        }
    }
} catch (PDOException $e) {
    // Log / debug: em produção remova a mensagem completa
    $mensagem = "Erro no banco: " . $e->getMessage();
}

// Busca clientes para listar
try {
    $sqlList = "SELECT * FROM cliente ORDER BY idCliente DESC";
    $clientes = $pdo->query($sqlList)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $clientes = [];
    $mensagem .= " (Erro ao buscar clientes: " . $e->getMessage() . ")";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h2>Cadastro de Cliente</h2>

    <?php if (!empty($mensagem)) : ?>
        <div class="mensagem"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Nome:</label><input type="text" name="nome" required>
        <label>CPF:</label><input type="text" name="cpf">
        <label>Celular:</label><input type="text" name="celular">
        <label>Email:</label><input type="email" name="email">
        <label>Cidade:</label><input type="text" name="cidade">
        <label>Estado:</label><input type="text" name="estado">
        <label>CEP:</label><input type="text" name="cep">
        <label>Tipo de Logradouro:</label><input type="text" name="tipoLogradouro">
        <label>Nome do Logradouro:</label><input type="text" name="nomeLogradouro">
        <label>Número:</label><input type="text" name="numero">
        <label>Complemento:</label><input type="text" name="complemento">
        <button type="submit">Cadastrar Cliente</button>
    </form>

    <h3>Clientes cadastrados</h3>
    <?php if (!empty($clientes)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nome</th><th>CPF</th><th>Celular</th><th>Email</th><th>Cidade</th><th>Estado</th><th>CEP</th>
                <th>Tipo Logradouro</th><th>Nome Logradouro</th><th>Número</th><th>Complemento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $c): ?>
                <tr>
                    <td><?= $c['idCliente'] ?? '' ?></td>
                    <td><?= htmlspecialchars($c['nome'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['cpf'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['celular'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['email'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['cidade'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['estado'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['cep'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['tipoLogradouro'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['nomeLogradouro'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['numero'] ?? '') ?></td>
                    <td><?= htmlspecialchars($c['complemento'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Nenhum cliente cadastrado.</p>
    <?php endif; ?>
</body>
</html>
