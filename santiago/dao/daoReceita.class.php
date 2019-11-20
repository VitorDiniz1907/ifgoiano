<?php
    require_once "../class/conexao.class.php";
    require_once "../class/receita.class.php";

    class DaoReceita{
        public function insere($receita){//Insere uma receita
            $result = 0;
            try{  
                $result = NULL;  
                $conexao = new Conexao();
                $con = $conexao->connectDB();
                $sql = "INSERT INTO `receita`(`medico`, `cfm`) VALUES(?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ss", $medico, $cfm);
                $medico = $receita->getMedico();
                $cfm = $receita->getCfm();
                if($stmt->execute()){
                    $result = $stmt->insert_id;
                }else{
                    $result = 0;
                }
                $stmt->close();
                $con->close();

            }catch(Exception $e){
                die($e->getMessage());
            }

            return $result;
        }

        public function selectAll(){//Busca todas as receitas cadastradas
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `receita`";
            $result = $con->query($sql);
            if($result->num_rows() > 0){
                $return = array();
                while($row = $result->fetch_assoc()){
                    $receita = new Receita();
                    $receita->setId($row["id_receita"]);
                    $receita->setMedico($row["medico"]);
                    $receita->setCfm($row["cfm"]);
    
                    array_push($return, $receita);
                }
            }

            return $return;
        }

        public function select($id){//Busca dados da receita pelo ID
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `receita` WHERE `id_receita` = {$id}";
            $result = $con->query($sql);
            if($result->num_rows() > 0){
                $return = array();
                while($row = $result->fetch_assoc()){
                    $receita = new Receita();
                    $receita->setId($row["id_usuario"]);
                    $receita->setMedico($row["nome"]);
                    $receita->setCfm($row["rg"]);
                    
                    array_push($return, $receita);
                }
            }

            return $return;
        }

        public function atualiza($receita){//atualiza dados da receita
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "UPDATE `receita` SET `medico`= '{$receita->getMedico()}',
            `cfm`= '{$receita->getCfm()}'
            WHERE `id_receita` = {$receita->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }

        public function deleta($receita){//Apaga receita
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "DELETE FROM `receita` WHERE `id_receita` = {$receita->getId()}";
            $result = $con->query($sql);
            if($result == FALSE){
                die ($con->error);
            }

            return $result;
        }
    }


?>