<?php

require('../controller/CtrGrupo.php');
include("../views/componentes/navegacion.php");


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

// require_once('../controller/CtrGrupo.php');
// include_once("../views/componentes/navegacion.php");

     
    //LA SECCION Y COOKIES POR AQUI POR FAVOR
    /*if (!isset($_SESSION)){
          //$inactividad = 60;
          //ini_set('session.gc_maxlifetime',$inactividad);
        session_start();
        if(!isset($_SESSION['usuario'])){
            header("Location: /ProyectoPhp/views/login.php");
            exit;
        }
     }*/

?>
<script type="text/javascript" src="/ProyectoPHP/js/jquery-3.5.1.min.js"></script>
<style>
    #margengroup{
        margin-right: 3px !important;
        margin-left: 3px !important;
    }
    input{
        color:  #050505;
    }
</style>

<div class="container">
    <div id="contentWrapper">
        <section class="form_Estudiante" id="form_est">
            <form id="frmMatricula" autocomplete="off" method="post" action="../controller/CrtRegistroEstudiante.php">
                <!--<center>
                    <img src="../img/ImagenRegistro.png" width="220" height="220"  alt="">
                </center>--->
                <div class="text-center">
                    <img src="../img/ImagenRegistro.png" width="150" height="150" class="rounded" alt="">
                </div>
                <fieldset class="FormularioCentral">
                <div class="text-center">
                    <legend id="TituloAdmin" class="h1">REGISTRO ESTUDIANTES</legend>
                </div>
                    <center>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="doc" class="col-form-label float-left">Documento:</label>
                                <input type="text" id="doc" name="documento" placeholder="Ingrese documento..." value="<?php if(isset($documento)){echo $documento;} ?>">
                            </div>
                            <div class="form-group col-md-5 justify-content-center align-self-center">
                                <legend class="col-form-label pt-0 d-flex justify-content-center" for="Tid">Tipo Documento:</legend>
                                <div class="form-check form-check-inline" id="Tid">
                                    <input class="form-check-input" type="radio" id="CC" name="tipoid" value="2" <?php if(isset($tipid)){if($tipid==2) echo "checked";}else{echo "checked";} ?>>
                                    <label class="form-check-label" for="CC">CC</label>
                                </div>
                                <div class="form-check form-check-inline" id="Tid">
                                    <input class="form-check-input" type="radio" id="TI" name="tipoid" value="1" <?php if(isset($tipid)){if($tipid==1) echo "checked";} ?>>
                                    <label class="form-check-label" for="TI">TI</label>
                                </div>
                            </div>
                        </div>
                    </center>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="fName">Nombres</label>
                            <input type="text" id="fName" name="Nombre" placeholder="Ingrese nombres..." value="<?php if(isset($nombres)){echo $nombres;} ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fApll">Apellidos</label>
                            <input type="text" id="fApll" name="Apell" placeholder="Ingrese apellidos..." value="<?php if(isset($apellidos)){echo $apellidos;} ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5 mb-3">
                            <label for="fname">Dirección</label>
                            <input type="text" id="fDir" name="direccion" placeholder="Ingrese Dirección..." value="<?php if(isset($direccion)){echo $direccion;} ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                             <label for="fTel">Teléfono</label>
                            <input type="text" id="fTel" name="tel" placeholder="Ingrese Dirección..." value="<?php if(isset($telefono)){echo $telefono;} ?>">
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">
                        <div class="form-group col-md-5">
                            <label for="fcorreo">Correo:</label>
                            <input type="text" id="fCorreo" name="correo" placeholder="Ingrese Correo..." value="<?php if(isset($email)){echo $email;} ?>">
                        </div>
                        <div class="form-group col-md-4">  
                            <label for="fPass">Contraseña:</label>
                            <input type="password" id="fPass" name="pass" placeholder="Ingrese Contraseña..." value="<?php if(isset($password)){echo $password;} ?>">
                        </div>
                    </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-5 align-self-center">
                                <legend class="col-form-label pt-0 d-flex justify-content-start" for="male">Genero:</legend>
                                <div class="form-check form-check-inline" id="Genero">
                                    <input class="form-check-input" type="radio" id="male" name="genero" value="2" <?php if(isset($tipid)){if($tipid==2) echo "checked";}else{echo "checked";} ?>>
                                    <label class="form-check-label" for="male">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="female" name="genero" value="1" <?php if(isset($tipid)){if($tipid==1) echo "checked";} ?>>
                                    <label class="form-check-label" for="female">Femenino</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Date">Fecha de Nacimiento:</label>
                                <input type="date"  id="Date" name="FechaNa" value="<?php if(isset($FechaNa)){echo $FechaNa;} ?>">
                            </div>
                        </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-5">
                            <label for="fgrupo">Grupo:</label>
                            <select class="custom-select" id="fgrupo" name="grupo">
                            <?php 
                                $i=0;
                                while(isset($grupos[$i]->codigo)){
                                ?>
                                    <option value="<?php echo $grupos[$i]->codigo;?>">
                                    <?php echo $grupos[$i]->nombre;?>
                                    </option>
                                <?php
                                 $i++;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4 justify-content-center align-self-center">
                            <legend class="col-form-label pt-0 d-flex" for="perido">Periodo:</legend>
                            <div class="form-check form-check-inline" id="Perido">
                                <input class="form-check-input" type="radio" id="periodo" name="periodo" value="1" checked>
                                <label class="form-check-label" for="male">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="periodo2" name="periodo" value="2">
                                <label class="form-check-label" for="female">2</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center row mx-md-n5">
                        <div class="col px-md-5">
                            <button class="btn btn-primary text-white pl-auto btn-lg col px-md-5" id="BuscarSubmit" type="submit" name="frmBuscar" value="Buscar">Buscar</button>
                        </div>
                        <?php 
                            if(isset($Consultar)){
                                echo '
                                <div class="col px-md-5 ">
                                    <button class="btn btn-primary text-white pl-auto btn-lg col px-md-5" type="submit" name="frmMatricular">Matricular</button>
                                </div>';
                            }
                        ?>
                    </div>
                </fieldset>
                <!--<a href="gestionAdministrador.php" class="buttonRegresar" style="vertical-align:top"><span>Regresar</span></a>-->
            </form>
            <?php 
                if(isset($Errores)&& is_array($Errores)){
                    echo '<div class="col-md-4 justify-content-center align-self-center">';
                    $html = '<ul>';
                        foreach($Errores as $error){
                            $html .= '<li>'.$error.'</li>';
                        }
                    $html .= '</ul>';
                    echo $html;
                    echo '</div>';
                }
            
            ?>
        </section>
    </div>
</div>

<script type="text/javascript" src="/ProyectoPHP/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() { 
        $('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '/ProyectoPHP/css/bootstrap.css') );
        //$("#navBar").css({"margin-top": "0.09%"});
        //$("#centerlogo").css({"height":"290px"});
        $("#navBar").css({"cssText": "margin-top: 0.09% !important"});
        $("#centerlogo").css({"cssText":"height: 290px !important"});
        $("#spaciogrupo").css({"cssText":"margin-bottom: 0.5rem !important"});
        $("#fgrupo").css({"cssText":"left: 0 !important"});
        $("#fmateria").css({"cssText":"left: 0 !important"});
        $("#fperiodo").css({"cssText":"left: 0 !important"});
        $("#form_est").css({"cssText":"height: 1080 !important"});
        $("#contentWrapper").css({"cssText":"background-color: transparent !important"});                           
        //$("#margengroup").css({"cssText":"margin-right: 3px !important, margin-left: 3px !important"});
        var $empty = false;
        var divexist = false;
        <?php 
            if(isset($Consultar)&&($Consultar==true)){
                ?>
                $("#frmMatricula").submit((e)=> {
                        if($("#errorAlert").length>0){
                            divexist=true;
                        }
                        $('input[type=text]').each(function(){
                            if($.trim($(this).val()).length==0){
                                if(divexist==false){
                                    var $newdiv1 = $( '<div class="alert alert-danger fade show" id="errorAlert"><strong>Campo Requerido!</strong><button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                                    $(this).parent().append($newdiv1);
                                    e.preventDefault();
                                }
                                $empty =true;
                            }else{
                                $empty =false;
                            }
                            
                        });
                    if ($empty) {
                        return false;        
                    }
                });
                <?php
            }else{
                ?> 
                    $("#frmMatricula").submit((e)=> {
                        if($("#errorAlert").length>0){
                                divexist=true;
                        }
                            if($.trim($('#doc').val()).length==0){
                                if(divexist==false){
                                    var $newdiv1 = $( '<div class="alert alert-danger fade show" id="errorAlert"><strong>Campo Requerido!</strong><button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                                    $('#doc').parent().append($newdiv1);
                                }
                            $empty =false;
                            return false;
                            }
                    });
                <?php
            }
        ?>
        /*$('input[type=text]').on('keyup', function(e) {
            if($("#errorAlert").length>0){
                $(".alert").alert('close');
            }
        });*/
        /*$(".alert").find(".close").on("click", function (e) {
            e.stopPropagation();
            e.preventDefault();
        });*/
        <?php 
            if(isset($Consultar)){
                if($Consultar==true){
            ?>
                    $('#doc').attr('readonly', true);
                    $("#doc").css({"cssText":"background-color: #D3E9F1 !important"});
                    $('.form-check-input:not(:checked)').removeAttr('disabled');
                    $('#fgrupo option:not(:selected)').removeAttr('disabled');
            <?php  
                }else{
            ?>
                    $('#doc').attr('readonly', false);
                    $("#doc").css({"cssText":"background-color: #D3E9F1 !important"});
                    $('#fName').attr('readonly', false);
                    $('#fName').css({"cssText":"background-color: #D3E9F1 !important"});
                    $('#fApll').attr('readonly', false);
                    $('#fApll').css({"cssText":"background-color: #D3E9F1 !important"});
                    $('#fDir').attr('readonly', false);
                    $('#fDir').css({"cssText":"background-color: #D3E9F1 !important"});
                    $('#fTel').attr('readonly', false);
                    $('#fTel').css({"cssText":"background-color: #D3E9F1 !important"});
                    $('#fCorreo').attr('readonly', false);
                    $('#fCorreo').css({"cssText":"background-color: #D3E9F1 !important"});
                    $('#fPass').attr('readonly', false);
                    $('#fPass').css({"cssText":"background-color: #D3E9F1 !important"});
                    $('#Date').attr('readonly', false);
                    $('#Date').css({"cssText":"background-color: #D3E9F1 !important"});
                    $(':radio:not(:checked)').attr('disabled', false);
                    $('#fgrupo option:not(:selected)').attr('disabled',false);
            <?php
                }
            }else{
                ?>
            $('#doc').attr('readonly', false);
            $('#fName').attr('readonly', true);
            $('#fName').css({"cssText":"background-color: #E7E7E7 !important"});
            $('#fApll').attr('readonly', true);
            $('#fApll').css({"cssText":"background-color: #E7E7E7 !important"});
            $('#fDir').attr('readonly', true);
            $('#fDir').css({"cssText":"background-color: #E7E7E7 !important"});
            $('#fTel').attr('readonly', true);
            $('#fTel').css({"cssText":"background-color: #E7E7E7 !important"});
            $('#fCorreo').attr('readonly', true);
            $('#fCorreo').css({"cssText":"background-color: #E7E7E7 !important"});
            $('#fPass').attr('readonly', true);
            $('#fPass').css({"cssText":"background-color: #E7E7E7 !important"});
            $('#Date').attr('readonly', true);
            $('#Date').css({"cssText":"background-color: #E7E7E7 !important"});
            $(':radio:not(:checked)').attr('disabled', true);
            $('#fgrupo option:not(:selected)').attr('disabled',true);
                /*$('input').each((e)=>{
                    //alert("Entro por aqui");
                    var $input = $(this).attr('id');
                    $input = $input ? $input.localeCompare('doc'): $($input);
                    console.log($input);
                    //console.log(varid);
                    //console.log($(this));
                    if($input.length && $input.localeCompare('doc') !=0){
                        $($input).attr('readonly', false);
                        $($input).css({"cssText":"background-color:#D3E9F1 !important"});
                        return false;
                    }
                });*/
                <?php
            }
        if(isset($Consultar)&& $Consultar==false){?>
                
                $("#fName").val("");
                $("#fApll").val("");
                $("#fDir").val("");
                $("#fTel").val("");
                $("#fCorreo").val("");
                $("#fPass").val("");
                $("#Date").val("");

            <?php
        }
        ?>
    });
</script>

<?php 
    include_once("../views/componentes/footer.php");
?>