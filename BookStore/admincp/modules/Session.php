<?php

class Session{
    public function startSess(){
        session_start();
    }
    
    public function delSess(){
        session_destroy();
    }

    public function sendSess($user){
        $_SESSION['user'] = $user;
    }

    public function getSess(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];        
        }
        else{
            $user = '';
        }
        return $user;
    }
}