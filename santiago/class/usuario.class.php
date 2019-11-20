<?php

    class Usuario{
        private $id;
        private $nome;
        private $rg;
        private $cpf;
        private $nascimento;
        private $email;
        private $senha;
        private $status;

        public function __contruct(){}
        
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

        public function getRg(){
            return $this->rg;
        }
        public function setRg($rg){
            $this->rg = $rg;
        }

        public function getCpf(){
            return $this->cpf;
        }
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function getNascimento(){
            return $this->nascimento;
        }
        public function setNascimento($nascimento){
            $this->nascimento = $nascimento;
        }

        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            $this->status = $status;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
    }

?>