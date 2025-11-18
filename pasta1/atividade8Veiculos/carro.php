<?php
require_once 'Veiculo.php';

class Carro extends Veiculo {
    private $portas;

    public function __construct($marca, $modelo, $precoDiaria, $portas, $disponivel = true) {
        parent::__construct($marca, $modelo, $precoDiaria, $disponivel);
        $this->portas = $portas;
    }

    public function calcularCusto($dias) {
        $total = $this->precoDiaria * $dias;
        return $total + ($total * 0.10);
    }
}
