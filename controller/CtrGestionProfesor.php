<?php
require('../modelo/detallesNota.php');
    if(isset($_SESSION["usuario"])){
        $documento    = json_decode($_SESSION["usuario"])->documento;
    }

$exisestu=0;
$materia = trim(filtrarDatos('materia'));
$grupo = trim(filtrarDatos('grupo'));
$periodo = filtrarDatos('periodo');
$documentoForm = filtrarDatos('documento');
$n1 = filtrarDatos('n1');
$n2 = filtrarDatos('n2');
$n3 = filtrarDatos('n3');
$n4 = filtrarDatos('n4');
$n5 = filtrarDatos('n5');

$modelo =new detallesNota();
if(isset($_POST["frmConsultar"])){
	
	$var1=1;	
	if(empty($documentoForm))
	{
		$error = "¡Ingrese el documento!";
	}else if (!is_numeric($documentoForm)) {
		$error = "¡Ingrese solo números!";
	}
	else{
		$var1=2;		
	}

	if($var1==1){
		?>
		<script>
			alert('Verifique los campos, algunos se encuentran vacios');
		</script>
		<?php
	}else{
	
		$exisestu=$modelo->ExisteEstudiantePorProfesor($documento,$documentoForm,$materia,$grupo);
		if($exisestu==1){
		$ResultadoNotas=$modelo->BuscarNotas($documento,$documentoForm,$materia,$grupo,$periodo);
		
		}else{
			?>
		<script>alert('El estudiante no existe en la base de datos de SISCA');</script>
		<?php
		}
	}
}
else if(isset($_POST["frmCancelar"])){
?>
<script>
location.href="gestionProfesor.php";
</script>
<?php
}else if(isset($_POST["frmAsignar"])){
	  $ResulAsignacion=$modelo->ActualizarNotas($documentoForm,$materia,$periodo,$n1,$n2,$n3,$n4,$n5); 
	    if($ResulAsignacion==1){
			?>
			<script>
			alert('¡Notas actualizadas con exito!');
			location.href="gestionProfesor.php";
			</script>
			<?php
		}
}


function filtrarDatos($var)
 {
	 $m = "";
	 if (!isset($_REQUEST[$var])) {
	 	$tmp = (is_array($m)) ? [] : "";
	 }
	 else if (!is_array($_REQUEST[$var]))
	 {
	 	$tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
	 }
	 else
	 {
	 	$tmp = $_REQUEST[$var];
	 	array_walk_recursive($tmp, function (&$valor) {
	 	$valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
	 });
	 }
	return $tmp;
}


?>


