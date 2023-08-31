<?php

require('../db/Conectar.php');

class Profesor
{
    private $documento;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
	private $genero;
	private $usuario;
	private $materia;
    private $email;
    private $telefono;
    private $direccion;
    private $tipoDocumento;
    private $contraseña;
    private $profesion;
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

	public function setMateria($materia){
		$this->materia = $materia;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
    
    }
	public function setEmail($email){
		$this->email = $email;
	}
	public function setTelefono($telefono){
		$this->telefono = $telefono;				
	} 
	
	public function setFechaNacimiento($fechaNacimiento){
		$this->fechaNacimiento = $fechaNacimiento;				
    } 
    
    public function setGenero($genero){
		$this->genero = $genero;				
    }   
    
    public function setDireccion($direccion){
		$this->direccion = $direccion;				
	} 
	
	public function setUsuario($usuario){
		$this->usuario = $usuario;				
    } 
    
     
    public function setTipoDocumento($tipoDocumento){
		$this->tipoDocumento = $tipoDocumento;				
    }  
    
    public function setContraseña($contraseña){
		$this->contraseña = $contraseña;				
    }   
    public function setProfesion($profesion){
		$this->profesion = $profesion;				
	}   
	
	
	
	public function registrarProfesor(){
		$registroUsuario=$this->registrarUsuario();   
		if($registroUsuario==1)
		{
				$registroPersona=$this->registrarPersona();
				if($registroPersona==1){
				
					$regis=$this->registrarTablaProfesor();
					if($regis==1){
						$regisMateria=$this->registrarMateria();
						if($regisMateria==1){
							return 1;
						}else{
							return 0;
						}
					}else{
						
					}
				}else{
					
				}
		}
		else{
			echo"Hay problemas con la sentencia SQL";
		}
	}


	public function registrarPersona(){
		try{
			$sql = "INSERT INTO persona (";
			$sql .= "documento,usuario,nombre,apellido,fechaNacimiento,genero,email,telefono,direccion,tipoDocumento";
			$sql .= ") VALUES (";
			$sql .= "'$this->documento','$this->usuario','$this->nombre','$this->apellido','$this->fechaNacimiento','$this->genero','$this->email','$this->telefono','$this->direccion','$this->tipoDocumento');";		
			$stmt = $this->conexionDB->connect()->prepare($sql);
			$stmt->execute();
		} catch (Exception $e) {
			die ("Se produjo un error $e");
		}
	 
		if(isset($stmt)){
			return 1;
		}else{
			return 0;			
		}	
					
	}

	public function registrarTablaProfesor(){
		try{
			$sql = "INSERT INTO profesor (";
			$sql .= "documento,profesion";
			$sql .= ") VALUES (";
			$sql .= "'$this->documento','$this->profesion');";		
			$stmt = $this->conexionDB->connect()->prepare($sql);
			$stmt->execute();
		} catch (Exception $e) {
			die ("Se produjo un error $e");
		}
	 
		if(isset($stmt)){
			return 1;
		}else{
			return 0;			
		}	
					
	}

	
	public function buscarMateria($nombreMateria){
		$sql = "SELECT * FROM materia WHERE nombre = '$nombreMateria'";
		$query = $this->conexionDB->connect()->prepare($sql);
		
		$query -> execute(); 
		if($query->rowCount()){
			return 1;
		}else{
			return 0;
		}
	}
	
	public function buscarProfesor($documento){
		$sql = "select * from persona where documento = $documento";
		$query = $this->conexionDB->connect()->prepare($sql);
		
		$query -> execute(); 
		if($query->rowCount()){
			return 1;
		}else{
			return 0;
		}
	}
/*
	public function buscarcodUltimaMateria(){
		$sql = "SELECT * FROM materia";
		$query = $this->conexionDB->connect()->prepare($sql);
		$query -> execute(); 
		 $result = $query->fetchAll(PDO::FETCH_OBJ);
		$i=0;
		$codigo=0
		while(isset($result[$i]->codigo)){
			$codigo2=$result[$i]->codigo;
			if($codigo<$codigo2){
				$codigo=$codigo2;
			}
			i++;
		}
		return $codigo;
	}
*/

	public function registrarMateria(){
		try{
			$rol=1;
			$sql = "INSERT INTO materia (";
			$sql .= "codigo,nombre,profesor";
			$sql .= ") VALUES (";
			$sql .= "'$this->materia','$this->materia','$this->documento');";		
			$stmt = $this->conexionDB->connect()->prepare($sql);
			$stmt->execute();
		} catch (Exception $e) {
			die ("Se produjo un error $e");
		}
	 
		if(isset($stmt)){
			return 1;
		}else{
			return 0;			
		}	
						
	}
	
	
	public function registrarUsuario(){
		try{
			$rol=1;
			$sql = "INSERT INTO usuario (";
			$sql .= "documento,contraseña,rol";
			$sql .= ") VALUES (";
			$sql .= "'$this->documento','$this->contraseña','$rol');";		
			$stmt = $this->conexionDB->connect()->prepare($sql);
			$stmt->execute();
		} catch (Exception $e) {
			die ("Se produjo un error $e");
		}
	 
		if(isset($stmt)){
			return 1;
		}else{
			return 0;			
		}	
						
	}
	
	
	  
	 
	
	
}

?>



