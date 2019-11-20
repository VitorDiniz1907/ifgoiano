<?php

    class ItemVenda{
        private $id;
        private $idMedicamento;
        private $idPagamento;
        private $idUsuario;
        private $quantidade;
        private $valor;
        private $endereco;
        private $bairro;
        private $referencia;

        public function __construc(){}
        
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
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
 
        public function getEndereco(){
            return $this->endereco;
        } 
        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }

        public function getBairro(){
            return $this->bairro;
        }
        public function setBairro($bairro){
            $this->bairro = $bairro;
        }
        

        public function getReferencia(){
            return $this->referencia;   
        }
        public function setReferencia($referencia){
            $this->referencia = $referencia;
        }
    }

?>