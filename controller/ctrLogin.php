<?php
require("../modelo/Usuario.php");

if(isset($_POST["btnIniciasSesion"])){
$documento = $_POST["txtDocumento"];    
$model = new Usuario();
$resultado = $model->buscarUsuario($documento);
if($resultado){
$clave = $_POST["txtClave"];
//Programacion de verificacion de clave
$resultado2 = $model->ConfirmarClave($documento,$clave);
if($resultado2){
//Entra y se crea la sesion
$rol = $resultado2[0]->rol;

if($rol ==1){ // Si es profesor
$ConsultaPersonalizada = $model->BuscarProfesor($documento);
$InfoSesion = Array(
    "documento" => $ConsultaPersonalizada[0]->documento,
    "rol"       =>1,
    "nombre"    => $ConsultaPersonalizada[0]->nombre,
    "apellido"  => $ConsultaPersonalizada[0]->apellido,
    "correo"    => $ConsultaPersonalizada[0]->email,
    "telefono"  => $ConsultaPersonalizada[0]->telefono,
    "profesion" => $ConsultaPersonalizada[0]->profesion
);
}
if($rol ==2){ // Si es estudiante
    $ConsultaPersonalizada = $model->BuscarEstudiante($documento);
    $InfoSesion = Array(
        "documento" => $ConsultaPersonalizada[0]->documento,
        "rol"       =>2,
        "nombre"    => $ConsultaPersonalizada[0]->nombre,
        "apellido"  => $ConsultaPersonalizada[0]->apellido,
        "correo"    => $ConsultaPersonalizada[0]->email,
        "telefono"  => $ConsultaPersonalizada[0]->telefono,
        "grupo"     => $ConsultaPersonalizada[0]->grupo
    );
    }

if($rol == 3){ // SI ES ADMIN
    $ConsultaPersonalizada = $model->BuscarAdmin($documento);
    $InfoSesion = Array(
        "documento" => $ConsultaPersonalizada[0]->documento,
        "rol"       =>3,
        "nombre"    => $ConsultaPersonalizada[0]->nombre,
        "apellido"  => $ConsultaPersonalizada[0]->apellido,
        "correo"    => $ConsultaPersonalizada[0]->email,
        "telefono"  => $ConsultaPersonalizada[0]->telefono
    );
}    

    $_SESSION["usuario"] = json_encode($InfoSesion);



}else{
$Mensaje = "Clave Incorrecta";
}
}


}



?>