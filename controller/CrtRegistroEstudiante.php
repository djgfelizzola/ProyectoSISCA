<?php
require_once('../controller/ValidarLRP.php');

require('../modelo/estudiante.php');

/*Atributos Tabla persona*/
$documento = trim(filtrarDatos('documento'));
$nombres = trim(filtrarDatos('Nombre'));
$apellidos = trim(filtrarDatos('Apell'));
$FechaNa = trim(filtrarDatos('FechaNa'));
$genero = trim(filtrarDatos('genero'));
$email = trim(filtrarDatos('correo'));
$telefono = trim(filtrarDatos('tel'));
$direccion = trim(filtrarDatos('direccion'));
$TipoId = trim(filtrarDatos('tipoid'));

/*Atributos tabla usuario */
$password = filtrarDatos('pass');

/*Atributos tabla estudiante */
$grupo = filtrarDatos('grupo');

/*Atributos tabla detalle */
$periodo = filtrarDatos('periodo');

$Errores;

if(isset($_POST['frmMatricular'])){

	$results = validar($documento,$nombres,$apellidos,$FechaNa,$genero,$email,$telefono,$direccion,$TipoId,$password,$grupo,
						$periodo);
	
	if(!is_array($results)){
		$est = new estudiante();
		$est->setDocumento($documento);
		$est->setNombre($nombres);
		$est->setApellido($apellidos);
		$est->setFechaNa($FechaNa);
		$est->setgenero($genero);
		$est->setEmail($email);
		$est->setTelefono($telefono);
		$est->setDireccion($direccion);
		$est->settipid($TipoId);
		$est->setpassword($password);
		$est->setgrupo($grupo);
		$est->setperiodo($periodo);

		$matr = $est->RegistrarEstudiante();
		$Consultar=false;
		if(isset($matr)&&($matr==true)){
			?>
					<script>
						alert('Matricula registrada con exito');
					</script>
			<?php
		}else{
			?>
					<script>
						alert('No se pudo matricular al estudiante');
					</script>
			<?php
		}
		require('../views/RegistroEstudiantes.php');	
	}else{
		$Errores = $results;
		$Consultar=false;
		require('../views/RegistroEstudiantes.php');
	}
	
}else if(isset($_POST['frmBuscar'])) {
	$Consultar = false;

	$validate = new Validation();
	$validate->name('Documento')->value($documento)->pattern('int')->required();
	$errval = $validate->getErrors();

	if(!isset($errval)){
		$est = new estudiante();
		$est->setDocumento($documento);
		$datos =  $est->BuscarEstudiante();
		$Consultar = true;

		if(isset($datos) && count($datos)>0){
			?>
				<script>
					alert('El estudiante ya se encuentra registrado');
				</script>
			<?php
			$documento = $datos[0]->documento;
			$nombres = $datos[0]->nombre;
			$apellidos = $datos[0]->apellido;
			$FechaNa = $datos[0]->fechaNacimiento;
			$genero = $datos[0]->genero;
			$email = $datos[0]->email;
			$telefono = $datos[0]->telefono;
			$direccion = $datos[0]->direccion;
			$TipoId = $datos[0]->tipoDocumento;
			$password = $datos[0]->contraseña;
			require('../views/RegistroEstudiantes.php');
		}else{
			?>
				<script>
					alert('No se encontro el estudiante');
				</script>
			<?php
			require('../views/RegistroEstudiantes.php');
		}
	}
}

function validar($documento,$nombres,$apellidos,$FechaNa,$genero,$email,$telefono,$direccion,$TipoId,$password,$grupo,$periodo){
	$validate = new Validation();

	$validate->name('Documento')->value($documento)->pattern('int')->required();
	$validate->name('Nombres')->value($nombres)->pattern('words')->required();
	$validate->name('Apellidos')->value($apellidos)->pattern('words')->required();
	$validate->name('Email')->valide_email($email);
	$validate->value($FechaNa)->birthdateformat()->required();
	$validate->name('Genero')->value($genero)->pattern('int')->required();
	$validate->name('Teléfono')->value($telefono)->pattern('int')->required();
	$validate->name('Dirección')->value($direccion)->required();
	$validate->name('Tipo de identificación')->value($TipoId)->pattern('int')->required();
	$validate->name('Contraseña')->value($password)->required();
	$validate->name('Grupo')->value($grupo)->pattern('int')->required();
	$validate->name('Periodo')->value($periodo)->pattern('int')->required();

	if($validate->isSuccess()){
		return true;
	}else{
		return $validate->getErrors();
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