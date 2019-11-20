<?php
    session_start();
    require_once "title.php";
    require_once "./banco/daoUsuario.class.php";
    require_once "./banco/usuario.class.php";
    require_once "./banco/daoMedicamento.class.php";
    require_once "./banco/medicamento.class.php";
    require_once "./banco/item_venda.class.php";
    
    $dao= new DaoMedicamento();
    $result = $dao->select();

    //var_dump($result);
    
    
    
    
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
            
            $(document).ready(function(){
                $('.datepicker').datepicker();
                $('.dropdown-trigger').dropdown();
                
            });
        </script>
    </head>

    <body>

        <nav>
            <div class="nav-wrapper blue accent-4">
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
                                
                                    
                                    <table class='centered'>
                                        <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Bula</th>
                                            <th width="150">Quantidade</th>
                                            <th>Valor</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               
                                                foreach($result as $key => $medicamento){
                                                    $valor = number_format($medicamento->getValor(), 2);
                                                    $qnt=(isset($_POST['qnt']))?$_POST['qnt']:'1';
                                                    echo"<form method='POST' action='index.php'>";
                                                    echo "<tr>
                                                        <td>{$medicamento->getNome()}</td>
                                                        <td>{$medicamento->getBula()}</td>
                                                        <td><input type='number' name='qnt' min='1' max='{$medicamento->getQuantidade()}' value='1'></td>
                                                        <td>{$valor}</td>
                                                        <input type='hidden' name='medicamento' value='{$medicamento->getId()}'>
                                                        <input type='hidden' name='valor' value='{$valor}'>
                                                        <td><button class='btn waves-effect' type='submit' name='car'><i class='material-icons'>add_shopping_cart</i></button></td>
                                                    </tr>
                                                    </form>";
                                                }

                                                if(isset($_POST['car'])){
                                                    if(!isset($_SESSION['itens'])){
                                                        $_SESSION['itens'] = array();
                                                    }
                                                    //Verifica Valores inseridos dentro da função para que não tenha repetição de itens dentro da sessão
                                                    foreach($_SESSION['itens'] as $key => $value){
                                                        if(unserialize($value)->getIdMedicamento() == $_POST['medicamento']){
                                                            $far = 1;
                                                        }
                                                    }
                                                    //See não existir a variável, indere o item no carrinho normalmente
                                                    if(!isset($far)){
                                                        $i = new ItemVenda();
                                                    
                                                        $total = $_POST['qnt'] * $_POST['valor'];
                                                        
                                                        $i->setIdMedicamento($_POST['medicamento']);
                                                        $i->setValor($total);
                                                        $i->setQuantidade($_POST['qnt']);
                                                        
                                                        //var_dump($i);
                                                        array_push($_SESSION['itens'], serialize($i));
                                                    }
                                                    
                                                   
                                                    

                                                }

                                                
                                                //var_dump($_SESSION['itens']);
                                                
                                            ?>
                                        </tbody>
                                    </table>
                                
                            </div>
                        </div>     
                    </div>
                </div>
            </div>

        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>