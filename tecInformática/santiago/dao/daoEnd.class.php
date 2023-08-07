<?php

    require_once "../class/conexao.class.php";
    require_once "../class/endereco.class.php";

    class DaoEndereco{
        public function save($end){
            $sql = "INSERT INTO `endereco`(`logradouro`, `bairro`, `numero`, `complemento`, 
            `cidade`, `estado`, `cep`, `usuario_id_usuario`) VALUES (?,?,?,?,?,?,?,?)";
            
            $conexao = new Conexao();
            $con = $conexao->connectDB();

            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssssssi", $logradouro, $bairro, $numero, $complemento, $cidade, $estado,
            $cep, $idUser);

            $logradouro = $end->getLogradouro();
            $bairro = $end->getBairro();
            $numero = $end->getNumero();
            $complemento = $end->getComplemento();
            $cidade = $end->getCidade();
            $estado = $end->getEstado();
            $cep = $end->getCep();
            $idUser = $end->getIdUser();

            $stmt->execute();

        
            $id_salvo = $con->insert_id;
            $stmt->close();
            $con->close();
            return $id_salvo;

        }

        public function getEnd($IdUser){
            $sql = "SELECT * FROM `endereco` WHERE `usuario_id_usuario` = {$IdUser}";
            
            $conexao  = new Conexao();
            $con = $conexao->connectDB();            
            $result  = $con->query($sql);

            if(($result->num_rows) > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    echo $row;
                    $end = new Endereco();

                    $end->setIdEnd($row['id_endereco']);
                    $end->setLogradouro($row['logradouro']);
                    $end->setBairro($row['bairro']);
                    $end->setNumero($row['numero']);
                    $end->setComplemento($row['complemento']);
                    $end->setCidade($row['cidade']);
                    $end->setEstado($row['estado']);
                    $end->setCep($row['cep']);
                    $end->setIdUser($row['usuario_id_usuario']);

                    array_push($retorno, $end);

                }
            }
            return $retorno;
        }

    }



?>