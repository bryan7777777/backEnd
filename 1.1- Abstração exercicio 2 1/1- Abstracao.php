<?php

// Criamos uma classe chamada Funcionario, que será o "molde" para criar objetos (funcionários)
class Funcionario
{

    // Atributos da classe (características dos funcionários)
    public $nome = null;        // Armazena o nome do funcionário
    public $telefone = null;    // Armazena o telefone
    public $numFilhos = null;   // Armazena o número de filhos

    // Método que retorna um resumo dos dados do funcionário
    // $this->atributo significa: "use o valor deste objeto"
    function resumirCadFunc()
    {
        return "$this->nome possui $this->numFilhos filho(s)";
    }

    // Método para alterar o número de filhos do funcionário
    function modificarNumFilhos($numFilhos)
    {
        // Atribui ao atributo interno o valor recebido como parâmetro
        $this->numFilhos = $numFilhos;
    }

    // Método para alterar o nome do funcionário
    function modificaNome($nome)
    {
        $this->nome = $nome;
    }
}

// Criando (instanciando) um objeto da classe Funcionario
$func1 = new Funcionario;

// Exibindo um resumo ANTES de definir nome e número de filhos
// Como ainda não definimos nada, aparecerá vazio
echo $func1->resumirCadFunc();
echo "<br/>";

// Definindo os atributos do primeiro funcionário
$func1->modificaNome("Rafael");      // Define o nome
$func1->modificarNumFilhos(3);       // Define o número de filhos

// Agora exibimos o resumo já com os dados preenchidos
echo $func1->resumirCadFunc();

echo "<hr>";

// Criando um segundo funcionário
$func2 = new Funcionario;

// Preenchendo os dados dele
$func2->modificaNome("Marcos");
$func2->modificarNumFilhos(0);

// Exibindo o resumo do segundo funcionário
echo $func2->resumirCadFunc();
