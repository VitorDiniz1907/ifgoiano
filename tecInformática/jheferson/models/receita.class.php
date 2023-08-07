<?php

class Receita{
    private $idreceita;
    private $medico;
    private $cmf;

    


    public function getIdreceita()
    {
        return $this->idreceita;
    }
    public function setIdreceita($idreceita)
    {
        $this->idreceita = $idreceita;

    }


    

    public function getMedico()
    {
        return $this->medico;
    }
    public function setMedico($medico)
    {
        $this->medico = $medico;

    }


    
    public function getCmf()
    {
        return $this->cmf;
    }
    public function setCmf($cmf)
    {
        $this->cmf = $cmf;

    }

    
   
}


?>