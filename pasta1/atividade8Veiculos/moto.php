<?php
require_once 'Veiculo.php';

class Moto extends Veiculo {
    private $cilindradas;

    public function __construct($marca, $modelo, $precoDiaria, $cilindradas, $disponivel = true) {
        parent::__construct($marca, $modelo, $precoDiaria, $disponivel);
        $this->cilindradas = $cilindradas;
    }

    public function calcularCusto($dias) {
        $total = $this->precoDiaria * $dias;
        return $total + ($total * 0.05); // taxa de 5%
    }
}