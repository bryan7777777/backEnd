<?php
abstract class Personagens{
    public $nome, $tipoClass;
    public$hp=100;
    public$atk=10;
    public$def=10;
    public function __construct($nome,$tipoClass) {
        $this->nome = $nome;
        $this->tipoClass=$tipoClass;
    }
    function __set($name, $value){$this->$name=$value;}
    function __get($name){return $this->$name;}
    public function ataqueComum(){echo "atk comum: $this->atk";}
    public function defesaComum(){echo "def comum: $this->def";}
    public function especial(){echo "esse personagem n tem nd d especial";}
}
?>