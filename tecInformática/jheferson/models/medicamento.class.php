<?php

class Medicamento{
    private $idmedicamento;
    private $nome;
    private $bula;
    private $quantidade;
    private $valor;
    
    public function getIdMedicamento()
    {
        return $this->idmedicamento;
    }
    public function setIdMedicamento($idmedicamento)
    {
        $this->idmedicamento = $idmedicamento;     
    }

    

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;     
    }




    public function getBula()
    {
        return $this->bula;
    }
    public function setBula($bula)
    {
        $this->bula = $bula;    
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
}



?>