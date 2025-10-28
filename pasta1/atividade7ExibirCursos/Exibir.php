<?php
class Exibir{
    public $nome;
    public $cidade;
    public $bairro;
    public $curso;
    public function __construct($nome,$cidade,$bairro,$curso){
        $this->nome=$nome;
        $this->cidade=$cidade;
        $this->bairro=$bairro;
        $this->curso=$curso;
    }

    public function exibir($nome,$cidade,$bairro,$curso){
        echo "nome do elemento:".$this->nome;
        echo "nome da moradia do elemento:".$this->nome;
        echo "nome do bairro do elemento:".$this->nome;
        echo "nome do cursinho de onipotencia do elemento:".$this->nome;
    }
}
?>