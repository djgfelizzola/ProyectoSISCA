<?php
include("./componentes/navegacion.php");
require("../controller/ctrLogin.php");
    

    if(!isset($_SESSION["usuario"])){

?>



        
 
        <div id="contentWrapper">
            <section class="form_wrap">

<section class="cantact_info">
    <section class="info_title">
        <span class="fa fa-user-circle"></span>
        <h2>INICIO<br>DE SESIÓN</h2>
    </section>
</section>

<form  name="LoginForm" method="POST" id="frmLogin" class="form_contact">
   <br><br><br><br><br><br>
  
   <div id="Mensaje"></div>
   <?php 
   if(isset($Mensaje)){
    echo '  <small style="color:red;" >Clave incorrecta</small>';
   }
   ?>
    <div class="user_info">
        <label for="names">Documento *</label>
        <input type="number" autocomplete="off" name="txtDocumento" id="txtDocumento" required style="border-radius: 20px / 10px;" >

        <label for="phone">Clave *</label>
        <input type="password" name="txtClave" id="txtClave" style="border-radius: 20px / 10px;">

        
        <input type="submit" class="button3" name="btnIniciasSesion" value="INICIAR SESIÓN" >
    </div>
</form>

</section>


        </div><!--End of Content Wrapper-->

    <script src="../js/ControllerLogin.js"></script>
   <?php 
    include("./componentes/footer.php");



    }else{
       ?>
       <script>
           location.href="index.php"
       </script>
       <?php
    }
   ?>

   