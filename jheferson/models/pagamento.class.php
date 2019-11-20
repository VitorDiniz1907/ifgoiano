<?php

class Pagamento{
    private $idpagamento;
    private $nome;


    

   
    public function getIdPagamento()
    {
        return $this->idpagamento;
    }
    public function setIdPagamento($idpagamento)
    {
        $this->idpagamento = $idpagamento;

    }




  
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;

      
    }
}



?>