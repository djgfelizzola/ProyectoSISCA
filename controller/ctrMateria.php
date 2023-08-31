<?php
    
    require('../modelo/Materia.php');
    if(isset($_SESSION["usuario"])){
        $documento    = json_decode($_SESSION["usuario"])->documento;
    }
    $Materia = new Materia();
    $materias = $Materia->listarMateria($documento);
?>