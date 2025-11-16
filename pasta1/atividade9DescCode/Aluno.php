<?php
// Importa a classe base Pessoa
require_once 'Pessoa.php';

class Aluno extends Pessoa{ // Classe Aluno herda de Pessoa
    
    // Atributos específicos do aluno
    private string $curso;
    private float $nota;

    // Construtor que recebe nome, idade, curso e nota
    public function __construct(string $nome, int $idade, string $curso, float $nota){
        // Chama o construtor da classe Pessoa
        parent::__construct($nome,$idade);

        // Define os atributos do aluno
        $this->curso=$curso;
        $this->nota=$nota;
    }

    // Retorna descrição completa do aluno usando nota e status
    public function getDescricao(): string{
        // Operador ternário determina se está aprovado ou reprovado
        $status= $this->nota>=6?"aprovado":"reprovado";

        // Retorna frase descritiva
        return "aluno do curso de {$this->curso} - Nota: {$this->nota} ({$status})";
    }

    // Retorna o tipo do objeto (usado no index)
    public function getTipo(): string{
        return "Aluno";
    }
}
?>
