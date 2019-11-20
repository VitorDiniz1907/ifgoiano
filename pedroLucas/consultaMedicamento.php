<?php
    session_start();
    require_once "title.php";
    require_once "./banco/usuario.class.php";
    require_once "./banco/daoMedicamento.class.php";
    require_once "./banco/medicamento.class.php";
    if((unserialize ($_SESSION['usuario'])->getStatus()) != 1){
        echo "<script>alert('Você não tem PERMISSÃO  de Acesso à Essa Pagina')
            window.location.href='index.php'
        </script>";
    }
  
?>
<!DOCTYPE html>
<html lang="pt-br">
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
                // Or with jQuery
                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('.dropdown-trigger');
                    var instances = M.Dropdown.init(elems, options);
                });
                $(document).ready(function(){
                    $('.dropdown-trigger').dropdown();
                    $('.collapsible').collapsible();
                });
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
                                <li> <a href='user.php'>".unserialize ($_SESSION['usuario'])->getNome()."</a></li>
                                <li><a href='carrinho.php'><i class='material-icons'>shopping_cart</i></a></li>
                            </ul>";
                    }
                ?>
            </div>
        </nav>

        <div class="row">

            <div class="col s12 m4 l2 card-panel">
                <?php
                if((unserialize ($_SESSION['usuario'])->getStatus()) == 1){
                    echo "<ul>
                        <li>&nbsp&nbsp&nbsp&nbsp&nbsp<a href='consultaUser.php'><i class='material-icons'>check</i>Usuários</a></li>
                    </ul>
                    <ul>
                        <li>&nbsp&nbsp&nbsp&nbsp&nbsp<a href='consultaFarmacia.php'><i class='material-icons'>check</i>Unidades de negócio</a></li>
                    </ul>
                    <ul>
                        <li>&nbsp&nbsp&nbsp&nbsp&nbsp<a href='consultaMedicamento.php'><i class='material-icons'>check</i>Produtos</a></li>
                    </ul>
                    <ul>
                        <li>&nbsp&nbsp&nbsp&nbsp&nbsp<a href='consultaPag.php'><i class='material-icons'>check</i>Pagamentos</a></li>
                    </ul>";
                }else{
                    echo "<ul>
                        <li>&nbsp&nbsp&nbsp&nbsp&nbsp<a href='minhasCompras.php'><i class='material-icons'>check</i>Minhas Compras</a></li>
                    </ul>";
                }
                ?>
                <ul>
                    <li>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="sair.php"><i class="material-icons ">exit_to_app</i>Sair</a></li>
                    </ul>
                
            </div>

            <div class="col s12 m8 l10"> 
                <div class="row">
                    <div class="col s12">
                        <table class="striped highlight centered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Resumo</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $dao= new DaoMedicamento();
                                $result = $dao->select();
                                if($result != NULL){
                                    foreach($result as $key => $medicamento){
                                        $valor = number_format($medicamento->getValor(), 2);
                                        echo "<tr>
                                                <td>{$medicamento->getNome()}</td>
                                                <td>{$medicamento->getBula()}</td>
                                                <td>{$medicamento->getQuantidade()}</td>
                                                <td>{$valor}</td>
                                                
                                                <td>
                                                    <a href='atualizaMedicamento.php?id={$medicamento->getId()}'><i class='material-icons'>update</i></a>
                                                    <a href='deletaMedicamento.php?id={$medicamento->getId()}'><i class='material-icons'>delete</i></a>
                                                </td>
                                            </tr>";
                                    }

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <a class="btn-floating btn-large waves-effect waves-light teal accent-4 right" href="cadMedicamento.php"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>

        </div>
        <!--JavaScript at end of body for optimized loading-->
    </body>
</html>