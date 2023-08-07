<?php
    session_start();
    require_once "title.php";
    require_once "./banco/daoUsuario.class.php";
    require_once "./banco/usuario.class.php";

    
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
                                <div class="col s4 offset-s4">
                                    <h3>Faça seu login</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s4 offset-s4 input-field">
                                    <input type="email" name="email">
                                    <label for="email">E-mail</label>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col s4 offset-s4 input-field">
                                    <input type="password" name="password">
                                    <label for="password">Senha</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s4 offset-s5">
                                    <button class="btn waves-effect waves-light teal accent-4" type="submit" name="submit" id="submit">Entrar
                                        <i class="material-icons right">send</i>
                                      </button>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col s4 offset-s5">
                                    <a href="cadUser.php">Cadastre-se</a>
                                </div>
                            </div>

                            <?php
                                if(isset($_POST['submit'])){
                                    $dao = new DaoUsuario();
                                    $user = new Usuario();

                                    //$user->setEmail($_POST['email']);
                                    //$user->setSenha(md5($_POST['password']));
                                    
                                    $result = $dao->seleciona($_POST['email'], md5($_POST['password']));
                                    //var_dump($result);

                                    if($result == NULL){
                                        echo "<script>alert('E-Mail ou Senha INCORRETOS')</script>";
                                    }else{
                                        $_SESSION['usuario'] = serialize ($result);

                                        //var_dump ($_SESSION['usuario']);

                                        if((unserialize ($_SESSION['usuario'])->getStatus()) == 1){
                                            echo "<script>window.location.href='index.php'</script>";
                                        }else{
                                            echo "<script>window.location.href='index.php'</script>";
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