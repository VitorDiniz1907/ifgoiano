<?php
    session_start();
    require_once "title.php";
    require_once "./banco/daoUsuario.class.php";
    require_once "./banco/usuario.class.php";
    
    $dao = new DaoUsuario();
    $user = $dao->config(unserialize ($_SESSION['usuario'])->getId());
    
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
                        <li>&nbsp&nbsp&nbsp&nbsp&nbsp<a href='consultaMedicamento.php'><i class='material-icons'>check</i>Medicamentos</a></li>
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
                    <li>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="compras.php"><i class="material-icons ">shopping_basket</i>Minhas Compras</a></li>
                </ul>

                <ul>
                    <li>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="sair.php"><i class="material-icons ">exit_to_app</i>Sair</a></li>
                </ul>
                
            </div>

            <div class="col s12 m8 l9 card-panel">   
                <div class="row">
                    <div class="col s12">
                        <form method="POST">
                            <div class="row">
                                <div class="col s8 offset-s4">
                                    <h3>Atualizar Usuário</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s3 input-field ">
                                    <input type="text" name="nome" value="<?php echo $user->getNome();?>">
                                    <label for="nome">Nome</label>
                                </div>

                                <div class="col s3 input-field">
                                    <input type="date" class="datepicker" name="nascimento" value="<?php echo $user->getNascimento();?>">
                                    <label for="nascimento">Data de Nascimento</label>
                                </div>

                                <div class="col s3 input-field">
                                    <input type="text" name="rg" value="<?php echo $user->getRg();?>">
                                    <label for="rg">RG</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s3 input-field ">
                                    <input type="text" name="cpf" value="<?php echo $user->getCpf();?>">
                                    <label for="cpf">CPF</label>
                                </div>

                                <div class="col s3 input-field">
                                    <input type="email" name="email" value="<?php echo $user->getEmail();?>">
                                    <label for="email">E-mail</label>
                                </div>

                                <div class="col s3 input-field">
                                    <input type="password" name="password" value="<?php echo $user->getSenha();?>">
                                    <label for="password">Senha</label>
                                </div>
                            </div>
                                <div class='row'>
                                    <div class='col s4'>
                                        
                                        <?php
                                        if(($user->getStatus()) == 1){
                                            echo"<p>Acesso Administrador</p>
                                            <p>
                                                <label>
                                                    <input name='adm' value='0' type='radio'  />
                                                    <span>Não</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name='adm' value='1' type='radio' checked/>
                                                    <span>Sim</span>
                                                </label>
                                            </p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                

                            <div class="row">
                                <div class="col s4 offset-s5">
                                    <button class="btn waves-effect waves-light  blue accent-4" type="submit" name="submit" id="submit">Atualizar
                                        <i class="material-icons right">save</i>
                                      </button>
                                </div>
                            </div>

                            

                            <?php
                                if(isset($_POST['submit'])){
                                    
                                    $user->setNome($_POST['nome']);
                                    $user->setRg($_POST['rg']);
                                    $user->setCpf($_POST['cpf']);
                                    $user->setNascimento($_POST['nascimento']);
                                    $user->setEmail($_POST['email']);
                                    $user->setSenha($_POST['password']);
                                    $user->setStatus($_POST['adm']);
                                    
                                    $result = $dao->update($user);
                                    

                                    
                                        if($result){
                                            echo "<script>alert('Atualizado com Sucesso')</script>";
                                            echo "<script>window.location.href='user.php'</script>";
                                        }else{
                                            echo "<script>alert('Erro ao Atualizar Usuario')</script>";
                                        }
                                    
                                   
                                }
                            ?>

                        </form>
                    </div>
                </div>                
            </div>

        </div>
        <!--JavaScript at end of body for optimized loading-->
    </body>
</html>