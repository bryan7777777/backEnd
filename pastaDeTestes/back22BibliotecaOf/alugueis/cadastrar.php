<?php
require '../conexao.php';
$usuarios = $pdo->query("SELECT id, nome FROM usuarios")->fetchALL(PDO::FETCH_ASSOC);
$livros = $pdo->query("SELECT id,titulo FROM livros WHERE disponivel = 1")->fetchALL(PDO::FETCH_ASSOC);
if($_SERVER ['REQUEST_METHOD']==='POST'){

    $id_usuario = $_POST['usuario'];
    $id_livro = $_POST['livro'];
    $data_aluguel = date('Y-m-d');
    $data_devolucao = date('Y-m-d', strtotime('+7 days'));
    try{
        $sql = "INSERT INTO alugueis 
        (id_usuario,id_livro, data_aluguel, data_devolucao, devolvido)
        VALUES
        (:usuario,:livro,:aluguel,:devolucao, 0)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':usuario' =>$id_usuario,
            ':livro' =>$id_livro,
            ':aluguel' =>$data_aluguel,
            ':devolucao' => $data_devolucao
        ]);
        $pdo->prepare("UPDATE livros SET disponivel = 0 where id = :id ")
        ->execute([':id' => $id_livro]);
        echo"<script>
        alert('Livro alugado com sucesso!');
        window.location = listar.php;
        </script>";
        exit;
    } catch(PDOException $e){
        $mensagem = "<p class ='erro'> Erro: ".$e->getMessage()."</p>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alugar livro</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class ="container">
        <h1>Alugar Livro</h1>
        <form  method="post">
            <select name="usuario" id="usuario">
                <option value="">Selecione o aluno</option>
            </select>

            <select name="livro" id="livro">
                <option value="">Selecione o livro</option>
            </select>
            <button type="submit">Alugar livro</button>
            <a href="../painel.php" class="btn-voltar">Voltar</a>
        </form>

    </div>
    
</body>
</html>
