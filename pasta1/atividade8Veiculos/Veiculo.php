<?php
abstract class Veiculo {
    protected $marca;
    protected $modelo;
    public $precoDiaria;
    protected $disponivel;

    public function __construct($marca, $modelo, $precoDiaria, $disponivel = true) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->precoDiaria = $precoDiaria;
        $this->disponivel = $disponivel;
    }

    public function getDescricao() {
        return $this->marca . " " . $this->modelo;
    }

    public function alugar() {
        $this->disponivel = false;
    }

    public function devolver() {
        $this->disponivel = true;
    }

    public function isDisponivel() {
        return $this->disponivel;
    }

    abstract public function calcularCusto($dias);
}
