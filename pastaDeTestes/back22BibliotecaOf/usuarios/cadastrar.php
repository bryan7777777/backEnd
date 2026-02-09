<?php
// Importa o arquivo que faz a conexão com o banco de dados
require '../conexao.php';

// Variável que vai guardar mensagens (ex: erro)
$mensagem = "";

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Pega o nome digitado e remove espaços extras
    $nome = trim($_POST['nome']);

    // Pega o e-mail digitado e remove espaços extras
    $email = trim($_POST['email']);

    // Criptografa a senha para salvar com segurança
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Pega o tipo de usuário escolhido (admin ou aluno)
    $tipo = $_POST['tipo'];

    try {
        // Comando SQL para inserir um novo usuário no banco de dados
        $sql = "INSERT INTO usuarios (nome, email, senha, tipo) 
                VALUES (:nome, :email, :senha, :tipo)";

        // Prepara o SQL antes de executar
        $stmt = $pdo->prepare($sql);

        // Executa o comando com os valores digitados
        $stmt->execute([
            ':nome'  => $nome,
            ':email' => $email,
            ':senha' => $senha,
            ':tipo'  => $tipo
        ]);

        // Depois de cadastrar, volta para o painel
        header("Location: ../painel.php");
        exit;

    } catch (PDOException $e) {
        // Caso aconteça algum erro, mostra a mensagem
        $mensagem = "<p class='erro'>Erro ao cadastrar: " . $e->getMessage() . "</p>";
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastrar Usuário</title>
<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<div class="container">
    <h1>Cadastrar Usuário</h1>
    <?php echo $mensagem; ?>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <select name="tipo" required>
            <option value="admin">Admin</option>
            <option value="aluno">Aluno</option>
        </select>
        <button type="submit">Cadastrar</button>
    </form>
</div>
</body>
</html>