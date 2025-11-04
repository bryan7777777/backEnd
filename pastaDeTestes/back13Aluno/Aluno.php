<?php 
class Aluno {
    private string $nome;
    private string $cidade;
    private string $bairro;
    private string $curso;

    public function __construct(string $nome, string $cidade, string $bairro, string $curso){
        $this->nome=$nome;
        $this->cidade=$cidade;
        $this->bairro=$bairro;
        $this->curso=$curso;
    }
    public function exibir(){
        echo "<h2>info aluno</h2>";
        echo "<strong>nome:</strong>".htmlspecialchars($this->nome)."<br>";
        echo "<strong>cit:</strong>".htmlspecialchars($this->cidade)."<br>";
        echo "<strong>barro:</strong>".htmlspecialchars($this->bairro)."<br>";
        echo "<strong>cursi:</strong>".htmlspecialchars($this->curso)."<br>";
    }
}
?>