
<?php
// Importa o arquivo que faz a conexão com o banco de dados
require '../conexao.php';

// Pega o ID do usuário que veio pela URL (ex: excluir.php?id=5)
$id = $_GET['id'];

try {

    // Cria o comando SQL que vai apagar o usuário com o ID informado
    $sql = "DELETE FROM usuarios WHERE id = :id";

    // Prepara o SQL para ser executado com segurança
    $stmt = $pdo->prepare($sql);

    // Executa o comando passando o ID como parâmetro
    $stmt->execute([':id'=>$id]);

    // Depois de excluir, volta para a página que lista os usuários
    header("Location: listar.php");

} catch (PDOException $e) {

    // Se acontecer algum erro, mostra a mensagem do erro na tela
    echo "Erro: ".$e->getMessage();
}
?>
