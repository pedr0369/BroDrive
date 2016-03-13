<?php

class DB {
    
    private $server = "localhost";
    private $user = "atual329_pedr036";
    private $password = "peu86779";
    private $bd = "atual329_chat";
    
    public function newConnection(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->bd);   
        return $conn;        
    }
    
}