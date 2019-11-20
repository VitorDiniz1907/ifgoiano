<?php
    class Auxiliar{
        private $idAux;
        private $med;
        private $qnt;
        private $user;

        public function __construct(){}
        
        
        public function getIdAux(){
            return $this->idAux;
        }
        public function setIdAux($idAux){
            $this->idAux = $idAux;
        }

        public function getMed(){
            return $this->med;
        }
        public function setMed($med){
            $this->med = $med;
        }

        public function getQnt(){
            return $this->qnt;
        }
        public function setQnt($qnt){
            $this->qnt = $qnt;
        }

        public function getUser(){
            return $this->user;
        }
        public function setUser($user){
            $this->user = $user;
        }
    }


?>