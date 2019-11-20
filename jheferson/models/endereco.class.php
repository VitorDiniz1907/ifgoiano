<?php

class Endereco{
    private $idEndereco;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;
    private $idUser;

    public function __construct(){}


    public function getIdEndereco()
    {
        return $this->idEndereco;
    }
    public function setIdEndereco($idEndereco)
    {
        $this->idEndereco = $idEndereco;
    }


    public function getLogradouro()
    {
        return $this->logradouro;
    }
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }


    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }


    public function getComplemento()
    {
        return $this->complemento;
    }
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }


    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }


    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

 
    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

 
    public function getIdUser()
    {
        return $this->idUser;
    }
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
}


?>