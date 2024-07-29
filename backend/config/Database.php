<?php

class Database 
{
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $dbName = "libsystem";

    public function connect(){
        $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        
        if ($conn->connect_error) {
            die("conn error ". $conn->connect_error);
        }
        return $conn;
    }
}

?>
