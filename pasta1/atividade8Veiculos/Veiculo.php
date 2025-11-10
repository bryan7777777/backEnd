<?php
session_start();
class Veiculo{
    private $saldo;
    public function __construct(){
        $this->saldo=isset($_SESSION['saldo'])?$_SESSION['saldo']:0;
    }
    public function setSaldo($saldo){
        $this->saldo=$saldo;
        $_SESSION['saldo']=$this->saldo;
    }
    public function getSaldo(){
        return $this->saldo;
    }
    public function depositar($quantia){
        if ($quantia>0) {
                $saldoNovo=$this->saldo+$quantia;
                $this->setSaldo($saldoNovo);
        }
    }
    public function sacar($quantia){
        if ($quantia>0&&$quantia<=$this->getSaldo()) {
            $this->setSaldo($this->getSaldo()-$quantia);
        }else{
        echo"VC N TEM DINHEIRO, APOS 24HR SUA ALMA SERA LEVADA PELO BANCO PARA COBRIR SEUS GASTOS";
        }
}
}
?>