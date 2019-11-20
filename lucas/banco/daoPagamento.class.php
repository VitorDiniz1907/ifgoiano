<?php
    require_once "conexao.class.php";
    require_once "pagamento.class.php";

    class DaoPagamento{
        public function insert($pagamento){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "INSERT INTO `pagamento`(`nome`) VALUES(?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $nome);
            $nome = $pagamento->getNome();

            if($stmt->execute()){
                $id = $stmt->insert_id;
                $stmt->close();
                $con->close();
            }else{
                echo "Erro-> " . $con->error();
            }

            return $id;
        }

        public function select(){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `pagamento` ORDER BY `nome` ASC";
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $return = array();
                while($row = $result->fetch_assoc()){
                    $pagamento = new Pagamento();
                    $pagamento->setId($row["id_pagamento"]);
                    $pagamento->setNome($row["nome"]);
                    
                    array_push($return, $pagamento);
                }
            }else{
                $return = NULL;
            }

            return $return;
        }

        public function seleciona($id){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `pagamento` WHERE `id_pagamento` = {$id}";
            $result = $con->query($sql);
            if(($result->num_rows) > 0){
                
                while($row = $result->fetch_assoc()){
                    $pagamento = new Pagamento();

                    $pagamento->setId($row["id_pagamento"]);
                    $pagamento->setNome($row["nome"]);                    
                    
                    $return = $pagamento;
                }
            }

            return $return;
        }

        public function update($pagamento){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "UPDATE `pagamento` SET `nome`= '{$pagamento->getNome()}'
            WHERE `id_pagamento` = {$pagamento->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }

        public function delete($pagamento){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "DELETE FROM `pagamento` WHERE `id_pagamento` = {$pagamento->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }
            
            return $result;
        }
    }


?>