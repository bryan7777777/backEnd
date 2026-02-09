
<?php
// Inicia a sessão para poder acessar os dados do usuário logado
session_start();

// Verifica se NÃO existe a variável 'usuario' dentro da sessão.
// Isso significa que ninguém está logado.
if (!isset($_SESSION['usuario'])) {

    // Se não estiver logado, envia a pessoa de volta para a tela de login
    header("Location: index.php");

    // Encerra o script para garantir que nada mais será executado
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel</title>
<link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
<div class="container">
    <h1>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h1>
    


<nav class="menu">
    <div class="dropdown">
        <button class="dropbtn">Usuários</button>
        <div class="dropdown-content">
            <a href="usuarios/cadastrar.php">Cadastrar Usuário</a>
            <a href="usuarios/listar.php">Listar Usuários</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Livros</button>
        <div class="dropdown-content">
            <a href="livros/cadastrar.php">Cadastrar Livro</a>
            <a href="livros/listar.php">Listar Livros</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Aluguéis</button>
        <div class="dropdown-content">
            <a href="alugueis/cadastrar.php">Alugar Livro</a>
            <a href="alugueis/listar.php">Listar Aluguéis</a>
        </div>
    </div>

    <a href="logout.php" class="logout">Sair</a>
</nav>



</div>
</body>
</html>
