<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Page Title</title>
    <meta name="description" content="COMPANY DESCRIPTION GOES HERE">
    <!--<link rel="stylesheet" href="main.css">-->
      
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="https://use.edgefonts.net/open-sans:n3:default.js" type="text/javascript"></script>

    <body>
        <div id="header">
       
            <div class="logo">
                <center class="centerlogo" id="centerlogo" > 
                	<img align="center" src="../img/logo.png" id="logo" alt="">

                </center>
            </div>
     
            <div id="navBar">
                <center>
                <ul>
                    <li class="navButtons"><a href="/ProyectoPhp/views/index.php">Inicio</a></li>
                <?php
                if(isset($_SESSION["usuario"])){
                    $tipoU    = json_decode($_SESSION["usuario"])->rol;
                    $Nombre   = json_decode($_SESSION["usuario"])->nombre;
                    $Apellido = json_decode($_SESSION["usuario"])->apellido;
                    echo '   <li class="navButtons"><a href="">'.$Nombre.' '.$Apellido.'</a></li>';
                    if($tipoU == 2){
                        echo '  <li class="navButtons"><a href="/ProyectoPhp/views/gestionEstudiante.php">Gestión estudiante</a></li>      ';
                    }

                    if($tipoU == 1){
                        echo '  <li class="navButtons"><a href="/proyectoPhp/views/gestionProfesor.php">Gestión docente</a></li> ';
                    }

                    if($tipoU == 3){
                        echo ' <li class="navButtons"><a href="/ProyectoPhp/views/gestionAdministrador.php">Gestión ADMINISTRADOR</a></li>  ';
                    }
                    echo '  <li class="navButtons"><a href="./CerrarSesion.php">Cerrar sesión</a></li>';
                }else{
                        echo ' <li class="navButtons"><a href="/ProyectoPhp/views/Login.php">Iniciar sesión</a></li>';
                }
                ?>
               <li class="navButtons"><a href="/ProyectoPhp/views/Contactenos.php">Contactenos</a></li>

                  
                </ul>
                </center>
            </div><!--end of navBar-->
        </div><!--end of header-->