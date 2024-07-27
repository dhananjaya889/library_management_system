<?php

    require_once "Database.php";
    class Repository extends Database
    {
        private $db;
        public function __construct(){
            $this->db = $this->connect();
        }

        public function createtable()
        {
            
        }
    
    }
    