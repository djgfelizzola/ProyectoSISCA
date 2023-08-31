<?php
require('../db/Conectar.php');

class estudiante{

    /*Se requiere la clase conexion*/
    private $conexionDB;

    /*Atributos de la tabla persona*/
    private $documento;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $email;
    private $fechaNa;

    /*Atributos de la tabla usuario */
    private $user;
    private $password;

    /*Atributos de la tabla TipoDocumento */
    private $tipid;

    /*Atributos de la tabla genero */
    private $genero; // 1-mujer 2-hombre

    /*Atributos del estudiante */
    private $grupo;

    /*Atributos de la tabla periodo */
    private $periodo;

    public function __construct(){        
        $this->conexionDB = new Conectar();								
    }
    public function __destruct() {
    	
    }

    public function RegistrarEstudiante(){
          try {
            $sql = "CALL insertar_estudiante(:id,:pass,:rol,:nomb,:apll,:fechna,:gen,:email,:tel,:dir,:tipoid,:grup,:periodo,@afrows)";
            $sql = $this->conexionDB->connect()->prepare($sql);
            $sql->bindValue('id',$this->documento,PDO::PARAM_STR);
            $sql->bindValue('pass',$this->password,PDO::PARAM_STR);
            $sql->bindValue('rol',2,PDO::PARAM_INT);
            $sql->bindValue('nomb',$this->nombre,PDO::PARAM_STR);
            $sql->bindValue('apll',$this->apellido,PDO::PARAM_STR);
            $sql->bindValue('fechna',$this->fechaNa,PDO::PARAM_STR);
            $sql->bindValue('gen',$this->genero,PDO::PARAM_INT);
            $sql->bindValue('email',$this->email,PDO::PARAM_STR);
            $sql->bindValue('tel',$this->telefono,PDO::PARAM_STR);
            $sql->bindValue('dir',$this->direccion,PDO::PARAM_STR);
            $sql->bindValue('tipoid',$this->tipid,PDO::PARAM_INT);
            $sql->bindValue('grup',$this->grupo,PDO::PARAM_STR);
            $sql->bindValue('periodo',$this->periodo,PDO::PARAM_STR);
            if($sql->execute()){
              return true;
            }else{
              return false;
            }
          } catch (Exception $e) {
            die("Hubo un error hay registrar el estudiante debido a: ".$e);
          }
    }

    public function ExisteEstudiante(){
		try {
            $sql = "select * from estudiante where documento = '$this->documento' ";
            $query = $this->conexionDB->connect()->prepare($sql);
            
            $query->execute(); 
            if($query->rowCount()){
                return true;
            }else{
                return false;
            }
            return false;
        } catch (Exception $e) {
            die ("Se produjo un error:".$e->getMessage());
        }
	}
    public function BuscarEstudiante(){
        if($this->ExisteEstudiante()){
            try {
                $sql = "CALL buscar_estudiante('$this->documento')";
                $query = $this->conexionDB->connect()->prepare($sql);
                
                $query->execute(); 
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                return $results;
            } catch (Exception $e) {
                die ("Se produjo un error:".$e->getMessage());
            }
        }else{
            return null;
        }
    }

    public function ExisteEstudiantePorProfesor($documentoPro,$documentoEstu){
      try {
              $sql = "SELECT DISTINCT ET.documento FROM grupo GP INNER JOIN estudiante ET ON GP.codigo=ET.grupo INNER JOIN detalle DT ON DT.docEstudiante=ET.documento INNER JOIN materia MT ON MT.codigo=DT.codMateria WHERE MT.profesor=$documentoPro  AND ET.documento= $documentoEstu";
              $query = $this->conexionDB->connect()->prepare($sql);
              
              $query->execute(); 
              if($query->rowCount()){
                  return 1;
              }else{
                  return 0;
              }
              return false;
          } catch (Exception $e) {
              die ("Se produjo un error:".$e->getMessage());
          }
    }
    
    /*private function BuscarPeriodoEstudiante($doc){

    }*/

  /*Atributos de la tabla persona*/
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
    public function setFechaNa($FechaNa){
		$this->fechaNa = $FechaNa;				
    }
    /*Atributos de la tabla usuario */
    public function setusuario($user){
		$this->user = $user;				
    }
    public function setpassword($pass){
		$this->password = $pass;				
    }
    /*Atributos de la tabla TipoDocumento */
    public function settipid($tipoid){
		$this->tipid = $tipoid;				
    }
    /*Atributos de la tabla genero */
    public function setgenero($gen){
		$this->genero = $gen;				
    }
    /*Atributos del estudiante */
    public function setgrupo($grupo){
		$this->grupo = $grupo;				
    }

    /*Atributos de la tabla periodo */
    public function setperiodo($per){
		$this->periodo = $per;				
    }
}

?>