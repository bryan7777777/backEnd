<?php
// cadastro_imovel.php
require_once "conexao.php"; // deve definir $pdo (PDO)

$mensagem = "";

try {
    // lista clientes para selecionar proprietário (necessário para FK)
    $clientes = $pdo->query("SELECT idCliente, nomeCliente FROM cliente ORDER BY nomeCliente")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $clientes = [];
    $mensagem = "Erro ao carregar clientes: " . $e->getMessage();
}

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $idCliente = intval($_POST["idCliente"] ?? 0);
        $tipoImovel = trim($_POST["tipoImovel"] ?? "");
        $finalidade = trim($_POST["finalidade"] ?? "");
        $localizacao = trim($_POST["localizacao"] ?? "");
        $areaCostruida = $_POST["areaCostruida"] !== "" ? floatval($_POST["areaCostruida"]) : null;
        $areaTerreno = $_POST["areaTerreno"] !== "" ? floatval($_POST["areaTerreno"]) : null;
        $qtdQuartos = intval($_POST["qtdQuartos"] ?? 0);
        $qtdBanheiros = intval($_POST["qtdBanheiros"] ?? 0);
        $qtdGaragem = intval($_POST["qtdGaragem"] ?? 0);
        $descricao = trim($_POST["descricao"] ?? "");

        if ($idCliente <= 0) {
            $mensagem = "Selecione um cliente proprietário.";
        } elseif ($tipoImovel === "") {
            $mensagem = "O tipo do imóvel é obrigatório.";
        } else {
            $sql = "INSERT INTO imovel
                (idCliente, tipoImovel, finalidade, localizacao, areaCostruida, areaTerreno, qtdQuartos, qtdBanheiros, qtdGaragem, descricao)
                VALUES
                (:idCliente, :tipoImovel, :finalidade, :localizacao, :areaCostruida, :areaTerreno, :qtdQuartos, :qtdBanheiros, :qtdGaragem, :descricao)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->bindValue(":tipoImovel", $tipoImovel);
            $stmt->bindValue(":finalidade", $finalidade);
            $stmt->bindValue(":localizacao", $localizacao);
            $stmt->bindValue(":areaCostruida", $areaCostruida);
            $stmt->bindValue(":areaTerreno", $areaTerreno);
            $stmt->bindValue(":qtdQuartos", $qtdQuartos, PDO::PARAM_INT);
            $stmt->bindValue(":qtdBanheiros", $qtdBanheiros, PDO::PARAM_INT);
            $stmt->bindValue(":qtdGaragem", $qtdGaragem, PDO::PARAM_INT);
            $stmt->bindValue(":descricao", $descricao);

            if ($stmt->execute()) {
                $mensagem = "Imóvel cadastrado com sucesso!";
                header("Location: " . $_SERVER['PHP_SELF'] . "?ok=1");
                exit;
            } else {
                $mensagem = "Erro ao cadastrar imóvel.";
            }
        }
    }
} catch (PDOException $e) {
    $mensagem = "Erro no banco: " . $e->getMessage();
}

// busca imóveis com o nome do cliente
try {
    $sqlImovels = "
        SELECT i.*, c.nomeCliente AS proprietario
        FROM imovel i
        LEFT JOIN cliente c ON c.idCliente = i.idCliente
        ORDER BY idImovel DESC
    ";
    $imovels = $pdo->query($sqlImovels)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $imovels = [];
    $mensagem .= " (Erro ao buscar imóveis: " . $e->getMessage() . ")";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Imóvel</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h2>Cadastro de Imóvel</h2>

    <?php if (!empty($mensagem)) : ?>
        <div class="mensagem"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Proprietário (Cliente):</label>
        <select name="idCliente" required>
            <option value="">-- selecione --</option>
            <?php foreach ($clientes as $c): ?>
                <option value="<?= $c['idCliente'] ?>"><?= htmlspecialchars($c['nomeCliente']) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Tipo do Imóvel:</label><input type="text" name="tipoImovel" required>
        <label>Finalidade:</label><input type="text" name="finalidade">
        <label>Localização:</label><input type="text" name="localizacao">
        <label>Área Construída (m²):</label><input type="number" step="0.01" name="areaCostruida">
        <label>Área do Terreno (m²):</label><input type="number" step="0.01" name="areaTerreno">
        <label>Quantidade de Quartos:</label><input type="number" name="qtdQuartos">
        <label>Quantidade de Banheiros:</label><input type="number" name="qtdBanheiros">
        <label>Quantidade de Garagem:</label><input type="number" name="qtdGaragem">
        <label>Descrição:</label><textarea name="descricao"></textarea>

        <button type="submit">Cadastrar Imóvel</button>
    </form>

    <h3>Imóveis cadastrados</h3>
    <?php if (!empty($imovels)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Proprietário</th><th>Tipo</th><th>Finalidade</th><th>Localização</th>
                <th>Área Construída</th><th>Área Terreno</th><th>Quartos</th><th>Banheiros</th><th>Garagem</th><th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imovels as $i): ?>
                <tr>
                    <td><?= $i['idImovel'] ?? '' ?></td>
                    <td><?= htmlspecialchars($i['proprietario'] ?? '') ?></td>
                    <td><?= htmlspecialchars($i['tipoImovel'] ?? '') ?></td>
                    <td><?= htmlspecialchars($i['finalidade'] ?? '') ?></td>
                    <td><?= htmlspecialchars($i['localizacao'] ?? '') ?></td>
                    <td><?= htmlspecialchars($i['areaCostruida'] ?? '') ?></td>
                    <td><?= htmlspecialchars($i['areaTerreno'] ?? '') ?></td>
                    <td><?= htmlspecialchars($i['qtdQuartos'] ?? '') ?></td>
                    <td><?= htmlspecialchars($i['qtdBanheiros'] ?? '') ?></td>
                    <td><?= htmlspecialchars($i['qtdGaragem'] ?? '') ?></td>
                    <td><?= htmlspecialchars($i['descricao'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Nenhum imóvel cadastrado.</p>
    <?php endif; ?>
</body>
</html>
