<?php
// Importa as classes necessárias
require_once 'Aluno.php';
require_once 'Profersor.php';

// Cria um array contendo objetos de Aluno e Professor
$pessoas=[
    new Aluno("jao do jao",17,"informatica",8.5),       // Aluno 1
    new Aluno("jao filho de jao",16,"adiministrador",6.8), // Aluno 2
    new Professor("jao da silvana jaos",42,"matemagica",4200.00), // Professor 1
    new Professor("jao cunha de jao",35,"prtugues de portugal",3900.00) // Professor 2
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de tortura 2025</title>
    <!-- Importa o arquivo de estilo -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>sis escola</h1>

        <!-- Tabela para exibir os dados das pessoas -->
        <table>
            <thead>
                <tr>
                    <th>tipo</th>      <!-- Tipo: aluno ou professor -->
                    <th>nome</th>      <!-- Nome da pessoa -->
                    <th>idade</th>     <!-- Idade -->
                    <th>descricao</th> <!-- Info extra dependendo da classe -->
                </tr>
            </thead>
            <tbody>

                <!-- Loop que percorre todas as pessoas e exibe na tabela -->
                <?php foreach ($pessoas as $p): ?>
                <tr>
                    <!-- Chamadas de métodos para exibir informações -->
                    <td><?=$p-getTipo()?>></td>      <!-- Retorna tipo -->
                    <td><?=$p-getNome()?>></td>      <!-- Retorna nome -->
                    <td><?=$p-getIdade()?>></td>     <!-- Retorna idade -->
                    <td><?=$p-getDescricao()?>></td> <!-- Retorna descrição -->
                </tr>
                <?php endforeach;?>

            </tbody>
        </table>

        <!-- Rodapé -->
        <footer>
            <p>desenvolvedor em php poo - exemplo de tortura do pior tipo possivel(heranca e polimorfismo)</p>
        </footer>
    </div>
</body>
</html>
