<?php

    class Medicamento{
        private $id;
        private $nome;
        private $bula;
        private $quantidade;
        private $valor;

        public function __construc(){}

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

        public function getBula(){
            return $this->bula;
        }
        public function setBula($bula){
            $this->bula = $bula;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

        public function getValor(){
            return $this->valor;
        }
        public function setValor($valor){
            $this->valor = $valor;
        }
    }

?>