<?php

    require_once "Database.php";
    class Repository extends Database
    {
        private $db;
        public function __construct(){
            $this->db = $this->connect();
        }

        public function all($tableName)
        {
            $sql ="select * from $tableName";
            $result =$this->db->query($sql);
            return $result;
        }

        public function insert($tableName, $data)
        {
            $sql = "insert into ".$tableName. " " .$data['colomns']. "values(".$data['values'].")";
            $result =$this->db->query($sql);
            return $result;
        }
    
        public function findById($tableName, $id){
            $sql = "select * from ".$tableName." where id = ".$id;
            $result = $this->db->query($sql);
            return $result;
        }

    }

?>
    