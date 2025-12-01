<?php
require '/conexao.php';
$mensagem="";
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $nome=trim($_POST['nome']);
    $email=trim($_POST['email']);
    $senha=password_hash($_POST['senha'],PASSWORD_DEFAULT);
    $tipo=$_POST['tipo'];

    try{
        $sql="INSERT INTO usuarios(nome,email,senha,tipo)
        VALUES(:nome,:email,:senha,:tipo)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([
            ':nome'=>$nome,
            ':email'=>$email,
            ':senha'=>$senha,
            ':tipo'=>$tipo
        ]);
        $mensagem="<p class='sucesso'>sucesso vc foi sceito em figadus moguidus.".$e->getMessage()."</p>";
        header("location:/painel.php");
        exit;
    }catch(PDOException $e){
        $mensagem="<p class='erro'>Erro fatal, delete seu pc.".$e->getMessage()."</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar usuario</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <h1>Castrar</h1>
        <?= $mensagem ?>
    <form action="" method="post">
        <input type="text" name="nome" placeholder="nome herdado de sujeito no preterito imperfeito">
        <input type="email" name="email" placeholder="email da sua alma">
        <input type="password" name="senha" placeholder="senha do cartao">
        <select name="tipo" id="">
            <option value="admin">adm</option>
            <option value="aluno">zumano</option>
        </select>
        <button type="submit">castrar</button>
    </form>
    </div>
</body>
</html>