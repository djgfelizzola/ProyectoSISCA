<?php
require ("../modelo/nota.php");
session_start();
if(isset($_SESSION["usuario"])){
$documentoE = json_decode($_SESSION["usuario"])->documento;
}
$periodo = $_POST["periodo"];
$modelo2=new Nota();
$resultado2 = $modelo2->guardarNota($periodo,$documentoE);
echo json_encode($resultado2);
?>