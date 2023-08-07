<?php

    class Conexao{

        private $server = "localhost";
        private $user = "root";
        private $password = "24131516";
        private $db = "lucas";

        public function connectDB(){
                
            $con = new mysqli($this->server, $this->user, $this->password, $this->db);
    
            if(!$con){
                echo "Falha ao Conectar ao DB - " . mysqli_connect_error();
            }
    
            return $con;
        }
        

    }