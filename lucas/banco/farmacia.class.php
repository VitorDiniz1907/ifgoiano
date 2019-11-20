<?php

    class Farmacia{
        private $id;
        private $nome;
        private $telefone;
        private $cnpj;
        private $razao;

        public function __construct(){
            
        }
        

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }

        
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getTelefone(){
            return $this->telefone;
        }
        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getCnpj(){
            return $this->cnpj;
        }
        public function setCnpj($cnpj){
            $this->cnpj = $cnpj;
        }

 
        public function getRazao(){
            return $this->razao;
        }
        public function setRazao($razao){
            $this->razao = $razao;
        }
    }

?>