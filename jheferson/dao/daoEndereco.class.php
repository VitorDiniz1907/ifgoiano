<?php
    
    require_once("../conexao/conexao.class.php");
    require_once("../models/endereco.class.php");

    class DaoEndereco{
        public function salvar($end){

            $sql = "INSERT INTO `endereco`(`logradouro`, `numero`, `complemento`, `cidade`, 
            `estado`, `cep`, `usuario_idusuario`, bairro) VALUES (?,?,?,?,?,?,?,?)";

            $conexao = new Conexao();
            $con = $conexao->getConnection();

            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssssis", $logradouro, $numero, $complemento, $cidade, $estado, $cep, $user, $bairro);

            $logradouro = $end->getLogradouro();
            $numero = $end->getNumero();
            $complemento = $end->getComplemento();
            $cidade = $end->getCidade();
            $estado = $end->getEstado();
            $cep = $end->getCep();
            $user = $end->getIdUser();
            $bairro = $end->getBairro();

            $stmt->execute();

            $id_salvo = $con->insert_id;
            $stmt->close();
            $con->close();
            return $id_salvo;

        }

        public function consultaEnd($user){
            $retorno  = NULL;
            $sql   = "SELECT * FROM `endereco` WHERE `usuario_idusuario` = {$user}";
            $conexao  = new Conexao();
            $con = $conexao->getConnection();
            $result  = $con->query($sql);
            
            if($result->num_rows > 0 ){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $endereco = new Endereco();

                    $endereco->setIdEndereco($row['id_endereco']);
                    $endereco->setLogradouro($row['logradouro']);
                    $endereco->setNumero($row['numero']);
                    $endereco->setComplemento($row['complemento']);
                    $endereco->setCidade($row['cidade']);
                    $endereco->setEstado($row['estado']);
                    $endereco->setCep($row['cep']);
                    $endereco->setIdUser($row['usuario_idusuario']);
                    $endereco->setBairro($row['bairro']);

                    array_push($retorno,$endereco);
                }
            }
            return $retorno;
        }
    }





?>