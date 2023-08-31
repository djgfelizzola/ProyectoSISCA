<?php

require('../modelo/profesor.php');

$documento = filtrarDatos('documento');
$usuario = filtrarDatos('documento');
$nombres = filtrarDatos('nombres');
$apellidos = filtrarDatos('apellidos');
$direccion = filtrarDatos('direccion');
$email = filtrarDatos('correo');
$telefono = filtrarDatos('telefono');
$contraseña = filtrarDatos('contraseña');
$tipoDocumento = filtrarDatos('tipoDocumento');
$profesion = filtrarDatos('profesion');
$materia = filtrarDatos('materia');
$genero = filtrarDatos('genero');
$fechaNacimiento = filtrarDatos('fechaNacimiento');




if(isset($_POST["frmMatricular"])){
	$var1=1;
		
	if(empty($documento))
	{
		$error = "¡Ingrese el documento!";
	}else if (empty($telefono)) {
		$error = "Debe ingresar el número de teléfono";
	}else if (!is_numeric($telefono)) {
		$error = "¡Ingrese solo números!";
	}
	else if (strlen($telefono) != 10) {
		$error = "El número telefónico debe tener 10 dígitos";
	}else if (empty($tipoDocumento)) {
		$error = "Debe elegir el tipo de documento";
	}
	

	if (empty($nombres)) {
		$error1 = "Debe ingresar el nombre";
	}
	else if (!ctype_alpha($nombres)) {
		$error1 = "El nombre solo deben ser letras";
	}

	if (empty($apellidos)) {
		$error2 = "Debe ingresar el apellido";
	}
	else if (!ctype_alpha($apellidos)) {
		$error2 = "El apellido solo deben ser letras";
	}

	if (empty($direccion)) {
		$error3 = "Debe ingresar la dirección";
	}

	if (empty($profesion)) {
		$error4 = "Debe ingresar la profesión";
	}
	else if (!ctype_alpha($profesion)) {
		$error4 = "El profesión solo deben ser letras";
	}
	

	if (empty($email)) {
		$error5 = "Ingrese su correo electronico";
	}
	else if (!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)) {
		$error5 = "Ingrese un coreo electronico valido";
	}


	if (empty($contraseña)) {
		$error6 = "Ingrese su contraseña";
	}else if (strlen($contraseña) < 8) {
		$error6 = "la contraseña debe tener mínimo 8 caracteres";
	}


	if (empty($materia)) {
		$error7 = "Debe ingresar la materia";
	}
	else if (!ctype_alpha($materia)) {
		$error7 = "La materia solo deben ser letras";
	}


	if (empty($genero)) {
		$error8 = "Debe elegir el genero";
	}

	if (empty($fechaNacimiento)) {
		$error9 = "Debe elegir la fecha de nacimiento";
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
$modelo =new profesor();
$profeExiste=$modelo->buscarProfesor($documento);

if($profeExiste==1){
    ?>
    <script>
    alert ('El profesor que desea registrar ya se encuentra en la base de datos de SISCA');
    location.href="../views/RegistroProfesor.php";
    </script>
    <?php
}else{
	$MateriaExiste=$modelo->buscarMateria($materia);
	
	if($MateriaExiste==1){
		?>
		<script>
		alert ('La materia ya se encuentra en la base de datos de SISCA');
		location.href="../views/RegistroProfesor.php";
		</script>
		<?php
	}else{
	
		$modelo->setNombre($nombres);
		$modelo->setApellido($apellidos);
		$modelo->setDireccion($direccion);
		$modelo->setEmail($email);
		$modelo->setTelefono($telefono);
		$modelo->setUsuario($usuario);
		$modelo->setProfesion($profesion);
		$modelo->setTipoDocumento($tipoDocumento);
		$modelo->setGenero($genero);
		$modelo->setMateria($materia);
		$modelo->setFechaNacimiento($fechaNacimiento);
		$modelo->setDocumento($documento);
		$modelo->setContraseña($contraseña);
		$validacionRegistro=$modelo->registrarProfesor(); 
	//	$validarMateria=$modelo->registrarMateria($materia);
    //if($validarMateria==1){
		
		if($validacionRegistro==1){
			$mensaje="Bienvenido: $nombres Ha sido registrado exitosamente en la base de datos de SISCA";
        ?>
							<script>
				alert ("<?php echo ($mensaje); ?>");
				location.href="../views/RegistroProfesor.php";
							</script>
							<?php
		}
        
	//}
	}
}
	
	
}
}
else if(isset($_POST["frmBuscar"])){
	if(empty($documento))
	{
		?>
			<script>
				alert('Debe ingresar el número de documento a buscar');
				location.href="../views/frmRegistroClientes.php";
			</script>
			<?php
			exit();  
		
	}
	else{
		$docCliente = $documento;   	
		$cliente = new Cliente();
		$paises = $cliente->listarPaises();
		$datos = $cliente->buscarCliente($docCliente);
		//$foto = $cliente->mostrarFoto();    		    		
    	require('../views/frmActualizarClientes.php');
	}
	    
}

else if(isset($_POST["frmActualizar"])){
	
	
      
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


