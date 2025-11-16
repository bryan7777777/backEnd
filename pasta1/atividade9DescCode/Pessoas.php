<?php
// Classe abstrata base para Aluno e Professor
abstract class Pessoa{

    // Atributos protegidos acessíveis pelas classes filhas
    protected string $nome;
    protected int $idade;

    // Construtor que define nome e idade
    public function __construct(string $nome, int $idade) {
        $this->nome=$nome;
        $this->idade=$idade;
    }

    // Retorna o nome da pessoa
    public function getNome(): string{
        return $this->nome;
    }

    // Retorna a idade da pessoa
    public function getIdade(): int{
        return $this->idade;
    }

    // Método abstrato para obrigar classes filhas a implementarem uma descrição
    abstract public function getDescricao():string;
}
?>
