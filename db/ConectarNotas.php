<?php
require ("config.php");
class Conectar{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = SERVIDOR;
        $this->db       = NAMEDB;
        $this->user     = USER;
        $this->password = PASSWORD;
        $this->charset  = CHARSET;
    }

    function connect(){
    
        try{
            $mysqli = new mysqli($this->host, $this->user, $this->password, $this->db);
            //if ($mysqli->connect_errno) exit('ERROR EN LA CONEXION: ' . $mysqli->connect_errno);
            $mysqli->set_charset($this->charset);
            return $mysqli;

        }catch(exception $e){
            //print_r('Error connection: ' . $e->getMessage());
            ?>
			<script>
				alert('Hay problemas con la conexión.. ');
				
			</script>
			<?php
        }   
    }
    
}

?>