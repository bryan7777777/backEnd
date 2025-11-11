<?php
$host ="localhost"; //local banco
$banco = "sistema_clientes"; //nome banco
$usuario = "root"; //caba login
$senha=""; //senha do user serv

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8",$usuario,$senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"CONEXÃO DEU CERTO E AGR VC ESTA LIVRE PARA FAZER OQ QUISER DA SUA VIDA E ALCANÇAR SEU SONHOS Q VC NUNCA TEVE";
} catch (PDOException $e) {
    echo"ERRO FATAL DESISTA DOS SEU SONHOS Q VC NUNCA TEVE POIS O UNIVERSO VAI COLAPSAR E MORRER POR CULPA SUA:" . $e->getMessage();
}
?>