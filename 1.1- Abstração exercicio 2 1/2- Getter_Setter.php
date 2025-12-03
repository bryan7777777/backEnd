<?php
// ===============================================
// MODELO (CLASSE Funcionario)
// ===============================================
// Esta classe representa um funcionário e contém
// atributos (características) e métodos (ações).
class Funcionario
{

    // ===============================================
    // ATRIBUTOS (características do funcionário)
    // ===============================================
    public $nome = null;
    public $sobrenome = null;
    public $telefone = null;
    public $numFilhos = null;
    public $cargo = null;
    public $salario = null;
    public $musica = null;
    public $esporte = null;
    public $altura = null;
    public $peso = null;

    // ===============================================
    // MÉTODOS ESPECÍFICOS (getters e setters comuns)
    // ===============================================

    // Define o nome do funcionário
    function setNome($nome)
    {
        $this->nome = $nome;
    }

    // Retorna o nome do funcionário
    function getNome()
    {
        return $this->nome;
    }

    // Retorna um resumo simples sobre o funcionário
    function resumirCadFunc()
    {
        return "$this->nome possui $this->numFilhos filho(s)";
    }

    // Define o número de filhos
    function setNumFilhos($numFilhos)
    {
        $this->numFilhos = $numFilhos;
    }

    // Retorna o número de filhos
    function getNumFilhos()
    {
        return $this->numFilhos;
    }

    // ===============================================
    // MÉTODOS MÁGICOS (__set e __get)
    // Permitem definir e acessar QUALQUER atributo
    // dinamicamente, sem precisar criar vários métodos.
    // ===============================================

    // Define qualquer atributo dinamicamente
    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    // Retorna o valor de qualquer atributo dinamicamente
    function __get($atributo)
    {
        return $this->$atributo;
    }
}

// ===============================================
// CRIAÇÃO DO PRIMEIRO FUNCIONÁRIO (OBJETO Y)
// ===============================================
$y = new Funcionario();

// Definindo atributos usando métodos normais e mágicos
$y->setNome("Marcos");
$y->setNumFilhos(0);
$y->__set("cargo", "Professor");
$y->__set("salario", "9.999,00");

echo "Teste funcionário Y: </br>";
echo $y->resumirCadFunc() . "</br>";

// Exibindo nome e número de filhos via getters normais
echo $y->getNome() . " possui " . $y->getNumFilhos() . " filho(s)</br>";

// Exibindo cargo e salário via métodos mágicos (__get)
echo "Seu cargo é " . $y->__get("cargo") . " e recebe R$" . $y->__get("salario") . "<hr>";

// ===============================================
// CRIAÇÃO DO SEGUNDO FUNCIONÁRIO (OBJETO X)
// ===============================================
$x = new Funcionario();

echo "Teste funcionário X: </br>";

// Atribuindo valores diretamente com __set
$x->__set("nome", "Joyci");
$x->__set("telefone", "(13) 996038918");
$x->__set("numFilhos", "0");
$x->__set("cargo", "Chefe de Cozinha");
$x->__set("salario", "5.500,00");

echo "Funcionario X: </br>";
echo $x->__get("nome") . " possui " . $x->__get("numFilhos") . " filhos</br>";
echo "Telefone: " . $x->__get("telefone") . ", seu cargo é " . $x->__get("cargo") .
    " e recebe R$" . $x->__get("salario");

// ===============================================
// CRIAÇÃO DO TERCEIRO FUNCIONÁRIO (OBJETO M)
// ===============================================
$m = new Funcionario();

// Atributos variados usando __set
$m->__set("nome", "Fred");
$m->__set("sobrenome", "Mercury");
$m->__set("musica", "Rock");
$m->__set("esporte", "Volei");

echo "<hr>";
echo "Teste funcionário M: </br>";

// Exibindo os atributos com __get
echo $m->__get("nome") . " " . $m->__get("sobrenome") . " ama " .
    $m->__get("musica") . " e joga " . $m->__get("esporte");
