<?php
    require_once "conexao.class.php";
    require_once "receita.class.php";

    class DaoReceita{
        public function insert($receita){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "INSERT INTO `receita`(`medico`, `cfm`) VALUES(?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ss", $medico, $cfm);
            $medico = $receita->getMedico();
               $cfm = $receita->getCfm();
            if($stmt->execute()){
                $id = $stmt->insert_id;
                $stmt->close();
                $con->close();
            }else{
                echo "Erro -> " . $con->error();
            }

            return $id;
        }

        public function select(){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `receita` ORDER BY `nome` ASC";
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

        public function seleciona($id){
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

        public function update($receita){
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

        public function delete($receita){
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