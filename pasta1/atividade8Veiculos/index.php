<?php
require_once 'Carro.php';
require_once 'Moto.php';
require_once 'Cliente.php';

$cliente = new Cliente("João da Silva", "123.456.789-00");

$veiculos = [
    new Carro("Toyota", "Corolla", 150, 4),
    new Carro("Honda", "Civic", 160, 4, false),
    new Moto("Honda", "CG 160", 80, 160),
    new Moto("Yamaha", "Fazer 250", 120, 250)
];

$dias = 3; // exemplo de cálculo
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Aluguel de Carros</title>
    <link rel="stylesheet" href="./fonfis.css">
</head>
<body>

<h1>Locadora de Veículos</h1>
<p><strong>Cliente:</strong> <?= $cliente->nome ?> (<?= $cliente->cpf ?>)</p>

<table>
    <tr>
        <th>Tipo</th>
        <th>Descrição</th>
        <th>Preço da Diária</th>
        <th>Status</th>
        <th>Custo para <?= $dias ?> dias</th>
    </tr>

    <?php foreach ($veiculos as $v): ?>
        <tr>
            <td><?= ($v instanceof Carro) ? "Carro" : "Moto" ?></td>
            <td><?= $v->getDescricao() ?></td>
            <td>R$ <?= number_format($v->precoDiaria, 2, ',', '.') ?></td>
            <td><?= $v->isDisponivel() ? "Disponível" : "Alugado" ?></td>
            <td>R$ <?= number_format($v->calcularCusto($dias), 2, ',', '.') ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
 