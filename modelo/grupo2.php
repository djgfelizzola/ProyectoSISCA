<?php
if(!class_exists('Conectar')){
    require('../db/Conectar.php');
}

class Grupo2{

    /*Se requiere la clase conexion*/
    private $conexionDB;

    private $documento;
    private $grupo;

    public function __construct(){
        $this->ConexionDB = new Conectar();								
    }

    public function __destruct(){
    	
    }
    public function setDocumento($documento){
		$this->documento = $documento;
	}
	public function setgrupo($grupo){
		$this->grupo = $grupo;
	}


    public function listarGruposProfesor($docProfesor){
        $sql = "SELECT DISTINCT  GP.codigo, GP.nombre FROM grupo GP INNER JOIN estudiante ET ON GP.codigo=ET.grupo INNER JOIN detalle DT ON DT.docEstudiante=ET.documento INNER JOIN materia MT ON MT.codigo=DT.codMateria WHERE MT.profesor=$docProfesor";
        $query = $this->ConexionDB->connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
 

}
}

?>