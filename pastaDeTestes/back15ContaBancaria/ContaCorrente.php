<?php
include 'ContaBancaria.php';
class ContaCorrente extends ContaBancaria{
private$limite;
public function __construct($limite=500){
    parent::__construct();
    $this->limite-isset($_SESSION['limite'])?$_SESSION['limite']:$limite;
}
public function getLimite(){
    return $this->limite;
}
public function setLimite($limite){
    $this ->limite = $limite;
    $_SESSION['limite'] = $this->limite;
}
//Polimorfismo = Sobrescrever a função sacar
public function sacar($quantia){
    //calcula o saldo junto com o limite
    $saldoDisponivel = $this->getSaldo() + $this->limite;
    if($quantia > 0 && $quantia <= $saldoDisponivel ){
        if($quantia >$this ->getSaldo()){
            $valorUsadoDoLimite = $quantia - $this->getSaldo();
            $this -> setLimite($this ->limite - $valorUsadoDoLimite);
            $this ->setSaldo(0);
            echo"Saque de R$: $quantia reais realizado utilizando R$
            $valorUsadoDoLimite do limite.<br>";
            echo"Limite restante: R$: ".number_format($this->limite,2,',',
            '.')."<br>";
        }else{
        //se a quantia está dentro do saldo, subtraia do saldo
        $this ->setSaldo($this->getSaldo() - $quantia);
        echo"Saque de R$ $quantia reais realizado.<br>";
    }
}
else{
    //erro se o saldo e o limite forem insuficiente para saque
    echo"Saldo e limite induficiente para o saque.<br>";
}
}
}
?>