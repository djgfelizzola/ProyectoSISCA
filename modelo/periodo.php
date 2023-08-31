<?php

require('../db/ConectarNotas.php');

class Periodo
{
    private $periodo;
    private $clave;
    private $conexionDB;
    public function __construct(){        
        $this->conexionDB = new Conectar();								
    }
    
    public function __destruct() {
    	
       	
   }
   public function guardarPeriodo(){
      $sql = "SELECT * from periodo";
    $query = $this->conexionDB->connect()->query($sql);
    while ($periodo = mysqli_fetch_array($query)) {

        $vec []= array(
            "Codigo"=>$periodo['codigo'],
            "Periodo"=>$periodo["periodo"]
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



