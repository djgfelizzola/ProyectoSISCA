<?php
include("./componentes/navegacion.php");
//require("../controller/ctrEnvioCorreo.php");
?>


        
 
        <div id="contentWrapper">
            <section class="form_wrap">

<section class="cantact_info">
    <section class="info_title">
        <span class="fa fa-user-circle"></span>
        <h2>INFORMACIÓN<br>DE CONTACTO</h2>
    </section>
    <section class="info_items">
        <p><span class="fa fa-envelope"></span> sisca@gmail.com</p>
        <p><span class="fa fa-mobile"></span> (+57) 1234567890</p>
    </section>
</section>

<form action="../controller/ctrEnvioCorreo.php" method="post" class="form_contact">
    <h2>Envia un mensaje</h2>
    <div class="user_info">
        <label for="names">Nombres *</label>
        <input type="text" id="names"  name="name" required style="border-radius: 20px / 10px;" >

        <label for="phone">Telefono / Celular</label>
        <input type="text" id="phone"  name="phone" style="border-radius: 20px / 10px;">

        <label for="email">Correo electronico *</label>
        <input type="text" id="email" name="email"  style="border-radius: 20px / 10px;">

        <label for="mensaje">Mensaje *</label>
        <textarea style="border-radius: 20px / 10px;" id="mensaje" name="message" ></textarea >

        <input type="submit" class="btn btn-success" value="Enviar Mensaje" style="background-color:#4091EC; color: white;border:gainsboro 8px outset;border-radius: 20px / 10px;" >
    </div>
</form>


</section>


        </div><!--End of Content Wrapper-->
   <?php 
    include("./componentes/footer.php");
   ?>