<?php
require 'conexao.php';
if (!isset($_GET['id'])||empty($_GET['id'])) {
    header("location: listar.php");
    exit;
}
$id=intval($_GET['id']);
$sql="SELECT * FROM usuarios WHERE id=:id LIMIT 1";
$stmt=$pdo->prepare($sql);
$stmt->execute([':id'=>$id]);
$usuario=$stmt->fetch(PDO::FETCH_ASSOC);
if (!$usuario) {
    header("location: listar.php");
    exit;
}
$mensagem="";
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $nome=trim($_POST['nome']);
    $email=trim($_POST['email']);
    $tipo=trim($_POST['tipo']);
    if (!empty($_POST['senha'])) {
        $senha=password_hash($_POST['senha'],PASSWORD_DEFAULT);
        $sql="UPDATE usuarios SET nome=:nome,email=:email,senha=:senha,tipo=:tipo WHERE id=:id";
        $params=[
        ':nome'=>$nome,
        ':email'=>$email,
        ':senha'=>$senha,
        ':tipo'=>$tipo,
        ':id'=>$id
        ];
    }else{
        $sql="UPDATE usuarios SET nome=:nome,email=:email,tipo=:tipo WHERE id=:id";
        $params=[
        ':nome'=>$nome,
        ':email'=>$email,
        ':tipo'=>$tipo,
        ':id'=>$id
        ];
}
try {
    $stmt=$pdo->prepare($sql);
    $stmt->execute($params);
    header("location: listar.php");
    exit;
} catch (PDOException $e) {
    $mensagem="<p class='erro'>erro au tulizar: ".$e->getMessage()."</p>";
}
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="card-editar">
        <h1>edit user</h1>
        <?php $mensagem?>
        <form action="" method="post">
            <div class="input-group">
                <label for="nome">nome</label>
                <input type="text" name="nome" value="<?=$usuario['nome']?>" required>
            </div>
            <div class="input-group">
                <label for="email">email</label>
                <input type="email" name="email" value="<?=$usuario['email']?>" required>
            </div>
            <div class="imput-group">
                <label for="senha">senha new (opc)</label>
                <input type="password" name="senha" placeholder="branco not alter table in your password">
            </div>
            <div class="input-group">
                <label for="tipo">tipo</label>
                <select name="tipo" id="">
                <option value="admin"><?=$usuario['tipo']=='admin'?'selected':''?>admin
            </option>
                <option value="aluno"><?=$usuario['tipo']=='aluno'?'selected':''?>aluno
            </option>
                </select>
                <button type="submit" class="btn">slv seu pregresso</button>
                <a href="listar.php" class="btn-voltar">voltar</a>
            </div>
        </form>
    </div>
</body>
</html>