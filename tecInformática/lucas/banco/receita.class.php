<?php

    class Receita{
        private $id;
        private $medico;
        private $cfm;

        public function __construct(){}

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }

        public function getMedico(){
            return $this->medico;
        }
        public function setMedico($medico){
            $this->medico = $medico;
        }

        public function getCfm(){
            return $this->cfm;
        }
        public function setCfm($cfm){
            $this->cfm = $cfm;
        }
    }

?>