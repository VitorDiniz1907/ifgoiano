<?php

require_once "../models/usuario.class.php";
require_once "../conexao/conexao.class.php";

class DaoUsuario{

        public function salvar($usuario){

                $sql= "INSERT INTO `usuario`( `nome`, `email`, `senha`, `rg`, `cpf`, `nascimento`, `status`) 
                        VALUES (?,?,?,?,?,?,?)";


                $conexao = new Conexao();
                $con = $conexao->getConnection();

                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssssssi",$nome,$email,$senha,$rg,$cpf,$nascimento,$status);

                $nome = $usuario->getNome();
                $email = $usuario->getEmail();
                $senha = $usuario->getSenha();
                $rg = $usuario->getRg();
                $cpf = $usuario->getCpf();
                $nascimento = $usuario->getNascimento();
                $status = $usuario->getStatus();

                $stmt->execute();


                $id_salvo = $con->insert_id;
                $stmt->close();
                $con->close();
                return $id_salvo;

        }



        public function getAll() {//obter todos os registros de usuarios

                $retorno  = NULL;
                $sql = "SELECT * FROM usuario"; 
                $conexao  = new Conexao();
                $con = $conexao->getConnection();
                $result  = $con->query($sql);
                
                if($result->num_rows > 0 ){
                    $retorno = array();
                    while($linha = $result->fetch_assoc()){
                        $usuario = new Usuario();
                        $usuario->setIdusuario($linha['idusuario']);
                        $usuario->setNome($linha['nome']);
                        $usuario->setCpf($linha['cpf']);
                        $usuario->setRg($linha['rg']);
                        $usuario->setNascimento($linha['nascimento']);
                        $usuario->setStatus($linha['status']);
                        $usuario->setEmail($linha['email']);
                        $usuario->setSenha($linha['senha']);
                        
                       
                        array_push($retorno,$usuario);
                    }
                }
                //print_r($retorno);
               return $retorno;
        }

        public function getUsuario($idusuario){
            $retorno  = NULL;
            $sql = "SELECT * FROM usuario WHERE idusuario=".$idusuario;
            $conexao  = new Conexao();
            $con = $conexao->getConnection();
            $result  = $con->query($sql);
            
            if($result->num_rows > 0 ){
               
                while($linha = $result->fetch_assoc()){
                    $usuario = new Usuario();
                  
                    $usuario->setIdusuario($linha['idusuario']);
                    $usuario->setNome($linha['nome']);
                    $usuario->setCpf($linha['cpf']);
                    $usuario->setRg($linha['rg']);
                    $usuario->setNascimento($linha['nascimento']);
                    $usuario->setStatus($linha['status']);
                    $usuario->setEmail($linha['email']);
                    $usuario->setSenha($linha['senha']);
                    
                    $retorno = $usuario;
                }
            }
            return $retorno;
    }


        public function login($email, $senha){
                $retorno  = NULL;
                $sql = "SELECT * FROM usuario WHERE `email` LIKE '{$email}' AND `senha` LIKE '{$senha}' ";
                $conexao  = new Conexao();
                $con = $conexao->getConnection();
                $result  = $con->query($sql);
                
                if(($result->num_rows) != 0 ){
                    while($linha = $result->fetch_assoc()){
                        $usuario = new Usuario();
                      
                        $usuario->setIdusuario($linha['idusuario']);
                        $usuario->setNome($linha['nome']);
                        $usuario->setCpf($linha['cpf']);
                        $usuario->setRg($linha['rg']);
                        $usuario->setNascimento($linha['nascimento']);
                        $usuario->setStatus($linha['status']);
                        $usuario->setEmail($linha['email']);
                        $usuario->setSenha($linha['senha']);
                        
                        $retorno = $usuario;
                    }
                }

                $con->close();
               return $retorno;
        }





        public function update($usuario){


               $sql= "UPDATE `usuario` SET `nome`='{$usuario->getNome()}',`email`='{$usuario->getEmail()}',
               `senha`='{$usuario->getSenha()}',`rg`='{$usuario->getRg()}',`cpf`='{$usuario->getCpf()}',
               `nascimento`='{$usuario->getNascimento()}',`status`={$usuario->getStatus()}
                WHERE `idusuario`={$usuario->getIdUsuario()}";

        
               
                $conexao  = new Conexao();
                $con = $conexao->getConnection();
               
                $result  = $con->query($sql);
                if($result == FALSE) {
                    echo "ERRO  ". $con->error;
                }
                $con->close();
                return $result;
         }
        

        public function delete($id){
            $conexao  = new Conexao();
            $con = $conexao->getConnection();
            $sql = "DELETE FROM `usuario` WHERE `idusuario` = {$id}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }





}

/*$user = new Usuario();

$user->setNome("Jose");
$user->setCpf("123");

$dao = new DaoUsuario();
$result = $dao->salvar($user);

var_dump($dao->salvar($user));

var_dump($user);

*/

?>