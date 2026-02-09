<?php
// Importa o arquivo que faz a conexão com o banco de dados
require '../conexao.php';

// Verifica se o ID foi enviado na URL e se ele não está vazio
// Exemplo de URL correta: editar.php?id=3
// verifica se existe e se tem informação.

if (!isset($_GET['id']) || empty($_GET['id'])) {

    // Se o ID não existir, envia o usuário de volta para a lista
    header("Location: listar.php");
    exit;
}

// Converte o ID vindo da URL em número inteiro para evitar erros
$id = intval($_GET['id']);

// Cria um comando SQL para buscar o usuário com o ID informado
$sql = "SELECT * FROM usuarios WHERE id = :id LIMIT 1";

// Prepara o SQL para ser executado com segurança
$stmt = $pdo->prepare($sql);

// Executa o SQL passando o ID como parâmetro
$stmt->execute([':id' => $id]);

// Guarda os dados do usuário encontrados no banco
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Se não encontrar nenhum usuário com esse ID, volta para a lista
if (!$usuario) {
    header("Location: listar.php");
    exit;
}

// Cria uma variável para guardar possíveis mensagens (como erros)
$mensagem = "";

// Verifica se o formulário foi enviado usando método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Pega o nome enviado pelo formulário e remove espaços extras
    $nome = trim($_POST['nome']);

    // Pega o e-mail enviado pelo formulário
    $email = trim($_POST['email']);

    // Pega o tipo (admin ou aluno) enviado pelo formulário
    $tipo = $_POST['tipo'];

    // Verifica se o campo senha foi preenchido
    if (!empty($_POST['senha'])) {

        // Criptografa a nova senha para armazenar com segurança
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        // Monta o SQL para atualizar todos os dados, incluindo a senha
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, tipo = :tipo WHERE id = :id";

        // Cria os valores que serão enviados juntos com o SQL
        $params = [
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha,
            ':tipo' => $tipo,
            ':id' => $id
        ];

    } else {

        // Se a senha não for preenchida, atualiza apenas nome, email e tipo
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, tipo = :tipo WHERE id = :id";

        // Valores que serão enviados no SQL (sem a senha)
        $params = [
            ':nome' => $nome,
            ':email' => $email,
            ':tipo' => $tipo,
            ':id' => $id
        ];
    }

    try {
        // Prepara o SQL para ser executado
        $stmt = $pdo->prepare($sql);

        // Executa o SQL passando os valores coletados
        $stmt->execute($params);

        // Após salvar as alterações, volta para a lista de usuários
        header("Location: listar.php");
        exit;

    } catch (PDOException $e) {

        // Se ocorrer algum erro, cria uma mensagem mostrando o problema
        $mensagem = "<p class='erro'>Erro ao atualizar: ".$e->getMessage()."</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Usuário</title>
<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

<div class="card-editar">
    <h1>Editar Usuário</h1>

    <?= $mensagem ?>

    <form method="POST">

        <div class="input-group">
            <label>Nome</label>
            <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
        </div>

        <div class="input-group">
            <label>Nova Senha <small>(opcional)</small></label>
            <input type="password" name="senha" placeholder="Deixe em branco para não alterar">
        </div>

        <div class="input-group">
            <label>Tipo</label>
            <select name="tipo" required>
                <option value="admin" <?= $usuario['tipo'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="aluno" <?= $usuario['tipo'] == 'aluno' ? 'selected' : '' ?>>Aluno</option>
            </select>
        </div>

        <button type="submit" class="btn">Salvar Alterações</button>
        <a href="listar.php" class="btn-voltar">Voltar</a>

    </form>
</div>

</body>
</html>
