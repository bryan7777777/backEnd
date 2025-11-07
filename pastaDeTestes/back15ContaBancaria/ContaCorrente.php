<?php
include 'ContaBancaria.php';
class ContaCorrente extends ContaBancaria{
private$limite;
public function __construct($limite=500){
    parent::__construct();
    $this->limite-isset($_SESSION['limite'])?$_SESSION['limite']:$limite;
}
public function getLimite(){
    return$this->limite;
}
}
?>