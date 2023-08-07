<?php
    require_once "../class/conexao.class.php";
    require_once "../class/medicamento.class.php";

    class DaoMedicamento{
        public function insere($medicamento){//Insere Medicamentos
            $result = FALSE;
            try{  
                $result = NULL;          
                $conexao = new Conexao();
                $con = $conexao->connectDB();

                $sql = "INSERT INTO `medicamento`(`nome`, `bula`, `quantidade`, `valor`, `status`) 
                            VALUES (?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssisi", $nome, $bula, $qnt, $valor, $status);
                
                $nome = $medicamento->getNome();
                $bula = $medicamento->getBula();
                $qnt = $medicamento->getQuantidade();
                $valor = $medicamento->getValor();
                $status = 1;

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

        public function selectAll(){//Buscar todos os medicamentos
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
                    $medicamento->setStatus($row['status']);

                    array_push($return, $medicamento);
                }
            }

            return $return;
        }

        public function selectAllok(){//Buscar todos os medicamentos disponíveis
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `medicamento` WHERE `` ORDER BY `nome` ASC";
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
                    $medicamento->setStatus($row['status']);

                    array_push($return, $medicamento);
                }
            }

            return $return;
        }

        public function select($id){//Busca um medicamento por ID
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
                    $medicamento->setStatus($row['status']);

                    $return = $medicamento;
                }
            }

            return $return;
        }

        public function atualiza($medicamento){//Atualizar um medicamento
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "UPDATE `medicamento` SET `nome`= '{$medicamento->getNome()}',
            `bula`= '{$medicamento->getBula()}',`quantidade`= '{$medicamento->getQuantidade()}',
            `valor`= '{$medicamento->getValor()}', `status` = '{$medicamento->getStatus()}'
            WHERE `id_medicamento` = {$medicamento->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }

        public function atualizaQnt($qnt, $id){//Função criada para alterar a quantidade atual no DB do medicamento
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

        public function deleta($medicamento){//Apagar medicamento
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "UPDATE `medicamento` SET `status`= 0
            WHERE `id_medicamento` = {$medicamento->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }


    }

?>