
<?php

require('../modelo/cliente.php');

$documento = filtrarDatos('documento');
$nombres = filtrarDatos('nombres');
$apellidos = filtrarDatos('apellidos');
$direccion = filtrarDatos('direccion');
$email = filtrarDatos('email');
$telefono = filtrarDatos('telefono');
$id_pais = filtrarDatos('pais');




if(isset($_POST["frmRegistrar"])){
		
	
	$modelo = new Cliente();
	$modelo->setDocumento($documento);
	$modelo->setNombre($nombres);
	$modelo->setApellido($apellidos);
	$modelo->setDireccion($direccion);
	$modelo->setEmail($email);
	$modelo->setTelefono($telefono);	
	$modelo->setPais($id_pais);
	$modelo->registrarCliente($fotoUser);
	
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


