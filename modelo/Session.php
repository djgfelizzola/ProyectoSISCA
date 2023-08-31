<?php

class Session{

    public function __construct(){
        session_start();
    }

    public function setUser($user){
        $_SESSION['user'] = $user;
    }

    public function getUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>