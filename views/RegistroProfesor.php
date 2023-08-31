<!-- INCLUYE  EL ENCABEZADO DE LA PAGINA -->
<?php
include("./componentes/navegacion.php");
require("../controller/ctrProfesor.php");
if(isset($_SESSION["usuario"])){

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
<section class="form_Docente">

<!-- FORMULARIO DE REGISTRO-->
<form role="form" id="frmregistro" enctype='multipart/form-data' autocomplete="off" method="post" >
    <center>
        <img src="../img/ImagenRegistro.png" width="250" height="250"  alt="">
    </center>


  
<fieldset class="FormularioCentral_Profesor">
    <legend id="TituloAdmin">REGISTRO PROFESOR</legend>
    <center>
    <label for="documento ">Documento:</label>
    <input type="number" id="fname" name="documento" placeholder="Ingrese documento..." value="<?php
								if (isset($documento))
									echo("$documento"); ?>"> 

    <label for="telefono ">Telefono:</label>
    <input type="number" id="fname" name="telefono" placeholder="Ingrese telefono..." value="<?php
								if (isset($telefono))
									echo("$telefono"); ?>">

    <label for="tipoDocumento">Tipo Documento:</label>
    <input type="radio" id="male" name="tipoDocumento" value="2"
    <?php 
        if (isset($tipoDocumento) && $tipoDocumento=="2"){
            echo "checked";
        }
        ?>> CC &nbsp
    <input type="radio" id="male" name="tipoDocumento" value="1"
    <?php 
        if (isset($tipoDocumento) && $tipoDocumento=="1"){
            echo "checked";
        }
        ?>> TI


    <br>
    <span  style="font-weight: bold; color: red" >
							<?php 
                                if (isset($error)){
                                        echo("$error");
                                }
							?>            	
             				</span>

</center>
    <label for="nombres">Nombres</label>
    <input type="text" id="fname" name="nombres" placeholder="Ingrese nombres..." value="<?php
								if (isset($nombres))
									echo("$nombres"); ?>">
    <br>
    <span  style="font-weight: bold; color: red" >
							<?php 
                                if (isset($error1)){
                                        echo("$error1");
                                }
							?>            	
             				</span><br>

    <label for="apellidos">Apellidos</label>
    <input type="text" id="fname" name="apellidos" placeholder="Ingrese apellidos..." value="<?php
								if (isset($apellidos))
									echo("$apellidos"); ?>">
    <br>
    <span   style="font-weight: bold; color: red"  >
							<?php 
                                if (isset($error2)){
                                        echo("$error2");
                                }
							?>            	
             				</span><br>

    <label for="direccion">Dirección</label>
    <input type="text" id="fname" name="direccion" placeholder="Ingrese Dirección..." value="<?php
								if (isset($direccion))
									echo("$direccion"); ?>">
    <br>
    <span   style="font-weight: bold; color: red"  >
							<?php 
                                if (isset($error3)){
                                        echo("$error3");
                                }
							?>            	
             				</span><br>

    <label for="profesion">Profesión</label>
    <input type="text" id="fname" name="profesion" placeholder="Ingrese Profesión..." value="<?php
								if (isset($profesion))
									echo("$profesion"); ?>">
    <br>
    <span   style="font-weight: bold; color: red"  >
							<?php 
                                if (isset($error4)){
                                        echo("$error4");
                                }
							?>            	
             				</span><br>
    
    <label for="correo">Correo:</label>
    <input type="text" id="fname" name="correo" placeholder="Ingrese Correo..." value="<?php
								if (isset($email))
									echo("$email"); ?>">
    <br>
    <span  style="font-weight: bold; color: red"  >
							<?php 
                                if (isset($error5)){
                                        echo("$error5");
                                }
							?>            	
             				</span><br>


    <label for="contraseña">Contraseña</label>
    <input type="password" id="fname" name="contraseña" placeholder="Ingrese Contraseña..." value="<?php
								if (isset($contraseña))
									echo("$contraseña"); ?>">
    <br>
    <span   style="font-weight: bold; color: red"  >
							<?php 
                                if (isset($error6)){
                                        echo("$error6");
                                }
							?>            	
             				</span><br>

    
    <label for="materia">Materia</label>
    <input type="text" id="fname" name="materia" placeholder="Ingrese Materia..." value="<?php
								if (isset($materia))
									echo("$materia"); ?>">
    <br>
    <span   style="font-weight: bold; color: red"  >
							<?php 
                                if (isset($error7)){
                                        echo("$error7");
                                }
							?>            	
             				</span><br><br>

    <label for="genero">Genero:</label>
    <input type="radio" id="male" name="genero" value="2"
    <?php 
        if (isset($genero) && $genero=="2"){
            echo "checked";
        }
        ?>> Masculino &nbsp
    <input type="radio" id="male" name="genero" value="1"
    <?php 
        if (isset($genero) && $genero=="1"){
            echo "checked";
        }
        ?>> Femenino
    <br>
    <span   style="font-weight: bold; color: red"  >
							<?php 
                                if (isset($error8)){
                                        echo("$error8");
                                }
							?>            	
             				</span> 
   
    <br>
    <label for="fechaNacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fname" name="fechaNacimiento" value="<?php
								if (isset($fechaNacimiento))
									echo("$fechaNacimiento"); ?>">
    
    <br>
    <span   style="font-weight: bold; color: red"  >
							<?php 
                                if (isset($error9)){
                                        echo("$error9");
                                }
							?>            	
             				</span>
   


    <br>
    <br>
    <button type="submit" name="frmMatricular" value="Registrar">Registrar</button>

</fieldset>

<br>
<a href="gestionAdministrador.php" class="buttonRegresar" style="vertical-align:top"><span>Regresar</span></a>

</form>


</section>
</div><!--End of Content Wrapper-->
   
<!-- INCLUYE  EL PIE DE PAGINA -->
<?php 
include("./componentes/footer.php");
?>

  