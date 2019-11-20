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

                $sql = "INSERT INTO `item_venda`(`usuario_id_usuario`, `farmacia_id_farmacia`, 
                `medicamento_id_medicamento`, `pagamento_id_pagamento`,`receita_id_receita`, 
                `quantidade`, `valor`) VALUES (?,?,?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("iiiiiis", $user, $farmacia, $medicamento, $pagamento, $receita, $qnt, $valor);
                
                $user = $itens->getIdUsuario();
                $farmacia = $itens->getIdFarmacia();
                $medicamento = $itens->getIdMedicamento();
                $pagamento = $itens->getIdPagamento();
                $receita = $itens->getIdReceita();
                $qnt = $itens->getQuantidade();
                $valor = $itens->getValor();

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
                    $item->setIdFarmacia($row['farmacia_id_farmacia']);
                    $item->setIdMedicamento($row['medicamento_id_medicamento']);
                    $item->setIdPagamento($row['pagamento_id_pagamento']);
                    $item->setIdReceita($row['receita_id_receita']);
                    $item->setIdUsuario($row['usuario_id_usuario']);
                    $item->setQuantidade($row['quantidade']);
                    $item->setValor($row['valor']);

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

                    $return = $item;

                    
                }
            }

            return $return;
        }



    }

?>