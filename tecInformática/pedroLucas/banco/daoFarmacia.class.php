<?php
    require_once "conexao.class.php";
    require_once "farmacia.class.php";

    class DaoFarmacia{
        public function insert($farmacia){
            $result = FALSE;
            try{  
                $result = NULL;          
                $conexao = new Conexao();
                $con = $conexao->connectDB();

                $sql = "INSERT INTO `farmacia`(`nome`, `telefone`, `cnpj`, `razao_social`) VALUES (?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssss", $nome, $telefone, $cnpj, $razao);

                $nome = $farmacia->getNome();
                $telefone = $farmacia->getTelefone();
                $cnpj = $farmacia->getCnpj();
                $razao = $farmacia->getRazao();
                
                

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
            $sql = "SELECT * FROM `farmacia` ORDER BY `nome` ASC";
            $result = $con->query($sql);
            if(($result->num_rows) > 0){
                $return = array();
                while($row = $result->fetch_assoc()){
                    $farmacia = new Farmacia();
                    $farmacia->setId($row['id_farmacia']);
                    $farmacia->setNome($row['nome']);
                    $farmacia->setTelefone($row['telefone']);
                    $farmacia->setCnpj($row['cnpj']);
                    $farmacia->setRazao($row['razao_social']);

                    array_push($return, $farmacia);
                                        
                }
            }

            return $return;
        }

        public function seleciona($id){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `farmacia` WHERE `id_farmacia` = {$id}";
            $result = $con->query($sql);
            if(($result->num_rows) > 0){
                
                while($row = $result->fetch_assoc()){
                    $farmacia = new Farmacia();
                    $farmacia->setId($row['id_farmacia']);
                    $farmacia->setNome($row['nome']);
                    $farmacia->setTelefone($row['telefone']);
                    $farmacia->setCnpj($row['cnpj']);
                    $farmacia->setRazao($row['razao_social']);

                    $return = $farmacia;
                                        
                }
            }

            return $return;
        }

        public function update($farmacia){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "UPDATE `farmacia` SET `nome`= '{$farmacia->getNome()}',
            `telefone`= '{$farmacia->getTelefone()}',`cnpj`= '{$farmacia->getCnpj()}',
            `razao_social`= '{$farmacia->getRazao()}'
            WHERE `id_farmacia` = ". $farmacia->getId();
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }

        public function delete($farmacia){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "DELETE FROM `farmacia` WHERE `id_farmacia` = {$farmacia->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }



    }

?>