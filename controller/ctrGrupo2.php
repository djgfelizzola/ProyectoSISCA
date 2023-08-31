<?php
  require('../modelo/grupo2.php');
  if(isset($_SESSION["usuario"])){
      $documento    = json_decode($_SESSION["usuario"])->documento;
  }
  $Grupo2 = new Grupo2();
  $gruposProfesor=$Grupo2->listarGruposProfesor($documento);
?>