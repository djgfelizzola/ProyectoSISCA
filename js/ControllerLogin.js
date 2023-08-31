//Validacion si esta
  $("#txtDocumento").keyup( ()=>{
    var documento = $("#txtDocumento").val();
    if (documento.length!=0){
  
    $.ajax({
      url:"../controller/ctrUsuario.php",
      type:"POST",
      data:{documento,"tipoPeticion":1},
      success: function (response) {
        
         if(response==0){
          $("#Mensaje").html('<small style="color:red;">Usuario no existente</small>');
         }else{
          $("#Mensaje").html('<small style="color:green;">Usuario Existente</small>');
         }

        }
  })//FIN AJAX

}else{
    $("#Mensaje").html('');

  }

  } )