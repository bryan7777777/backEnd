<?php
class zumano{
    public $nome=null;
    public $idade=null;
    public $trampo=null;

    function __set($name, $value){
        $this->$name=$value;
    }

    function __get($name){
        return $this->$name;
    }
}

$zumano = new zumano();
$zumano->__set('nome','augustinho');
$zumano->__set('idade','44');
echo $zumano->__get('nome');

$zumano2 = new zumano();
$zumano2->__set('nome','rogerio');
$zumano2->__set('trampo', 'varegista');
echo $zumano2->__get('trampo');
?>