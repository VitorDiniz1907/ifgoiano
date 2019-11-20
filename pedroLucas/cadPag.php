<?php
    session_start();
    require_once "title.php";
    require_once "./banco/daoPagamento.class.php";
    require_once "./banco/usuario.class.php";
    require_once "./banco/pagamento.class.php";
    if((unserialize ($_SESSION['usuario'])->getStatus()) != 1){
        echo "<script>alert('Você não tem PERMISSÃO  de Acesso à Essa Pagina')
            window.location.href='index.php'
        </script>";
    }
    
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

            // Or with jQuery
            format
            $(document).ready(function(){
                $('.datepicker').datepicker();
                
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
                    <div class="col s8 offset-s2 card-panel">
                        <form method="POST">
                            <div class="row">
                                <div class="col s8 offset-s3">
                                    <h3>Forma de pagamento</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s8 input-field offset-s2">
                                    <input type="text" name="nome">
                                    <label for="nome">Nome</label>
                                </div>
                            </div>

                            

                            <div class="row">
                                <div class="col s4 offset-s5">
                                    <button class="btn waves-effect waves-light teal accent-4" type="submit" name="submit" id="submit">Cadastrar
                                        <i class="material-icons right">save</i>
                                      </button>
                                </div>
                            </div>

                            

                            <?php
                                if(isset($_POST['submit'])){
                                    $dao = new DaoPagamento();
                                    $farmacia = new Pagamento();
                                    $farmacia->setNome($_POST['nome']);
                                    
                                    $result = $dao->insert($farmacia);
                                    

                                    if((unserialize ($_SESSION['usuario'])->getStatus()) == 1){
                                        if($result){
                                            echo "<script>alert('Cadastrada com Sucesso')</script>";
                                            echo "<script>window.location.href='consultaPag.php'</script>";
                                        }else{
                                            echo "<script>alert('Erro ao Cadastrar Farmacia')</script>";
                                        }
                                    }
                                   
                                }
                            ?>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        
    </body>
</html>