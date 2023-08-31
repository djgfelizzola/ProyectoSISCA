<?php

require('db/Conectar.php');

class User {
    private $nombre;
    private $username;
    private $conexion;
    
    public function __construct(){
		$this->conexion = new Conectar();								
	}


    public function userExists($user, $pass){        
        $password = $pass;

		
        $query = $this->conexion->connect()->prepare('SELECT * FROM usuarios WHERE nombre = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $password]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->conexion->connect()->prepare('SELECT * FROM usuarios WHERE nombre = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];            
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    
    public function getUserName(){
        return $this->username;
    }
}

?>