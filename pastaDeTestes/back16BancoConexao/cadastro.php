<?php
require_once "conexao.php";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $nome=$_POST["nome"];
    $endereco=$_POST["endereco"];
    $cidade=$_POST["cidade"];
    $bairro=$_POST["bairro"];
    if (!empty($nome)) {
        $sql="INSERT INTO clientes(nome,endereco,cidade,bairro)
              VALUES (:nome,:endereco,:cidade,:bairro)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nome",$nome);
            $stmt->bindParam(":endereco",$endereco);
            $stmt->bindParam(":cidade",$cidade);
            $stmt->bindParam(":bairro",$bairro);

            if ($stmt->execute()) {
                $mensagem="cliente foi deportado com sucesso!";
            } else {
                $mensagem="erro fatal, delete sua vida";
            }
    } else {
        $mensagem="o campo nome é not null, como vc deixou ele null vc sera deletado e resumido a null, seus status seram considerados null e sua vida sera null devido a esse erro mortal no qual vc se permitiu acontecer, sucumba";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro caba</title>
    <link rel="stylesheet" href="./estilo.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
        <label for="">Nome do elemento:</label>
        <input type="text"name="nome"required>
        <label for="">Endereço da ponte do elemento:</label>
        <input type="text"name="endereco"required>
        <label for="">Cidade onde o elemento ainda não foi banido:</label>
        <input type="text"name="cidade"required>
        <label for="">Bairro onde o elemento é conhecido de forma decente e n mortal:</label>
        <input type="text"name="bairro"required>
        <button type="submit">Cadastra elemento elementar</button>
        </form>
        <?=$mensagem?>
    </div>
</body>
</html>