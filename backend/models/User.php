<?php

    require_once __DIR__."/../config/Repository.php";

    class User
    {
        protected $id;
        protected $name;
        protected $email;
        protected $password;

        protected $tableName;

        protected $colomns;

        protected $repo;

        public function __construct(){
            $this->repo = new Repository();
        }

        public function getAll(){
            return $this->repo->all($this->tableName);
        }

        public function create($request){
            $data = [
                'colomns'=> $this->colomns,
                'values' => $request
            ];
            return $this->repo->insert($this->tableName, $data);
        }

        public function findbyId($id){
            return $this->repo->findById($this->tableName, $id);
        }
    }
?>