<?php
// Importa a classe Pessoa, que é a classe mãe
require_once 'Pessoa.php';

class Professor extends Pessoa{ // Classe Professor herda de Pessoa
    
    // Atributos privados específicos do professor
    private $diciplina;
    private $salario;

    // Construtor que recebe nome, idade, email, disciplina e salário
    public function __contrusct($nome, $idade, $email,$diciplina,$salario){
        // Chama o construtor da classe mãe (Pessoa)
        parent::__contrusct($nome, $idade, $email);

        // Define os atributos próprios do Professor
        $this->diciplina=$diciplina;
        $this->salario=$salario;
    }

    // Retorna o nome da disciplina
    public function getDiciplina(){
        return $this->diciplina;
    }

    // Altera a disciplina
    public function setDiciplina($diciplina){
        $this->diciplina=$diciplina;
    }

    // Retorna o salário
    public function getSalario(){
        return $this->salario;
    }

    // Altera o salário
    public function setSalario($salario){
        $this->salario=$salario;
    }

    // Método que retorna uma frase apresentando o professor
    public function apresentar(){
        return "Professor: {$this->nome}, idade: {$this->idade}, email {$this->email}," .
               "diciplina: {$this->diciplina}, salario: r$ " . number_format($this->salario,2,',','.');
    }

    // Método que simula o professor dando aula
    public function darAula(){
        return "o fesor {$this->nome} esta ministrando aula de {$this->diciplina}.";
    }
}
?>
