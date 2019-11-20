<?php 
 require_once("../conexao/conexao.class.php");
 require_once("../models/farmacia.class.php");


class DaoFarmacia{

    public function salvar($farmacia){
        $sql ="INSERT INTO farmacia (nome, telefone, cnpj, razaoSocial) 
                          VALUES (?,?,?,?)";

        $conexao = new Conexao();
        $con = $conexao->getConnection();

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssss",$nome,$telefone,$cnpj,$razaoSocial);


        $nome = $farmacia->getNome();
        $telefone = $farmacia->getTelefone();
        $cnpj = $farmacia->getCnpj();
        $razaoSocial = $farmacia->getRazaoSocial();

        $stmt->execute();


        $id_salvo = $con->insert_id;
        $stmt->close();
        $con->close();
        return $id_salvo;


    }







    
    public function getFarmacia($idFarmacia){
        $retorno  = NULL;
        $sql = "SELECT * FROM farmacia WHERE idfarmacia=".$idFarmacia;
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
        $result  = $con->query($sql);
        
        if($result->num_rows > 0 ){
           
            while($linha = $result->fetch_assoc()){
                $farmacia = new Farmacia();
              
                $farmacia->setIdFarmacia($linha['idfarmacia']);
                $farmacia->setNome($linha['nome']);
                $farmacia->setCnpj($linha['cnpj']);
                $farmacia->setRazaoSocial($linha['razaoSocial']);
                $farmacia->setTelefone($linha['telefone']);
                
                $retorno = $farmacia;
            }
        }
       return $retorno;
    }













    public function getAll() {//obter todos os registros de farmacias

        $retorno  = NULL;
        $sql = "SELECT * FROM farmacia"; 
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
        $result  = $con->query($sql);
        
        if($result->num_rows > 0 ){
            $retorno = array();
            while($linha = $result->fetch_assoc()){
                $farmacia = new Farmacia();
                $farmacia->setIdFarmacia($linha['idfarmacia']);
                $farmacia->setNome($linha['nome']);
                $farmacia->setCnpj($linha['cnpj']);
                $farmacia->setRazaoSocial($linha['razaoSocial']);
                $farmacia->setTelefone($linha['telefone']);
                
               
                array_push($retorno,$farmacia);
            }
        }
        //print_r($retorno);
       return $retorno;
    }










    public function update($farmacia){
        $sql = "UPDATE `farmacia` SET `nome`= '{$farmacia->getNome()}',
        `telefone`='{$farmacia->getTelefone()}',
        `cnpj`='{$farmacia->getCnpj()}',
        `razaoSocial`='{$farmacia->getRazaoSocial()}'
         WHERE `idfarmacia` = {$farmacia->getIdFarmacia()}";
        $conexao  = new Conexao();
        $con = $conexao->getConnection();
       
        $result  = $con->query($sql);
        if($result == FALSE) {
            echo "ERRO  ". $con->error;
        }
        $con->close();
        return $result;
    }





    


    public function delete($farmacia){
        $sql = "DELETE FROM farmacia WHERE idfarmacia =".$farmacia->getIdFarmacia(); 
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

// salvar produtos
// $farmacia = new Farmacia();
//     $farmacia->setNome('farmacia farma');
//     $farmacia->setTelefone(64998959695);
//     $farmacia->setCnpj(369871);
//     $farmacia->setRazaoSocial('testederazao');
 
//    // var_dump($farmacia);
//    $dao = new DaoFarmacia();
//    if ($dao->salvar($farmacia)>0) {
//        echo "<script>alert('sucesso')</script>";
//        # code...
//    }


//$farmacia = new Farmacia();
    //$farmacia->setIdFarmacia(1);
//     $farmacia->setNome('farmacia farma');
//     $farmacia->setTelefone(64998959695);
//     $farmacia->setCnpj(369871);
//     $farmacia->setRazaoSocial('testederazao');
 
//    // var_dump($farmacia);
//    $dao = new DaoFarmacia();
//    if ($dao->update($farmacia)>0) {
//        echo "<script>alert('sucesso no update')</script>";
//        # code...
//    }



   



?>