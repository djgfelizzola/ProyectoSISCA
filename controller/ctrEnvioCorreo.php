<?php
if(isset($_POST["name"],$_POST["phone"],$_POST["email"],$_POST["message"]) and  $_POST["message"]=!"" and $_POST["phone"]!="" and $_POST["email"]!="" and $_POST["name"]!=""){
   $nombres=$_POST["name"];
   $telefono=$_POST["phone"];
   $correo=$_POST["email"];
   $mensaje=$_POST["message"];
   $destinatario="djgfelizzola@gmail.com";
   $asunto="MENSAJE DE $nombres";
   $carta="De: $nombres\n";
   $carta.="Correo: $correo\n";
   $carta.="Telefono: $telefono\n";
   $carta.="Mensaje: $mensaje\n";
      if(mail($destinatario,$asunto,$carta))
      {
         echo "<script>alert('Funcion \"mail()\" ejecutada, por favor verifique su bandeja de correo.');</script>";
      }else{
         echo "<script>alert('No se pudo enviar el mail, por favor verifique su configuracion de correo SMTP saliente.');</script>";
      }
}
else{
    echo "DEBE RELLENAR TODOS LOS CAMPOS PERRA";
}

?>