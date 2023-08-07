<?php
    require_once "../class/conexao.class.php";
    require_once "../class/item_venda.class.php";

    class DaoItemVenda{
        public function insere($itens){//Insere os itens de venda
            $result = FALSE;
            try{  
                $result = NULL;          
                $conexao = new Conexao();
                $con = $conexao->connectDB();

                $sql = "INSERT INTO `item_venda`(`usuario_id_usuario`, `farmacia_id_farmacia`, 
                `medicamento_id_medicamento`, `pagamento_id_pagamento`, `receita_id_medicamento`, 
                `quantidade`, `valor`, `data`, `referencia`) VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("iiiiiisss", $user, $farmacia, $medicamento, $pagamento, $receita, 
                $qnt, $valor, $data, $referencia);
                
                $user = $itens->getIdUsuario();
                $farmacia = $itens->getIdFarmacia();
                $medicamento = $itens->getIdMedicamento();
                $pagamento = $itens->getIdPagamento();
                $receita = $itens->getIdReceita();
                $qnt = $itens->getQuantidade();
                $valor = $itens->getValor();
                $data = $itens->getData();
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

        public function selectAll(){//Busca todas as vendas
            $conexao = new Conexao();
            $con = $conexao->connectDB();
            $sql = "SELECT * FROM `item_venda`";
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
                    
                }
            }

            return $return;
        }

    }

?>