<?php

require('../db/ConectarNotas.php');

class Nota
{
 
    private $conexionDB;
    public function __construct(){        
        $this->conexionDB = new Conectar();	
       					
    }
    
    public function __destruct() {
    	
       	
   }
   public function guardarNota($periodo,$documento){
      $sql = "SELECT m.nombre,d.Nota1,d.Nota2,d.Nota3,d.Nota4,d.Nota5,d.NotaDefinitiva from detalle d inner join materia m on m.codigo=d.codMateria WHERE  docEstudiante='$documento' and codPeriodo='$periodo' ";
    $query = $this->conexionDB->connect()->query($sql);
    while ($consulta = mysqli_fetch_array($query)) {

        $vec []= array(
            "Materia"=>$consulta["nombre"],
            "Nota1"=>$consulta['Nota1'],
            "Nota2"=>$consulta["Nota2"],
            "Nota3"=>$consulta["Nota3"],
            "Nota4"=>$consulta["Nota4"],
            "Nota5"=>$consulta["Nota5"],
            "Definitiva"=>$consulta["NotaDefinitiva"],
        );
      
      }
    
    return $vec;

    }
    public function getPeriodo(){
		return $this->periodo;
	}
	public function getClave(){

		return $this->clave;
	}
}

?>
