<?php 
class Bebida{
    private $conn;
    private $tabela ="bebidas";

    
    public $idBebida;
    public $nome;
    public $acoolica;
    public $valor;

    public function __construct($db)
    {
        $this->conn=$db;
    }

    function read() {
        // Query SQL para selecionar todos os campos da tabela de pizzas
        $query = "SELECT * FROM " . $this->tabela . " ORDER BY valor";
 
        // Prepara a query
        $stmt = $this->conn->prepare($query);
 
        // Executa a query
        $stmt->execute();
 
        return $stmt;
    }
}
