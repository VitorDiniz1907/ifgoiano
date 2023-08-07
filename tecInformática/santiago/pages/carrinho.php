<?php
session_start();
require_once "../class/usuario.class.php";
require_once "../dao/daoUsuario.class.php";

require_once "../class/medicamento.class.php";
require_once "../dao/daoMedicamento.class.php";

require_once "../class/item_venda.class.php";
require_once "../dao/daoItemVenda.class.php";

require_once "../class/farmacia.class.php";
require_once "../dao/daoFarmacia.class.php";

require_once "../class/pagamento.class.php";
require_once "../dao/daoPagamento.class.php";

require_once "../class/endereco.class.php";
require_once "../dao/daoEnd.class.php";

require_once "../class/receita.class.php";
require_once "../dao/daoReceita.class.php";
date_default_timezone_set('America/Sao_Paulo');
$IDUSER = intval(unserialize($_SESSION['login'])->getId());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FarmaVida</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    </head>
    <body>
        <nav class="navbar is-dark " role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item text-centered" href="index.php"><strong>FarmaVida</strong></a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <?php
                            if(isset($_SESSION['login'])){
                                if(unserialize($_SESSION['login'])->getStatus() == 0){
                                    echo"<div class='navbar-item has-dropdown is-hoverable'>
                                        <a class='navbar-link'>".unserialize($_SESSION['login'])->getNome()."</a>
                                        
                                        <div class='navbar-dropdown'>
                                            <a class='navbar-item' href='atualizarUser.php?id=".unserialize($_SESSION['login'])->getId()."'>Atualizar Dados</a>
                                            <hr class='navbar-divider'>
                                            <a class='navbar-item' href='sair.php'>Sair</a>
                                        </div>
                                        <a class='button is-light' href='carrinho.php'>Carrinho</a>
                                    </div>";
                                }else{
                                    echo"<div class='navbar-item has-dropdown is-hoverable'>
                                        <a class='navbar-link'>".unserialize($_SESSION['login'])->getNome()."</a>
                                        <a class='button is-light' href='carrinho.php'>Carrinho</a>
                                        <div class='navbar-dropdown'>
                                            <a class='navbar-item' href='farmacia.php'>Consultar Farmácias</a>
                                            <a class='navbar-item' href='medicamento.php'>Consultar Medicamento</a>
                                            <a class='navbar-item' href='pagamento.php'>Consultar Formas de Pagamento</a>
                                            <a class='navbar-item' href='usuario.php'>Consultar Usuários</a>
                                            <hr class='navbar-divider'>
                                            <a class='navbar-item' href='sair.php'>Sair</a>
                                        </div>
                                    </div>";
                                }
                            }else{
                                echo "<div class='buttons'>
                                    <a class='button is-primary' href='cadastroUser.php'><strong>Cadastre-se</strong></a>
                                    <a class='button is-light' href='login.php'>Faça Login</a>
                                    <a class='button is-light' href='carrinho.php'>Carrinho</a>
                                </div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </nav>

        <table class="table is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Valor Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalCompra = 0;
                    if(isset($_GET['idArray'])){
                        $id = $_GET['idArray'];
                        unset($_SESSION['carrinho'][$id]); 
                        
                    }
                    /*if(isset($_GET['att'])){
                        if(isset($_POST['qnt'])){
                            $id = $_GET['att'];
                            $item = new ItemVenda();
                            $item->setIdMedicamento(unserialize($_SESSION['carrinho'][$id])->getIdMedicamento());
                            $item->setQuantidade($_POST['qnt']);
                            $item->setValor(unserialize($_SESSION['carrinho'][$id])->getValor());

                            array_push($_SESSION['carrinho'], serialize($item));
                            //$_SESSION['carrinho']['att'] = 
                            unset($_SESSION['carrinho'][$id]);
                            
                            //unserialize($_SESSION['carrinho'][$_GET['att']])->setQuantidade($_GET['qnt']);
                        }
                    }*/
                    foreach($_SESSION['carrinho'] as $key => $carrinho){
                        $daoMed = new DaoMedicamento();
                        $medicamento = $daoMed->select(unserialize($carrinho)->getIdMedicamento());
                        $valor = $medicamento->getValor() * unserialize($carrinho)->getQuantidade();
                        echo"<form method='POST' action='atualizaCarrinho.php'>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>{$medicamento->getNome()}</td>
                                <td><input type='number' name='qnt' id='qnt' value='".unserialize($carrinho)->getQuantidade()."' max='{$medicamento->getQuantidade()}' min='1'></td>
                                <td>".number_format($medicamento->getValor(), 2)."</td>
                                <td>".number_format($valor, 2)."</td>
                                <input type='hidden' id='MED' value='".unserialize($carrinho)->getIdMedicamento()."'>

                                <td>
                                    <a class='button' href='?idArray={$key}'>Remover</a>
                                    <button class='button' type='submit' name='atualiza'>Atualizar</button>
                                </td>
                            </tr>";

                            
                            //Na linha 138 tirar button e inserir um <a> que passa como parametro posição do vetor e quantidade a ser alterada


                        //echo $key;
                        //<a href='atualizacarrinho.php?idArray={$key}&qnt={$_POST['qnt']}'>Atualizar</a>
                        //
                        
                        // if(isset($_POST['atualiza'])){
                            //echo 5;
                            // echo "<script>window.location.href='?att={$key}&qnt={$_POST['qnt']}'</script>";
                        // }

                        $totalCompra = $totalCompra + $valor;
                    }

                    echo "</form>";
               
                ?>

            </tbody>
        </table>
        
        <div class="columns is-centered">
            <div class="column is-8">
                <label class="label">Valor Total de Itens: <?php echo number_format($totalCompra,2); ?></label>
            </div>
        </div>

            <div class="columns is-centered">
                <div class="column is-8">
                    <div class="box">
                        <form method="POST">
                            <div class="field">
                                <label class="label">Médico</label>
                                <div class="control"><input type="text"  name="medico" class="input" required></div>
                            </div>
                            <div class="field">
                                <label class="label">CFM</label>
                                <div class="control"><input type="text" name="cfm" class="input" required></div>
                            </div>
                                            <!---->

                            <div class="field">
                                <div class="control">
                                    <div class="select is-success">
                                        <select required name="pagamento">
                                            <option selected disabled value="0">Endereço</option>
                                            <?php
                                                $daoE = new DaoEndereco();
                                                $en = $daoE->getEnd($IDUSER);
                                                foreach($en as $key => $e){
                                                        
                                                    echo "<option value='{$e->getIdEnd()}'>{$e->getLogradouro()}, {$e->getNumero()}, 
                                                        {$e->getBairro()}, {$e->getComplemento()}, {$e->getCidade()}, 
                                                        {$e->getEstado()}</option>";
                                                    
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <a class="button is-warning" href="cadEnd.php">Cadastrar Endereço</a>
                                </div>
                            </div>



                            <div class="field">
                                <div class="control">
                                    <div class="select is-success">
                                    <select required name="pagamento">
                                        <option selected disabled value="0">Forma de Pagamento</option>
                                        <?php
                                            $daoPag = new DaoPagamento();
                                            $pag = $daoPag->selectAll();
                                            foreach($pag as $key => $p){
                                                echo "<option value='{$p->getId()}'>{$p->getNome()}</option>";
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="columns is-centered">
                                <div class="column is-8">
                                    <label class="label">Taxa de Entrega: 10,00</label>
                                    <label class="label">Valor Total a ser Pago: <?php echo number_format($totalCompra+10,2); ?></label>
                                </div>
                            </div>
                            

                            <div class="field">
                                <div class="control">
                                    <div class="columns">
                                        <div class="column is-narrow container">
                                            <input class="button is-success is-medium" type="submit" value="Finalizar Compra" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                if(isset($_POST['submit'])){
                                    
                                    if(isset($_SESSION['login'])){
                                        
                                        $daoR = new DaoReceita();
                                        $receita = new Receita();
                                        $receita->setMedico($_POST['medico']);
                                        $receita->setCfm($_POST['cfm']);
                                        $r = $daoR->insere($receita);
                                        if($r > 0){
                                                                                    
                                            //Usado para cadastrar itens da sessao do 
                                            //carrinho para inserir os dados enquanto tem posição do array preenchida                                        
                                            foreach($_SESSION['carrinho'] as $key => $carrinho){
                                                $valor = unserialize($carrinho)->getValor();
    
                                                $item = new ItemVenda();
                                                $daoItem = new DaoItemVenda();
    
                                                $item->setIdMedicamento(intval(unserialize($carrinho)->getIdMedicamento()));
                                                $item->setQuantidade(intval(unserialize($carrinho)->getQuantidade()));
                                                $item->setValor($valor);
                                                $item->setIdReceita($r);
                                                $item->setIdFarmacia(intval($_POST['farmacia']));
                                                $item->setIdPagamento(intval($_POST['pagamento']));
                                                $item->setIdUsuario(intval(unserialize($_SESSION['login'])->getId()));
                                                $item->setData(date('Y-m-d'));
                                                $item->setReferencia(date('ymdHi').unserialize($_SESSION['login'])->getId());
    
                                                //var_dump($item);
    
                                                $result = $daoItem->insere($item);
                                                        
                                                if($result){
                                                    $quantidade = $medicamento->getQuantidade() - unserialize($carrinho)->getQuantidade();
                                                    $quant = $daoMed->atualizaQnt($quantidade, unserialize($carrinho)->getIdMedicamento());
                                                    
                                                }else{
                                                    echo "<script>alert('Erro ao Finalizar Compra')</script>";
                                                }
                                                
                                            }
                                        }
                                        if($result){//verifica o resultado final 
                                            unset($_SESSION['carrinho']);
                                            echo "<script>alert('Compra Finalizada com Sucesso!!')
                                            window.location.href='index.php'</script>";
    
                                        }
                                    }
                                    else{
                                        echo "<script>alert('Faça Login')
                                            window.location.href='login.php</script>";
                                    }
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>