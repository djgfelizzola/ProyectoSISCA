<?php

require("../modelo/Usuario.php");

    $tipoPeticion = $_POST["tipoPeticion"];

    if($tipoPeticion==1){
    $documento = $_POST["documento"];
    $modelo = new Usuario();
    $resultado = $modelo->buscarUsuario($documento);
    if($resultado){
        $respuestaDoc = 1;  //Existe el usuario
    }else{
        $respuestaDoc = 0;  //No existe el usuario
    }
    
    
    echo $respuestaDoc;
    }




?>