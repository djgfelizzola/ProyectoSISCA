<?php
if(!class_exists('Conectar')){
    require('../db/Conectar.php');
}

class detallesNota{

    /*Se requiere la clase conexion*/
    private $conexionDB;

    /*Atributos de la tabla persona*/
   

    public function __construct(){        
        $this->conexionDB = new Conectar();								
    }
    public function __destruct() {
    	
    }

    public function ExisteEstudiantePorProfesor($documentoPro,$documentoEstu,$codMateria,$codGrupo){
      try {
              $sql = "SELECT DISTINCT ET.documento FROM grupo GP INNER JOIN estudiante ET ON GP.codigo=ET.grupo INNER JOIN detalle DT ON DT.docEstudiante=ET.documento INNER JOIN materia MT ON MT.codigo=DT.codMateria WHERE MT.profesor='$documentoPro'  AND ET.documento= '$documentoEstu' AND DT.codMateria='$codMateria' AND ET.grupo='$codGrupo'";
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
              echo ($codGrupo);
          }
    }
    
    public function BuscarNotas($documentoPro,$documentoEstu,$codMateria,$codGrupo,$codigoPeriodo){
        $sql = "SELECT  DT.Nota1,DT.Nota2,DT.Nota3,DT.Nota4,DT.Nota5 FROM grupo GP INNER JOIN estudiante ET ON GP.codigo=ET.grupo INNER JOIN detalle DT ON DT.docEstudiante=ET.documento INNER JOIN materia MT ON MT.codigo=DT.codMateria WHERE MT.profesor='$documentoPro'  AND ET.documento= '$documentoEstu' AND DT.codMateria='$codMateria' AND ET.grupo='$codGrupo' AND DT.codPeriodo='$codigoPeriodo'";
        $query = $this->conexionDB->connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function ActualizarNotas($documentoEstu,$codMateria,$codigoPeriodo,$nota1,$nota2,$nota3,$nota4,$nota5){
        try {
                $sql = "UPDATE `detalle` SET `Nota1`=$nota1,`Nota2`=$nota2,`Nota3`=$nota3,`Nota4`=$nota4,`Nota5`=$nota5 WHERE codPeriodo='$codigoPeriodo' AND codMateria='$codMateria' AND docEstudiante='$documentoEstu'";
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
                echo ($codGrupo);
            }
      }
    /*private function BuscarPeriodoEstudiante($doc){

    }*/

}

?>