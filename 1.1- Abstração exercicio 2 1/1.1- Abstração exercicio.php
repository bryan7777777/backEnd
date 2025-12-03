<?php

// =============================
// MODELO (CLASSE)
// =============================
// Criamos a classe PersonagemQuadrinho, que funciona como um "molde" para criar personagens
class PersonagemQuadrinho
{

    // =============================
    // ATRIBUTOS (características do personagem)
    // =============================
    public $forcaBruta;      // Representa o nível de força física do personagem
    public $agilidade;       // Representa a velocidade e reflexos
    public $inteligencia;    // Representa o nível intelectual
    public $nome;            // Nome do personagem

    // =============================
    // MÉTODOS (ações / comportamentos)
    // =============================

    // Método responsável por exibir os atributos do personagem
    // Ele retorna uma string com todos os valores formatados
    public function exibirAtributos()
    {
        return
            "Nome: $this->nome <br>
                    Força: $this->forcaBruta <br>
                    Agilidade: $this->agilidade <br>
                    Inteligência: $this->inteligencia <hr>";
    }

    // Método que altera todos os atributos do personagem de uma vez só
    // Os parâmetros recebidos substituem os atributos do objeto
    public function alteraAtributos($nome, $forca, $agilidade, $inteligencia)
    {
        $this->nome = $nome;                   // Define o nome
        $this->forcaBruta = $forca;            // Define a força
        $this->agilidade = $agilidade;         // Define a agilidade
        $this->inteligencia = $inteligencia;   // Define a inteligência
    }
}

// =============================
// CRIAÇÃO DOS OBJETOS (INSTÂNCIAS)
// =============================
// Aqui estamos criando três personagens diferentes usando a mesma classe
$spiderman = new PersonagemQuadrinho;   // Objeto 1
$superman   = new PersonagemQuadrinho;  // Objeto 2
$batman     = new PersonagemQuadrinho;  // Objeto 3

// =============================
// DEFININDO OS ATRIBUTOS DE CADA PERSONAGEM
// =============================
$spiderman->alteraAtributos('Homem Aranha', 75, 80, 80);
$batman->alteraAtributos('Batman',        65, 70, 100);
$superman->alteraAtributos('Superman',     100, 90, 75);

// =============================
// EXIBINDO OS DADOS DE CADA PERSONAGEM
// =============================
echo $spiderman->exibirAtributos();
echo $batman->exibirAtributos();
echo $superman->exibirAtributos();
