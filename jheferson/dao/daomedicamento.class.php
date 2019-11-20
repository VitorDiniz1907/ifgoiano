<?php
require_once "../conexao/conexao.class.php";
include_once "../models/medicamento.class.php";

class DaoMedicamento{

    public function salvar($medicamento){

        $sql="INSERT INTO medicamento ( nome, bula, quantidade, valor) 
                                    VALUES (?,?,?,?)";


        $conexao = new Conexao();
        $con = $conexao->getConnection();

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssss",$nome,$bula,$quantidade, $valor);

        $nome = $medicamento->getNome();
        $bula = $medicamento->getBula();
        $quantidade = $medicamento->getQuantidade();
        $valor = $medicamento->getValor();

        $stmt->execute();

        
        $id_salvo = $con->insert_id;
        $stmt->close();
        $con->close();
        return $id_salvo;

    }





    public function getMedicamento($idmedicamento){
        $retorno  = NULL;
        $sql = "SELECT * FROM medicamento WHERE idmedicamento=".$idmedicamento;
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
        $result  = $con->query($sql);
        
        if($result->num_rows > 0 ){
           
            while($linha = $result->fetch_assoc()){
                $medicamento = new Medicamento();
              
                $medicamento->setIdmedicamento($linha['idmedicamento']);
                $medicamento->setNome($linha['nome']);
                $medicamento->setBula($linha['bula']);
                $medicamento->setQuantidade($linha['quantidade']);
                $medicamento->setValor($linha['valor']);
                
                $retorno = $medicamento;
            }
        }
       return $retorno;
    }







    public function getAll() {//obter todos os registros de medicamentos

        $retorno  = NULL;
        $sql = "SELECT * FROM medicamento"; 
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
        $result  = $con->query($sql);
        
        if($result->num_rows > 0 ){
            $retorno = array();
            while($linha = $result->fetch_assoc()){
                $medicamento = new Medicamento();
                $medicamento->setIdMedicamento($linha['idmedicamento']);
                $medicamento->setNome($linha['nome']);
                $medicamento->setBula($linha['bula']);
                $medicamento->setQuantidade($linha['quantidade']);
                $medicamento->setValor($linha['valor']);
                
               
                array_push($retorno,$medicamento);
            }
        }
        //print_r($retorno);
       return $retorno;
    }





    public function update($medicamento){

        $sql= "UPDATE `medicamento` SET `nome`='{$medicamento->getNome()}',
        `bula`='{$medicamento->getBula()}',`quantidade`='{$medicamento->getQuantidade()}',
        `valor` = {$medicamento->getValor()}
         WHERE `idmedicamento` = {$medicamento->getIdmedicamento()}";    


       
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
       
        $result  = $con->query($sql);
        if($result == FALSE) {
            echo "ERRO  ". $con->error;
        }
        $con->close();
        return $result;
    }



    public function delete($medicamento){
        $sql = "DELETE FROM medicamento WHERE idmedicamento =".$medicamento->getIdMedicamento(); 
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