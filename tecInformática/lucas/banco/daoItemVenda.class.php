<?php
    require_once "conexao.class.php";
    require_once "medicamento.class.php";

    class DaoItemVenda{
        public function insert($itens){
            $result = FALSE;
            try{  
                $result = NULL;          
                $conexao = new Conexao();
                $con = $conexao->connectDB();

                $sql = "INSERT INTO `item_venda`(`usuario_id_usuario`, 
                `medicamento_id_medicamento`, `pagamento_id_pagamento`, `quantidade`, 
                `valor`, `logradouro`, `bairro`, `referencia`) VALUES(?,?,?,?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("iiiissss", $user, $medicamento, $pagamento, $qnt, $valor, $logradouro, $bairro, $referencia);
                
                $user = $itens->getIdUsuario();
                $medicamento = $itens->getIdMedicamento();
                $pagamento = $itens->getIdPagamento();
                $qnt = $itens->getQuantidade();
                $valor = $itens->getValor();
                $logradouro = $itens->getEndereco();
                $bairro = $itens->getBairro();
                $referencia = $itens->getReferencia();

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
            $sql = "SELECT * FROM `item_venda` ORDER BY `nome` ASC";
            $result = $con->query($sql);
            if(($result->num_rows) > 0){
                
                while($row = $result->fetch_assoc()){
                    $item = new ItemVenda();
                    $item->setId($row['id_item']);
                    $item->setIdMedicamento($row['medicamento_id_medicamento']);
                    $item->setIdPagamento($row['pagamento_id_pagamento']);
                    $item->setIdUsuario($row['usuario_id_usuario']);
                    $item->setQuantidade($row['quantidade']);
                    $item->setValor($row['valor']);
                    $logradouro = $item->setEndereco($row['logradouro']);
                    $bairro = $item->setBairro($row['bairro']);
                    $referencia = $item->setReferencia($row['referencia']);

                    $return = $item;

                    
                }
            }

            return $return;
        }

        public function seleciona($id){
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `item_venda` WHERE `id_item` = {$id}";
            $result = $con->query($sql);
            if(($result->num_rows) > 0){
                
                while($row = $result->fetch_assoc()){
                    $item = new ItemVenda();
                    $item->setId($row['id_item']);
                    $item->setIdFarmacia($row['farmacia_id_farmacia']);
                    $item->setIdMedicamento($row['medicamento_id_medicamento']);
                    $item->setIdPagamento($row['pagamento_id_pagamento']);
                    $item->setIdReceita($row['receita_id_receita']);
                    $item->setIdUsuario($row['usuario_id_usuario']);
                    $item->setQuantidade($row['quantidade']);
                    $item->setValor($row['valor']);
                    $item->setEndereco($row['logradouro']);
                    $item->setBairro($row['bairro']);
                    $item->setReferencia($row['referencia']);

                    $return = $item;

                    
                }
            }

            return $return;
        }



    }

?>