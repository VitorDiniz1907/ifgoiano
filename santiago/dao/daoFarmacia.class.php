<?php
    require_once "../class/conexao.class.php";
    require_once "../class/farmacia.class.php";

    class DaoFarmacia{
        public function insere($farmacia){//Insere Farmácia
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

        public function selectAll(){//Busca Todas as Farmácias do DB
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `farmacia`";
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
                    
                    array_push($return, $farmacia);// Adiciona o OBJ na ultima posição do vetor
                }
            }

            return $return;
        }

        public function select($id){//Busca uma farmácia por ID
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

        public function atualiza($farmacia){//Atualizar dados de farmácia
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "UPDATE `farmacia` SET `nome`= '{$farmacia->getNome()}',
            `telefone`= '{$farmacia->getTelefone()}',`cnpj`= '{$farmacia->getCnpj()}',
            `razao_social`= '{$farmacia->getRazao()}'
            WHERE `id_farmacia` = {$farmacia->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }

        public function deleta($farmacia){//Apagar uma famácia
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