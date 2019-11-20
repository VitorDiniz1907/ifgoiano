<?php
require_once "../models/receita.class.php";
require_once "../conexao/conexao.class.php";
class DaoReceita{
    public function salvar($receita){
        $sql = "INSERT INTO `receita`(`medico`, `cfm`) VALUES (?,?)";
        $conexao = new Conexao();
        $con = $conexao->getConnection();

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $medico, $cfm);


        $medico = $receita->getMedico();
        $cfm = $receita->getCmf();

        $stmt->execute();

        $id_salvo = $con->insert_id;
        $stmt->close();
        $con->close();
        return $id_salvo;
    }

    public function getAll() {//obter todos os registros

        $retorno  = NULL;
        $sql = "SELECT * FROM receita"; 
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
        $result  = $con->query($sql);
        
        if($result->num_rows > 0 ){
            $retorno = array();
            while($linha = $result->fetch_assoc()){
                $receita = new Receita();
                $receita->setIdReceita($linha['idreceita']);
                $receita->setMedico($linha['nome']);
                $receita->setCfm($linha['cfm']);
                
                array_push($retorno,$receita);
            }
        }
       return $retorno;
    }

    public function update($receita){
        $sql = "UPDATE `receita` SET `medico`= '{$receita->getMedico()}', 
        `cfm`= '{$receita->getCfm()}' WHERE `idreceita` = {$receita->getIdReceita()}";
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
       
        $result  = $con->query($sql);
        if($result == FALSE) {
            echo "ERRO  ". $con->error;
        }
        $con->close();
        return $result;
    }

    public function delete($receita){
        $sql = "DELETE FROM receita WHERE idreceita =".$receita->getIdReceita(); 
        $resultado = FALSE; 
        $conexao = new Conexao();
        $con  = $conexao->getConnection();
        if($con->query($sql) == TRUE){
            $resultado = TRUE;
        }else{
            die("erro  ".$con->error);
        }
        return $resultado;
    }
}

?>