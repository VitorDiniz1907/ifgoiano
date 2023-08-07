<?php
    require_once "conexao.class.php";
    require_once "usuario.class.php";

    class DaoUsuario{
        public function insert($user){
            $result = FALSE;
            try{  
                $result = NULL;          
                $conexao = new Conexao();
                $con = $conexao->connectDB();

                $sql = "INSERT INTO `usuario`(`nome`, `rg`, `cpf`, `nascimento`, `email`,
                 `senha`, `status`) VALUES (?,?,?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssssssi", $nome, $rg, $cpf, $nascimento, $email, $senha, $status);
                
                $nome = $user->getNome();
                $rg = $user->getRg();
                $cpf = $user->getCpf();
                $nascimento = $user->getNascimento();
                $email = $user->getEmail();
                $senha = $user->getSenha();
                $status = $user->getStatus();

                if($stmt->execute()){
                    $result = TRUE;
                }else{
                    $result = FALSE;
                }
                $stmt->close();
                $con->close();

            }catch(Exception $e){
                die($e->getMessage());
            }

            return $result;

        }

        public function select(){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `usuario` ORDER BY `nome` ASC";
            $result = $con->query($sql);
            if(($result->num_rows) != 0){
                $return = array();
                while($row = $result->fetch_assoc()){
                    $user = new Usuario();
                    $user->setId($row["id_usuario"]);
                    $user->setNome($row["nome"]);
                    $user->setRg($row["rg"]);
                    $user->setCpf($row["cpf"]);
                    $user->setEmail($row["email"]);
                    $user->setSenha($row["senha"]);
                    $user->setNascimento($row["nascimento"]);
                    $user->setStatus($row["status"]);

                    array_push($return, $user);//Add User na ultima posição do vetor    
                }
            }
            $con->close();
            return $return;
        }

        public function seleciona($email, $senha){
            $return = NULL;
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `usuario` WHERE `email` LIKE '{$email}' AND `senha` LIKE '{$senha}'";
            $result = $con->query($sql);
            if(($result->num_rows) != 0){
                
                while($row = $result->fetch_assoc()){
                    $user = new Usuario();
                    $user->setId($row["id_usuario"]);
                    $user->setNome($row["nome"]);
                    $user->setRg($row["rg"]);
                    $user->setCpf($row["cpf"]);
                    $user->setEmail($row["email"]);
                    $user->setSenha($row["senha"]);
                    $user->setNascimento($row["nascimento"]);
                    $user->setStatus($row["status"]);

                    $return = $user;    
                }
            }
            $con->close();
            return $return;
        }

        public function config($id){
            $return = NULL;
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `usuario` WHERE `id_usuario` = {$id}";
            $result = $con->query($sql);
            if(($result->num_rows) != 0){
                
                while($row = $result->fetch_assoc()){
                    $user = new Usuario();
                    $user->setId($row["id_usuario"]);
                    $user->setNome($row["nome"]);
                    $user->setRg($row["rg"]);
                    $user->setCpf($row["cpf"]);
                    $user->setEmail($row["email"]);
                    $user->setSenha($row["senha"]);
                    $user->setNascimento($row["nascimento"]);
                    $user->setStatus($row["status"]);

                    $return = $user;    
                }
            }
            $con->close();
            return $return;
        }

        public function update($user){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "UPDATE `usuario` SET `nome`= '{$user->getNome()}',
            `rg`= '{$user->getRg()}',`cpf`= '{$user->getCpf()}',
            `nascimento`= '{$user->getNascimento()}',
            `status`= '{$user->getStatus()}' 
            WHERE `id_usuario` = {$user->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }

        public function delete($id){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "DELETE FROM `usuario` WHERE `id_usuario` = {$id}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }


    }

?>