<?php

    class ItemVenda{
        private $id;
        private $idFarmacia;
        private $idMedicamento;
        private $idPagamento;
        private $idReceita;
        private $idUsuario;
        private $quantidade;
        private $valor;
        

        public function __construc(){}
        
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }

        public function getIdFarmacia(){
            return $this->idFarmacia;
        }
        public function setIdFarmacia($idFarmacia){
            $this->idFarmacia = $idFarmacia;
        }

        public function getIdMedicamento(){
            return $this->idMedicamento;
        }
        public function setIdMedicamento($idMedicamento){
            $this->idMedicamento = $idMedicamento;
        }

        public function getIdPagamento(){
            return $this->idPagamento;
        }
        public function setIdPagamento($idPagamento){
            $this->idPagamento = $idPagamento;
        }

        public function getIdReceita(){
            return $this->idReceita;
        }
        public function setIdReceita($idReceita){
            $this->idReceita = $idReceita;
        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
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