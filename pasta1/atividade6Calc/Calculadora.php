<?php
class Calculadora{
    private $num1;
    private $num2;
    //metodo construtor
    public function __contruct($num1,$num2){
        $this->num1=$num1;
        $this->num2=$num2;
    }

    //metodor somar
    public function somar(){
        return$this->num1+$this->num2;
    }
    //metodor sub
    public function sub(){
        return$this->num1-$this->num2;
    }
    //metodor div
    public function div(){
        if ($this->num2==0) {
            return"ERRO FATAL SUA MAQUINA VAI EXPLODIR E O MUNDO VAI SER REDUZIDO A CINZAS E DESTRUIDO MOLECULA POR MOLECULA";
        }
        return$this->num1/$this->num2;
    }
    //metodor mult
    public function mult(){
        return$this->num1*$this->num2;
    }
}
?>