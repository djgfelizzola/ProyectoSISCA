<?php
    require('../modelo/grupo.php');
  
    $Grupo = new Grupo();

    $grupos = $Grupo->listargrupos();
/*
    $gruposProfesor=$Grupo->listarGruposProfesor($documento);*/
?>