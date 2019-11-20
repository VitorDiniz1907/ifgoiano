<?php
require_once "../models/pagamento.class.php";
require_once "../conexao/conexao.class.php";
class DaoPagamento{
    public function salvar($pagamento){
        $sql = "INSERT INTO `pagamento`(`nome`) VALUES (?)";
        $conexao = new Conexao();
        $con = $conexao->getConnection();

        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $nome);


        $nome = $pagamento->getNome();
        $stmt->execute();

        $id_salvo = $con->insert_id;
        $stmt->close();
        $con->close();
        return $id_salvo;
    }

    public function getPagamento($idPagamento){
        $retorno  = NULL;
        $sql = "SELECT * FROM `pagamento` WHERE `idpagamento`=".$idPagamento;
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
        $result  = $con->query($sql);
        
        if($result->num_rows > 0 ){
           
            while($linha = $result->fetch_assoc()){
                $pagamento = new Pagamento();
              
                $pagamento->setIdPagamento($linha['idpagamento']);
                $pagamento->setNome($linha['nome']);
                
                
                $retorno = $pagamento;
            }
        }
       return $retorno;
    }

    public function getAll() {//obter todos os registros de farmacias

        $retorno  = NULL;
        $sql = "SELECT * FROM pagamento"; 
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
        $result  = $con->query($sql);
        
        if($result->num_rows > 0 ){
            $retorno = array();
            while($linha = $result->fetch_assoc()){
                $pagamento = new Pagamento();
                $pagamento->setIdPagamento($linha['idpagamento']);
                $pagamento->setNome($linha['nome']);
                
                array_push($retorno,$pagamento);
            }
        }
       return $retorno;
    }

    public function update($pagamento){
        $sql = "UPDATE `pagamento` SET `nome`= '{$pagamento->getNome()}',
        WHERE `idpagamento` = {$pagamento->getIdPagamento()}";
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
       
        $result  = $con->query($sql);
        if($result == FALSE) {
            echo "ERRO  ". $con->error;
        }
        $con->close();
        return $result;
    }

    public function delete($pagamento){
        $sql = "DELETE FROM pagamento WHERE idpagamento =".$pagamento->getIdPagamento(); 
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