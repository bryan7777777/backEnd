<!-- 3. Crie um array associativo com informações de 3 alunos (nome, idade e notaFinal). Depois:
 
a-Adicione 10 alunos e exiba as informações de cada aluno da seguinte forma:
   nome: Juca
   idade: 27 anos
   notaFinal: 8.5
b-Calcule e exiba a média das notas de todos os alunos. -->
<?php
$tarefa = filter_input(INPUT_GET, "tarefa");
$alunos = [
    [
        "nome" => "junin",
        "idade" => "0",
        "nota" => "0"
    ],
    [
        "nome" => "carlos",
        "idade" => "77",
        "nota" => "5"
    ],
    [
        "nome" => "puma",
        "idade" => "100",
        "nota" => "2"
    ]
];
$result = "";

switch ($tarefa) {
    case $tarefa == 1:
        array_push($alunos, 
            [
                "nome" => "junin2",
                "idade" => "0",
                "nota" => "0"
            ],
            [
                "nome" => "carlos2",
                "idade" => "77",
                "nota" => "5"
            ],
            [
                "nome" => "puma2",
                "idade" => "100",
                "nota" => "2"
            ],
            [
                "nome" => "junin3",
                "idade" => "0",
                "nota" => "0"
            ],
            [
                "nome" => "carlos3",
                "idade" => "77",
                "nota" => "5"
            ],
            [
                "nome" => "puma3",
                "idade" => "100",
                "nota" => "2"
            ],
            [
                "nome" => "junin4",
                "idade" => "0",
                "nota" => "0"
            ],
            [
                "nome" => "carlos4",
                "idade" => "77",
                "nota" => "5"
            ],
            [
                "nome" => "puma4",
                "idade" => "100",
                "nota" => "2"
            ],
            [
                "nome" => "puma54",
                "idade" => "100",
                "nota" => "2"
            ]
        );

        for ($i=0; $i < count($alunos) ; $i++) { 
            $result .=  "nome: ".$alunos[$i]["nome"]."<br>"."idade: ".$alunos[$i]["idade"]."<br>"."qtd: ".$alunos[$i]["nota"]."<br>"."<br>";
        }

        break;
    case $tarefa == 2:
        array_push($alunos, 
            [
                "nome" => "junin2",
                "idade" => "0",
                "nota" => "0"
            ],
            [
                "nome" => "carlos2",
                "idade" => "77",
                "nota" => "5"
            ],
            [
                "nome" => "puma2",
                "idade" => "100",
                "nota" => "2"
            ],
            [
                "nome" => "junin3",
                "idade" => "0",
                "nota" => "0"
            ],
            [
                "nome" => "carlos3",
                "idade" => "77",
                "nota" => "5"
            ],
            [
                "nome" => "puma3",
                "idade" => "100",
                "nota" => "2"
            ],
            [
                "nome" => "junin4",
                "idade" => "0",
                "nota" => "0"
            ],
            [
                "nome" => "carlos4",
                "idade" => "77",
                "nota" => "5"
            ],
            [
                "nome" => "puma4",
                "idade" => "100",
                "nota" => "2"
            ],
            [
                "nome" => "puma54",
                "idade" => "100",
                "nota" => "2"
            ]
        );

        $result = $alunos[0]["nota"]+
                $alunos[1]["nota"]+
                $alunos[2]["nota"]+
                $alunos[3]["nota"]+
                $alunos[4]["nota"]+
                $alunos[5]["nota"]+
                $alunos[6]["nota"]+
                $alunos[7]["nota"]+
                $alunos[8]["nota"]+
                $alunos[9]["nota"]+
                $alunos[10]["nota"]+
                $alunos[11]["nota"]+
                $alunos[12]["nota"];

        break;
    default:
        $result = "ERRO";
        break;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/main.css">
    <title>Document</title>
</head>

<body>
    <h1>RESULTADO</h1>
    <div id="result"><?= $result ?></div>
</body>

</html>