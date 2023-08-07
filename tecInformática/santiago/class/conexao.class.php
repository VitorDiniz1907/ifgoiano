<?php

    class Conexao{

        private $server = "localhost";
        private $user = "root";
        private $password = "24131516";
        private $db = "santhiago";

        public function connectDB(){
                
            $con = new mysqli($this->server, $this->user, $this->password, $this->db);
    
            if(!$con){
                echo "Erro ao Conectar - " . mysqli_connect_error();
            }
    
            return $con;
        }
        

    }