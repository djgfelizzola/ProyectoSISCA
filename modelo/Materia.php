<?php
if(!class_exists('Conectar')){
    require('../db/Conectar.php');
}

class Materia{

    /*Se requiere la clase conexion*/
    private $conexionDB;

    private $codigo;
    private $materia;

    public function __construct(){
        $this->ConexionDB = new Conectar();								
    }

    public function __destruct(){
    	
    }
    public function setCodigo($codigo){
		$this->codigo = $codigo;
	}
	public function setMateria($materia){
		$this->materia = $materia;
	}

    public function listarMateria($codProfesor){
        $sql = "SELECT * FROM materia where profesor = $codProfesor";
        $query = $this->ConexionDB->connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}

?>