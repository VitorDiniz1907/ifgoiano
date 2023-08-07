<?php
require_once "../conexao/conexao.class.php";
require_once "../models/intemvenda.class.php";

class DaoItemVenda{
    public function salvar($item){
        $conexao = new Conexao();
        $con = $conexao->getConnection();
        $sql = "INSERT INTO `item_venda`(`usuario_id_usuario`, `farmacia_id_farmacia`, 
            `medicamento_id_medicamento`, `pagamento_id_pagamento`, `receita_id_receita`, 
            `quantidade`, `valor`, `logradouro`, `bairro`, `cidade`, `estado`, `data`, 
            `referencia`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param("iiiiiisssssss", $usuario, $farmacia, $medicamento, $pagamento, $receita, $quantidade, 
                            $valor, $logradouro, $bairro, $cidade, $estado, $data, $referencia);
        $usuario = $item->getIdUsuario();
        $farmacia = $item->getIdFarmacia();
        $medicamento = $item->getIdMedicamento();
        $pagamento = $item->getIdPagamento();
        $receita = $item->getIdReceita();
        $quantidade = $item->getQuantidade();
        $valor = $item->getValor();
        $logradouro = $item->getLogradouro();
        $bairro = $item->getBairro();
        $cidade = $item->getCidade();
        $estado = $item->getEstado();
        $data = $item->getData();
        $referencia = $item->getReferencia();
        
        
        $stmt->execute();
        
        var_dump($item); 
        $id_salvo = $con->insert_id;
        if($id_salvo == NULL){
            mysqli_error($con);

        }else{

            return $id_salvo;
        }
        $stmt->close();
        $con->close();
    }

}
?>