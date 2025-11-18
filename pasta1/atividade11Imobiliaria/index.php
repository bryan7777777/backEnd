<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $tipoLogradouro = $_POST["tipoLogradouro"];
    $nomeLogradouro = $_POST["nomeLogradouro"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];

    $tipoImovel = $_POST["tipoImovel"];
    $finalidade = $_POST["finalidade"];
    $localizacao = $_POST["localizacao"];
    $areaCostruida = $_POST["areaCostruida"];
    $areaTerreno = $_POST["areaTerreno"];
    $qtdQuartos = $_POST["qtdQuartos"];
    $qtdBanheiros = $_POST["qtdBanheiros"];
    $qtdGaragem = $_POST["qtdGaragem"];
    $descricao = $_POST["descricao"];
}

if (!empty($nome) && !empty($tipoImovel)) {
    $sqlCliente = "INSERT INTO cliente (nome, cpf, celular, email, cidade, estado, cep, tipoLogradouro, nomeLogradouro, numero, complemento)
                VALUES (:nome, :cpf, :celular, :email, :cidade, :estado, :cep, :tipoLogradouro, :nomeLogradouro, :numero, :complemento)";

    $sqlImovel = "INSERT INTO imovel(tipoImovel, finalidade, localizacao, areaConstruida, areaTerreno, qtdQuartos, qtdBanheiros, qtdGaragem, descricao)
                VALUES (:tipoImovel, :finalidade, :localizacao, :areaConstruida, :areaTerreno, :qtdQuartos, :qtdBanheiros, :qtdGaragem, :descricao)";

    $stmtCliente = $pdo->prepare($sqlCliente);

    $stmtCliente->bindParam(":nome", $nome);
    $stmtCliente->bindParam(":cpf", $cpf);
    $stmtCliente->bindParam(":celular", $celular);
    $stmtCliente->bindParam(":email", $email);
    $stmtCliente->bindParam(":cidade", $cidade);
    $stmtCliente->bindParam(":estado", $estado);
    $stmtCliente->bindParam(":cep", $cep);
    $stmtCliente->bindParam(":tipoLogradouro", $tipoLogradouro);
    $stmtCliente->bindParam(":nomeLogradouro", $nomeLogradouro);
    $stmtCliente->bindParam(":numero", $numero);
    $stmtCliente->bindParam(":complemento", $complemento);

    //imovel
    $stmtImovel = $pdo->prepare($sqlImovel);

    $stmtImovel->bindParam(":tipoImovel", $tipoImovel);
    $stmtImovel->bindParam(":finalidade", $finalidade);
    $stmtImovel->bindParam(":localizacao", $localizacao);
    $stmtImovel->bindParam(":areaCostruida", $areaCostruida);
    $stmtImovel->bindParam(":areaTerreno", $areaTerreno);
    $stmtImovel->bindParam(":qtdQuartos", $qtdQuartos);
    $stmtImovel->bindParam(":qtdBanheiros", $qtdBanheiros);
    $stmtImovel->bindParam(":qtdGaragem", $qtdGaragem);
    $stmtImovel->bindParam(":descricao", $descricao);

    if ($stmtCliente->execute()) {
        $mensagem = "Cliente cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar cliente.";
    }
} else {
    $mensagem = "O campo nome é obrigatório!";
}

$sqlCliente = "SELECT * FROM cliente ORDER BY idCliente ";
$stmtCliente = $pdo->query($sqlCliente);
$clientes = $stmtCliente->fetchAll(PDO::FETCH_ASSOC);

$sqlImovel = "SELECT * FROM cliente ORDER BY idCliente ";
$stmtImovel = $pdo->query($sqlImovel);
$imovels = $stmtCliente->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Imoveis</title>
    <!-- Importa o arquivo CSS externo com o estilo da página -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<!-- Container principal do formulário -->
<div class="form-container">
    <!-- Formulário de envio de dados (método POST) -->
    <form method="POST">
        <h2>Cadastro de Cliente</h2>

<label>Nome:</label>
<input type="text" name="nome" required>

<label>CPF:</label>
<input type="text" name="cpf" required>

<label>Celular:</label>
<input type="text" name="celular" required>

<label>Email:</label>
<input type="email" name="email" required>

<label>Cidade:</label>
<input type="text" name="cidade" required>

<label>Estado:</label>
<input type="text" name="estado" required>

<label>CEP:</label>
<input type="text" name="cep">

<label>Tipo de Logradouro:</label>
<input type="text" name="tipoLogradouro" required>

<label>Nome do Logradouro:</label>
<input type="text" name="nomeLogradouro" required>

<label>Número:</label>
<input type="text" name="numero" required>

<label>Complemento:</label>
<input type="text" name="complemento">


<h2>Cadastro do Imóvel</h2>

<label>Tipo do Imóvel:</label>
<input type="text" name="tipoImovel" required>

<label>Finalidade:</label>
<input type="text" name="finalidade" required>

<label>Localização:</label>
<input type="text" name="localizacao" required>

<label>Área Construída (m²):</label>
<input type="number" name="areaConstruida" step="0.01" required>

<label>Área do Terreno (m²):</label>
<input type="number" name="areaTerreno" step="0.01" required>

<label>Quantidade de Quartos:</label>
<input type="number" name="qtdQuartos" required>

<label>Quantidade de Banheiros:</label>
<input type="number" name="qtdBanheiros" required>

<label>Quantidade de Garagem:</label>
<input type="number" name="qtdGaragem" required>

<label>Descrição:</label>
<textarea name="descricao"></textarea>

        <button type="submit">Cadastrar</button>
    </form>

    <!-- Se existir uma mensagem (erro ou sucesso), ela será exibida aqui -->
    <?php if (isset($mensagem)) { ?>
        <div class="mensagem"><?= $mensagem ?></div>
    <?php } ?>

    <?php
    if (!empty($clientes)) {?>
    <div class="tabela-container">
        <h3>clientes localizados</h3>
        <table>
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Nome:</th>
                    <th>CPF:</th>
                    <th>Celular:</th>
                    <th>Email:</th>
                    <th>Cidade:</th>
                    <th>Estado:</th>
                    <th>CEP:</th>
                    <th>Tipo de Logradouro:</th>
                    <th>Nome do Logradouro:</th>
                    <th>Número:</th>
                    <th>Complemento:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($clientes as $cliente){?>
                    <tr>
                        <td><?= $cliente['idCliente']?></td>
                        <td><?= htmlspecialchars($cliente['nome'])?></td>
                        <td><?= htmlspecialchars($cliente['cpf'])?></td>
                        <td><?= htmlspecialchars($cliente['celular'])?></td>
                        <td><?= htmlspecialchars($cliente['email'])?></td>
                        <td><?= htmlspecialchars($cliente['cidade'])?></td>
                        <td><?= htmlspecialchars($cliente['estado'])?></td>
                        <td><?= htmlspecialchars($cliente['cep'])?></td>
                        <td><?= htmlspecialchars($cliente['tipoLogradouro'])?></td>
                        <td><?= htmlspecialchars($cliente['nomeLogradouro'])?></td>
                        <td><?= htmlspecialchars($cliente['numero'])?></td>
                        <td><?= htmlspecialchars($cliente['complemento'])?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>

    <?php
    if (!empty($imovels)) {?>
    <div class="tabela-container">
        <h3>imoveis localizados</h3>
        <table>
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>ID do proprietario:</th>
                    <th>Tipo do Imóvel:</th>
                    <th>Finalidade:</th>
                    <th>Localização:</th>
                    <th>Área Construída (m²):</th>
                    <th>Área do Terreno (m²):</th>
                    <th>Quantidade de Quartos:</th>
                    <th>Quantidade de Banheiros:</th>
                    <th>Quantidade de Garagem:</th>
                    <th>Descrição:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($imovels as $imovel){?>
                    <tr>
                        <td><?= $imovel['idImovel']?></td>
                        <td><?= $imovel['idCliente']?></td>
                        <td><?= htmlspecialchars($imovel['tipoImovel'])?></td>
                        <td><?= htmlspecialchars($imovel['finalidade'])?></td>
                        <td><?= htmlspecialchars($imovel['localizacao'])?></td>
                        <td><?= htmlspecialchars($imovel['areaCostruida'])?></td>
                        <td><?= htmlspecialchars($imovel['areaTerreno'])?></td>
                        <td><?= htmlspecialchars($imovel['qtdQuartos'])?></td>
                        <td><?= htmlspecialchars($imovel['qtdBanheiros'])?></td>
                        <td><?= htmlspecialchars($imovel['qtdGaragem'])?></td>
                        <td><?= htmlspecialchars($imovel['descricao'])?></td>
                        <td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
</body>
</html>