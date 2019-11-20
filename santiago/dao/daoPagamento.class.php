<?php
    require_once "../class/conexao.class.php";
    require_once "../class/pagamento.class.php";

    class DaoPagamento{
        public function insere($pagamento){//Insere Forma de Pagamento
            $result = FALSE;
            try{  
                $result = NULL;
                $conexao = new Conexao();
                $con = $conexao->connectDB();
                $sql = "INSERT INTO `pagamento`(`nome`) VALUES(?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("s", $nome);
                $nome = $pagamento->getNome();
                
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

        public function selectAll(){//Busca todas as formas de pagamento
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
            }

            return $return;
        }

        public function select($id){//busca uma forma de pagamento por ID
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `pagamento` WHERE `id_pagamento` = {$id}";
            $result = $con->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $pagamento = new Pagamento();
                    $pagamento->setId($row["id_pagamento"]);
                    $pagamento->setNome($row["nome"]);

                    $return = $pagamento;
                }
            }

            return $return;
        }

        public function atualiza($pagamento){//Atualizar forma de pagamento
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

        public function deleta($pagamento){//Deletar forma de pagamento
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