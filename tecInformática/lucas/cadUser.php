<?php
    session_start();
    require_once "title.php";
    require_once "./banco/daoUsuario.class.php";
    require_once "./banco/usuario.class.php";
    if(isset($_SESSION['usuario'])){
        if((unserialize ($_SESSION['usuario'])->getStatus()) != 1){
            echo "<script>alert('Você não tem PERMISSÃO  de Acesso à Essa Pagina')
                window.location.href='index.php'
            </script>";
        }
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
                    <div class="col s8 offset-s2 card-panel">
                        <form method="POST">
                            <div class="row">
                                <div class="col s4 offset-s4">
                                    <h3>Cadastre-se</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s3 input-field offset-s1">
                                    <input type="text" name="nome">
                                    <label for="nome">Nome</label>
                                </div>

                                <div class="col s3 input-field">
                                    <input type="date" class="datepicker" name="nascimento">
                                    <label for="nascimento">Data de Nascimento</label>
                                </div>

                                <div class="col s3 input-field">
                                    <input type="text" name="rg">
                                    <label for="rg">RG</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s3 input-field offset-s1">
                                    <input type="text" name="cpf">
                                    <label for="cpf">CPF</label>
                                </div>

                                <div class="col s3 input-field">
                                    <input type="email" name="email">
                                    <label for="email">E-mail</label>
                                </div>

                                <div class="col s3 input-field">
                                    <input type="password" name="password">
                                    <label for="password">Senha</label>
                                </div>
                            </div>

                            <?php
                                if(isset($_SESSION['usuario'])){
                                    if((unserialize ($_SESSION['usuario'])->getStatus()) == 1){
                                        echo "<div class='row'>
                                                <div class='col s4 offset-s1'>
                                                    <p>Acesso Administrador</p>
                                                    <p>
                                                        <label>
                                                            <input name='adm' value='0' type='radio' checked />
                                                            <span>Não</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input name='adm' value='1' type='radio'/>
                                                            <span>sim</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>";
                                    }
                                }
                            ?>

                            <div class="row">
                                <div class="col s4 offset-s5">
                                    <button class="btn waves-effect waves-light blue accent-4" type="submit" name="submit" id="submit">Cadastrar
                                        <i class="material-icons right">save</i>
                                      </button>
                                </div>
                            </div>

                            

                            <?php
                                if(isset($_POST['submit'])){
                                    $status = 0;
                                    if(isset($_SESSION['usuario'])){
                                        if((unserialize ($_SESSION['usuario'])->getStatus()) == 1){
                                            $status = $_POST['adm'];
                                        }else{
                                            $status = 0;
                                        }
                                    }
                                    $dao = new DaoUsuario();
                                    $user = new Usuario();
                                    $user->setNome($_POST['nome']);
                                    $user->setRg($_POST['rg']);
                                    $user->setCpf($_POST['cpf']);
                                    $user->setNascimento($_POST['nascimento']);
                                    $user->setEmail($_POST['email']);
                                    $user->setSenha($_POST['password']);
                                    $user->setStatus($status);
                                    
                                    $result = $dao->insert($user);
                                    
                                    if(isset($_SESSION['usuario'])){
                                        if((unserialize ($_SESSION['usuario'])->getStatus()) == 1){
                                            if($result){
                                                echo "<script>alert('Cadastrado com Sucesso')</script>";
                                                echo "<script>window.location.href='consultaUser.php'</script>";
                                            }else{
                                                echo "<script>alert('Erro ao Cadastrar Usuario')</script>";
                                            }
                                        }else{
                                            if($result){
                                                echo "<script>alert('Cadastrado com Sucesso')</script>";
                                                echo "<script>window.location.href='index.php'</script>";
                                            }else{
                                                echo "<script>alert('Erro ao Cadastrar Usuario')</script>";
                                            }
                                        }
                                    }else{
                                        if($result){
                                            echo "<script>alert('Cadastrado com Sucesso')</script>";
                                            echo "<script>window.location.href='index.php'</script>";
                                        }else{
                                            echo "<script>alert('Erro ao Cadastrar Usuario')</script>";
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