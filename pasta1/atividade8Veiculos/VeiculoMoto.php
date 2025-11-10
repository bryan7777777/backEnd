<?php
include 'Veiculo.php';
class VeiculoMoto extends Veiculo{
    private$taxaDeJuros;
    public function __construct($taxaDeJuros=0.0005){
        parent::__construct();
        $this->taxaDeJuros=$taxaDeJuros;
    }
    public function aplicarJuros(){
        $juros=round($this->getSaldo()*$this->taxaDeJuros,2);
        $this->depositar($juros);
        echo"roubo de $juros reais da sua conta.<br>";
    }
}
?>