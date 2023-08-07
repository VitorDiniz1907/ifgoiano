<?php
    require_once "conexao.class.php";
    require_once "medicamento.class.php";

    class DaoMedicamento{
        public function insert($medicamento){
            $result = FALSE;
            try{  
                $result = NULL;          
                $conexao = new Conexao();
                $con = $conexao->connectDB();

                $sql = "INSERT INTO `medicamento`(`nome`, `bula`, `quantidade`, `valor`, `img`) 
                            VALUES (?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssiss", $nome, $bula, $qnt, $valor, $img);
                
                $nome = $medicamento->getNome();
                $bula = $medicamento->getBula();
                $qnt = $medicamento->getQuantidade();
                $valor = $medicamento->getValor();
                $img = $medicamento->getImg();

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
            $sql = "SELECT * FROM `medicamento` ORDER BY `nome` ASC";
            $result = $con->query($sql);
            if(($result->num_rows) > 0){
                $return = array();
                while($row = $result->fetch_assoc()){
                    $medicamento = new Medicamento();
                    
                    $medicamento->setId($row['id_medicamento']);
                    $medicamento->setNome($row['nome']);
                    $medicamento->setBula($row['bula']);
                    $medicamento->setQuantidade($row['quantidade']);
                    $medicamento->setValor($row['valor']);

                    array_push($return, $medicamento);//Add Medicamento na ultima posição do vetor   
                }
            }else{
                $return = NULL;
            }

            return $return;
        }

        public function seleciona($id){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `medicamento` WHERE `id_medicamento` = {$id}";
            $result = $con->query($sql);
            if(($result->num_rows) > 0){
                
                while($row = $result->fetch_assoc()){
                    $medicamento = new Medicamento();
                    
                    $medicamento->setId($row['id_medicamento']);
                    $medicamento->setNome($row['nome']);
                    $medicamento->setBula($row['bula']);
                    $medicamento->setQuantidade($row['quantidade']);
                    $medicamento->setValor($row['valor']);

                    $return = $medicamento;
                }
            }

            return $return;
        }

        public function update($medicamento){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "UPDATE `medicamento` SET `nome`= '{$medicamento->getNome()}',
            `bula`= '{$medicamento->getBula()}',`quantidade`= '{$medicamento->getQuantidade()}',
            `valor`= '{$medicamento->getValor()}'
            WHERE `id_medicamento` = {$medicamento->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }

        public function updateQnt($qnt, $id){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "UPDATE `medicamento` SET `quantidade`= '{$qnt}'
            WHERE `id_medicamento` = {$id}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }

        public function delete($medicamento){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "DELETE FROM `medicamento` WHERE `id_medicamento` = {$medicamento->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }


    }

?>