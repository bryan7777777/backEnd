<?php
$aluno1 = trim($_GET["aluno1"]);
$aluno2 = trim($_GET["aluno2"]);
$aluno3 = trim($_GET["aluno3"]);
$result = "";

$prof = ["Augustinho", "Beiçola", "Marilene"];

if ($aluno1 == null || $aluno2 == null || $aluno3 == null || $prof == null) {
    echo"Valores invalidos";
} else if (strlen($aluno1)<2 || strlen($aluno2)<2 || strlen($aluno3)<2) {
    echo"Precisa ter no minimo 2 caracteres";
    } else {
    $alunos = [$aluno1, $aluno2, $aluno3];

    // for para poder repetir os alunos, se ouvese por ex 50 ele iria ajudar nisso ao inves de ter que por um por um por ex:$result = "<li>".$alunos[0]."</li>"."<li>".$alunos[1]."</li>"."<li>".$alunos[2]."</li>";

    // o $i funciona como o numero, no for no final ele sempre se soma a 1, então se comecar por 0, ele vai de 1, 2, e 3, fazendo p papel dp numero dentro do [], ao inves de fazer [0] [1] [2], o [$i] ja faz isso por vc

    // count($alunos), esse comando count ele conta todos os itens DENTRO do arrey, por ex: tem 57 nomes, ele conta q tem 57 itens, usando o codigo: $i < count($alunos), estamos dizendo para ele "conte quantos itens tem nesse arrey, e repita isso de acordo com quantos itens tem dentro", assim permitindo que ele add os 57 nomes de forma automatica ao inves de ter q por: $i < 57
    for ($i=0; $i < count($alunos) ; $i++) { 
        $result = $result."<li>".$alunos[$i]."</li>";
    }

    for ($i=0; $i < count($prof) ; $i++) { 
        $result2 = $result2."<li>".$prof[$i]."</li>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>
<body>
    <h1>Lista aluno</h1>
    <ul>
        <?=$result?>
    </ul>
    <h1>Lista prof</h1>
    <ul>
        <?=$result2?>
    </ul>
</body>
</html>