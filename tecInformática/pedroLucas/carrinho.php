<?php
    session_start();
    require_once "title.php";
    require_once "./banco/daoUsuario.class.php";
    require_once "./banco/usuario.class.php";

    require_once "./banco/daoMedicamento.class.php";
    require_once "./banco/medicamento.class.php";

    require_once "./banco/item_venda.class.php";
    require_once "./banco/daoItemVenda.class.php";

    require_once "./banco/daoPagamento.class.php";
    require_once "./banco/pagamento.class.php";

    require_once "./banco/daoFarmacia.class.php";
    require_once "./banco/farmacia.class.php";

    require_once "./banco/daoReceita.class.php";
    require_once "./banco/receita.class.php";
    
?>
<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?php echo title(); ?></title>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js">
            //Datepicker
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.datepicker');
                var instances = M.Datepicker.init(elems, options);
                
            });

            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.dropdown-trigger');
                var instances = M.Dropdown.init(elems, options);
            });

            // Or with jQuery


            // Or with jQuery
            
            
        </script>
    </head>

    <body>

        <nav>
            <div class="nav-wrapper teal accent-4">
                <a href="index.php" class="brand-logo center"> <?php echo title();?></a>
                <?php
                    if(!isset($_SESSION['usuario'])){
                        echo "<ul id='nav-mobile' class='right hide-on-med-and-down'>
                            <li><a href='login.php'>Faça Login</a></li>
                            <li> ou </li>
                            <li><a href='cadUser.php'>Cadastre-se</a></li>
                            
                            <li><a href='carrinho.php'><i class='material-icons'>shopping_cart</i></a></li>
                        </ul>";
                    }else{
                        echo "<ul id='nav-mobile' class='right hide-on-med-and-down'>
                            <li> <a href='user.php'>".unserialize($_SESSION['usuario'])->getNome()."</a></li>
                            <li><a href='carrinho.php'><i class='material-icons'>shopping_cart</i></a></li>
                        </ul>";
                    }
                ?>
            </div>
        </nav>

        <div class="row">
            <div class="col s12 m12 l12">                
                <div class="row">
                    <div class="col s10 offset-s1">
                        <div class='row'>
                            <div class='col s12 m12 '>
                                <!--<form method="POST" action="carrinho.php">-->
                                    <h4 class="center">Carrinho de Compras</h4>
                                    <table class='centered striped highlight responsive-table'>
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th width="150">Quantidade</th>
                                                <th>Valor</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
                                                if(isset($_SESSION['itens'])){
                                                    if(isset($_GET['idMed'])){
                                                        unset($_SESSION['itens'][$_GET['idMed']]);
                                                        
                                                    }
                                                    foreach ($_SESSION['itens'] as $key => $value) {
                                                        echo"<form method='POST' action='carrinho.php'>";
                                                        
                                                        $daoMedicamento = new DaoMedicamento();
                                                        $medicamento = $daoMedicamento->seleciona(unserialize($value)->getIdMedicamento());
                                                        $valor = number_format(unserialize($value)->getValor(), 2);
                                                        $qnt = unserialize($value)->getQuantidade();
                                                        
                                                        
                                                        echo"<tr>
                                                        <td>{$medicamento->getNome()}</td>
                                                        <td>{$qnt}</td>
                                                        <td>{$valor}</td>
                                                        <td><a class=' btn blue accent-4' href='?idMed={$key}'><i class='material-icons'> delete </i></a></td>
                                                        </tr>
                                                        </form>";
                                                        
                                                    }
                                                        
                                                }
                                                //if(isset($_POST['del'])){
                                                    
                                                //}
                                                

                                                
                                                ?>
                                        </tbody>
                                    </table>

                                
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="row"></div>
                        <div class="row"></div>
                            <div class="col s12 m12">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col s4 input-field offset-s2">
                                            <input type="text" name="medico" required>
                                            <label for="medico">Quem irá receber a mercadoria?</label>
                                        </div>

                                        <div class="col s4 input-field">
                                            <input type="text" name="cfm" required>
                                            <label for="cfm">Observações:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s4 offset-s2">
                                            <select class="browser-default" name="pag" required>
                                                <option value="" disabled selected>Forma de pagamento</option>
                                                <?php
                                                    $daoP = new DaoPagamento();
                                                    $result = $daoP->select();
                                                    foreach($result as $key => $p){
                                                        echo "<option value='{$p->getId()}'>{$p->getNome()}</option>";
                                                    }
                                                    
                                                    
                                                ?>
                                            </select>
                                        </div>

                                        <div class="input-field col s4 ">
                                            <select class="browser-default" name="farma" required>
                                                <option value="" disabled selected>Selecione a unidade(loja)</option>
                                                <?php
                                                    $daoF = new DaoFarmacia();
                                                    $result = $daoF->select();
                                                    foreach($result as $key => $f){
                                                        echo "<option value='{$f->getId()}'>{$f->getNome()}</option>";
                                                    }
                                                    
                                                    
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s4 offset-s5">
                                            <button class="btn waves-effect teal accent-4" type="submit" name="finaliza">Finalizar Compra<i class="material-icons">shopping_cart</i></button>
                                        </div>
                                    </div>
                                    <?php
                                        if(isset($_POST['finaliza'])){
                                            if(!isset($_SESSION['usuario'])){
                                                echo "<script>alert('Faça Login')
                                                    window.location.href='login.php</script>";
                                            }else{
                                                $receita = new Receita();
                                                $receita->setMedico($_POST['medico']);
                                                $receita->setCfm($_POST['cfm']);

                                                $daoR = new DaoReceita();
                                                $r = $daoR->insert($receita);
                                                                                                
                                                foreach ($_SESSION['itens'] as $key => $value) {
                                                    $idMed = unserialize($value)->getIdMedicamento();
                                                    $idUser = unserialize($_SESSION['usuario'])->getId();
                                                    $valor = unserialize($value)->getValor();
                                                    $qnt = unserialize($value)->getQuantidade();

                                                    $item = new ItemVenda();
                                                    $item->setIdFarmacia($_POST['farma']);
                                                    $item->setIdMedicamento($idMed);
                                                    $item->setIdPagamento($_POST['pag']);
                                                    $item->setIdReceita($r);
                                                    $item->setIdUsuario($idUser);
                                                    $item->setQuantidade($qnt);
                                                    $item->setValor($valor);

                                                    $daoItem = new DaoItemVenda();
                                                    $result = $daoItem->insert($item);
                                                    
                                                    if($result){
                                                        $quantidade = $medicamento->getQuantidade() - $qnt;
                                                        $quant = $daoMedicamento->updateQnt($quantidade, $idMed);
                                                        unset($_SESSION['itens']);
                                                        echo "<script>alert('Compra Finalizada com Sucesso!!')
                                                        window.location.href='index.php'</script>";
                                                    }else{
                                                        echo "<script>alert('Erro ao Finalizar Compra')</script>";
                                                    }
                                                    
                                                    
                                                }

                                            }
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>

        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js">
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, options);
            });
        </script>
    </body>
</html>