<?php

class Farmacia{
    private $idfarmacia;
    private $telefone;
    private $nome;
    private $cnpj;
    private $razaoSocial;


    


  
    public function getIdFarmacia()
    {
        return $this->idfarmacia;
    }
    public function setIdFarmacia($idfarmacia)
    {
        $this->idfarmacia = $idfarmacia;
    }



    
  
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;

    }


    

    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

    }



   
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

    }


   
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }


}
?>