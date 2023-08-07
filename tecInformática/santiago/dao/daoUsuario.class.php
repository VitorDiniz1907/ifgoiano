<?php
    require_once "../class/conexao.class.php";
    require_once "../class/usuario.class.php";

    class DaoUsuario{
        public function insere($user){//Insere Usuario
            $result = FALSE;
            try{  
                $result = NULL;          
                $conexao = new Conexao();
                $con = $conexao->connectDB();

                $sql = "INSERT INTO `usuario`(`nome`, `rg`, `cpf`, `nascimento`, `status`, `email`, `senha`) VALUES (?,?,?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssssssi", $nome, $rg, $cpf, $nascimento, $status, $email, $senha);
                
                $nome = $user->getNome();
                $rg = $user->getRg();
                $cpf = $user->getCpf();
                $nascimento = $user->getNascimento();
                $status = $user->getStatus();
                $email = $user->getEmail();
                $senha = $user->getSenha();

                
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

        public function selectAll(){//Busca todos os usuarios cadastrados
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `usuario`";
            $result = $con->query($sql);
            if(($result->num_rows) != 0){
                $return = array();
                while($row = $result->fetch_assoc()){
                    $user = new Usuario();
                    $user->setId($row["id_usuario"]);
                    $user->setNome($row["nome"]);
                    $user->setRg($row["rg"]);
                    $user->setCpf($row["cpf"]);
                    $user->setNascimento($row["nascimento"]);
                    $user->setStatus($row["status"]);
                    $user->setEmail($row["email"]);
                    $user->setSenha($row["senha"]);

                    array_push($return, $user);
                }
            }
            $con->close();
            return $return;
        }

        public function select($email, $senha){//Busca 1 usuario por email e senha e verifica compatibilidade de dados
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
                    $user->setNascimento($row["nascimento"]);
                    $user->setStatus($row["status"]);
                    $user->setEmail($row["email"]);
                    $user->setSenha($row["senha"]);

                    $return = $user;
                }
            }
            $con->close();
            return $return;
        }

        public function selectId($id){//Seleciona Usuario por id
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
                    $user->setNascimento($row["nascimento"]);
                    $user->setStatus($row["status"]);
                    $user->setEmail($row["email"]);
                    $user->setSenha($row["senha"]);
                    

                    $return = $user;
                }
            }
            $con->close();
            return $return;
        }

        public function atualiza($user){//atualiza usuario
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

        public function deleta($user){//deleta Usuario
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "DELETE FROM `usuario` WHERE `id_usuario` = {$user->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }


    }

?>