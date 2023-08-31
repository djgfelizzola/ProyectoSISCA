<?php

require('../db/Conectar.php');

class Cliente
{
    private $documento;
    private $nombre;
    private $apellido;
    private $direccion;
    private $email;
    private $telefono;
    private $pais;
    private $conexionDB;
    
    public function __construct(){        
        $this->conexionDB = new Conectar();								
    }
    
    public function __destruct() {
    	
       	
   }
    
    public function setDocumento($documento){
		$this->documento = $documento;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setTelefono($telefono){
		$this->telefono = $telefono;				
	} 
	
	public function setPais($pais){
		$this->pais = $pais;				
	}     
	
	public function registrarCliente($foto){
      	try
		{
			$sql = "INSERT INTO cliente (";
			$sql .= "documento, Nombres, Apellidos, Direccion, Email, Telefono,id_pais,foto";
			$sql .= ") VALUES (";
			$sql .= "'$this->documento','$this->nombre','$this->apellido','$this->direccion','$this->email','$this->telefono','$this->pais','$foto');";		
			$stmt = $this->conexionDB->connect()->prepare($sql);
			$stmt->execute();
		} 
		catch (Exception $e) 
		{
			die ("Se produjo un error $e");
		}
	 
		                
      
      
		if(isset($stmt))
		{
			?>
			<script>
				alert('Registro almacenado');
				location.href="../views/frmRegistroClientes.php";
			</script>
			<?php
			exit();
		}
		else{
			
			echo"Hay problemas con la sentencia SQL";
		}
	}
	
	public function buscarCliente($doc){
		
		$sql = "select * from cliente where documento = $doc";
		$query = $this->conexionDB->connect()->prepare($sql);
		
		$query -> execute(); 
		$results = $query -> fetchAll(PDO::FETCH_OBJ); 
		
		return $results;
		
	}
	
	public function actualizarCliente($foto){
						
	}
	
	
	  
	 
	
	
}

?>



