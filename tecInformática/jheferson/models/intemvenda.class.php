<?php

class ItemVenda{
    private $idvenda;
    private $quantidade;
    private $valor;
    private $idUsuario;
    private $idFarmacia;
    private $idMedicamento;
    private $idPagamento;
    private $idReceita;

    private $logradouro;
    private $bairro;
    private $cidade;
    private $estado;
    private $data;
    private $referencia;

    public function getIdVenda()
    {
        return $this->idvenda;
    }
    public function setIdVenda($idvenda)
    {
        $this->idvenda = $idvenda;

    }
    
    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

    }
    
    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;

    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdFarmacia()
    {
        return $this->idFarmacia;
    }
    public function setIdFarmacia($idFarmacia)
    {
        $this->idFarmacia = $idFarmacia;
    }

    public function getIdMedicamento()
    {
        return $this->idMedicamento;
    }
    public function setIdMedicamento($idMedicamento)
    {
        $this->idMedicamento = $idMedicamento;
    }

    public function getIdPagamento()
    {
        return $this->idPagamento;
    } 
    public function setIdPagamento($idPagamento)
    {
        $this->idPagamento = $idPagamento;
    }

    public function getIdReceita()
    {
        return $this->idReceita;
    }
    public function setIdReceita($idReceita)
    {
        $this->idReceita = $idReceita;
    }

    public function getLogradouro(){
        return $this->logradouro;
    }
    public function setLogradouro($logradouro){
        $this->logradouro = $logradouro;
    }

    public function getBairro(){
        return $this->bairro;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
    }

    public function getReferencia()
    {
        return $this->referencia;
    }
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }
}
?>