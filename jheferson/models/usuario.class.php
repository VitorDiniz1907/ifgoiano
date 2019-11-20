<?php

class Usuario{
    private $idusuario;
    private $nome;
    private $cpf;
    private $rg;
    private $nascimento;
    private $status;
    private $email;
    private $senha;


    public function __construct(){}
    

   
    public function getIdUsuario()
    {
        return $this->idusuario;
    }
    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    
    }



    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    

   
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }


    
  
    public function getNascimento()
    {
        return $this->nascimento;
    }
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;
    }


    

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }





    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }



    
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getRg()
    {
        return $this->rg;
    }
    public function setRg($rg)
    {
        $this->rg = $rg;
    }




}

?>