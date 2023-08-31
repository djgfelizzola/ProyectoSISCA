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
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;

        }catch(PDOException $e){
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