<?php
if(!class_exists('Conectar')){
    require('../db/Conectar.php');
}

class Grupo{

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

    public function listargrupos(){
        $sql = "SELECT * FROM grupo";
        $query = $this->ConexionDB->connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }


}

?>