<?php
    class Conexao{
        private $db = 'jefferson';
        private $user = 'root';
        private $password = '24131516';
        private $server = 'localhost';

        public function getConnection(){
            $conexao = new mysqli($this->server, $this->user, $this->password, $this->db);
            if($conexao->connect_error){
                die("A conexão falhou : " . $conexao->connect_error);
            }
            return $conexao;
        }
    }
?>