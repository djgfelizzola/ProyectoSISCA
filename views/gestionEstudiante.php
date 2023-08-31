<?php
include("./componentes/navegacion.php");
require ("../controller/ctrPeriodo.php");


if(isset($_SESSION["usuario"]))
{
    $rol       =  json_decode($_SESSION["usuario"])->rol;
    $documento =  json_decode($_SESSION["usuario"])->documento;
    $nombres   = json_decode($_SESSION["usuario"])->nombre . " " . json_decode($_SESSION["usuario"])->apellido;
    $correo    = json_decode($_SESSION["usuario"])->correo;
    $telefono  = json_decode($_SESSION["usuario"])->telefono;
    $grupo     = json_decode($_SESSION["usuario"])->grupo;
    if($rol!=2){
        ?>
        <script>
         alert('¡Acceso denegado! No cuenta con permisos');
        location.href="index.php"
        </script>

        <?php
    }


}else{
    ?>
    <script>
     alert('¡Acceso denegado! No cuenta con permisos');
    location.href="index.php"
    </script>

    <?php

}

?>
      

        <div><p><span id="response"></span></p></div>
 
        <div id="contentWrapper">
            <section class="form_wrap">

            <section class="cantact_info">
    <section class="info_title">
        <span class="fa fa-user-circle"></span>
        <h2>INFORMACIÓN DEL ESTUDIANTE</h2>
    </section>
    <center>
  

    <section align="center" class="info_items">
        <?php  
            if(isset($_SESSION["usuario"])){
                echo '
                <p><span class="fa fa-envelope"></span>Documento :'.$documento.'</p>
                <p><span class="fa fa-mobile"></span>Nombres : '.$nombres.' </p>
                <p><span class="fa fa-mobile"></span>Correo : '.$correo.' </p>
                <p><span class="fa fa-mobile"></span>Teléfono : '.$telefono.' </p>
                <p><span class="fa fa-mobile"></span>Grupo : '.$grupo.' </p>
                ';
                }
            ?>
    </section>
    </center>

</section>

<form action="" class="form_contact">
    <div class="tituloCalificaciones">
    <h2 >Calificaciones</h2>
    </div>

    <select class="classic" id="periodo">
    <?php
    if(isset($resultado)){
        foreach ($resultado as $clave => $value) {
            echo " <option value='".$value["Codigo"]."' >"."Periodo ".$value["Periodo"]."</option>";
        }
    }
    ?>
    </select>
<?php include("./componentes/botonGenerarPdfEstu.php");  ?>
    <div class="user_info">

<table class="tablaCalificaciones">
            <thead>
                <tr>
                    <th><h1>Materia</h1></th>
                    <th><h1>Nota 1</h1></th>
                    <th><h1>Nota 2</h1></th>
                    <th><h1>Nota 3</h1></th>
                    <th><h1>Nota 4</h1></th>
                    <th><h1>Nota 5</h1></th>
                    <th><h1>Final</h1></th>
                 
                   
                </tr>
            </thead>
            <tbody id="notas">
                
               
        
            </tbody>
        </table>
    </div>
</form>

</section>


        </div><!--End of Content Wrapper-->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="../js/ctrVerNotas.js"></script>
   <?php 
    include("./componentes/footer.php");
    


   ?>



  