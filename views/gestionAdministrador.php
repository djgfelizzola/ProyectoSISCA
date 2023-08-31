<?php
include("./componentes/navegacion.php");
if(isset($_SESSION["usuario"])){
    $documento    = json_decode($_SESSION["usuario"])->documento;
    $Nombre   = json_decode($_SESSION["usuario"])->nombre;
    $Apellido = json_decode($_SESSION["usuario"])->apellido;
    $correo = json_decode($_SESSION["usuario"])->correo;
    $telefono = json_decode($_SESSION["usuario"])->telefono;
    $rol = json_decode($_SESSION["usuario"])->rol;

    if($rol != 3){
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


        
 
        <div id="contentWrapper">
            <section class="form_wrap">

            <section class="cantact_info">
    <section class="info_title">
        <span class="fa fa-user-circle"></span>
        <h2 >INFORMACIÓN DEL ADMINISTRADOR</h2>
    </section>
    <section class="info_items">
    <center>

        <p><span class="fa fa-envelope"></span>Documento : <?php echo $documento?></p>
        <p><span class="fa fa-mobile"></span>Nombres : <?php echo $Nombre ." ". $Apellido?></p>
        <p><span class="fa fa-mobile"></span>Correo : <?php echo $correo?></p>
        <p><span class="fa fa-mobile"></span>Teléfono : <?php echo $telefono?></p>
        </center>

    </section>

</section>

<form action="" class="form_contact">
    <div class="tituloCalificaciones">
    <h1 id="TituloAdmin">¡BIENVENIDO ADMINISTRADOR!</h1>
    </div>
   <center>
    <div class="user_info" >
        <br><br><br><br><br>
    <a  href="RegistroEstudiantes.php" class="button3" style="vertical-align:middle" ><span>Registro Estudiantes</span></a>
    <a href="RegistroProfesor.php" class="button3" style="vertical-align:middle"><span>Registro Docentes </span></a>
    </div>
    </center> 
</form>

</section>


        </div><!--End of Content Wrapper-->
   <?php 
    include("./componentes/footer.php");
   ?>

  