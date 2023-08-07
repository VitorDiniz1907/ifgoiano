<?php
session_start();
require_once "../class/usuario.class.php";
require_once "../dao/daoUsuario.class.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bulma-0.7.5/css/bulma.min.css">
        <title>Cadastro</title>
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
                                        <a class='button is-light' href='carrinho.php'>Carrinho</a>
                                        <div class='navbar-dropdown'>
                                            <a class='navbar-item' href='atualizarUser.php?id=".unserialize($_SESSION['login'])->getId()."'>Atualizar Dados</a>
                                            <hr class='navbar-divider'>
                                            <a class='navbar-item' href='sair.php'>Sair</a>
                                        </div>
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

        <section class="hero is-dark">
            <h1 class="title has-text-ligth has-text-centered">Cadastro de Usuário</h1>
        </section>

        <main class="section container">
            <div class="columns is-centered">
                <div class="column is-8">
                    <div class="box">
                        <form method="POST">
                            <div class="field">
                                <label class="label">Nome</label>
                                <div class="control"><input type="text"  name="nome" class="input" required></div>
                            </div>
                            <div class="field">
                                <label class="label">RG</label>
                                <div class="control"><input type="text" name="rg" class="input" required></div>
                            </div>
                            <div class="field">
                                <label  class="label">CPF</label>
                                <div class="control"><input type="text" name="cpf" class="input" required></div>
                            </div>
                            <div class="field">
                                <label class="label">Data de nascimento</label>
                                <div class="control"><input type="date" name="nascimento" class="input" required></div>
                            </div>

                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control"><input type="email" name="email" class="input" required></div>
                            </div>
                            <div class="field">
                                <label class="label">Senha</label>
                                <div class="control"><input type="password" name="senha" class="input" required></div>
                            </div>

                            <?php
                                if(isset($_SESSION['login'])){
                                    if((unserialize ($_SESSION['login'])->getStatus()) == 1){
                                        echo "<div class='field'>
                                            <label class='label'>Administrador</label>
                                            <div class='control'>
                                                <label class='radio'>
                                                    <input type='radio' name='adm' value='1'>
                                                    Sim
                                                </label>
                                                <label class='radio'>
                                                    <input type='radio' name='adm' value='0' checked>
                                                    Não
                                                </label>
                                            </div>
                                        </div>";

                                    }
                                }
                            ?>


                            <div class="field">
                                <div class="control">
                                    <div class="columns">
                                        <div class="column is-narrow container">
                                            <input class="button is-success is-medium" type="submit" value="Cadastrar" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($_POST['submit'])){
                                $status = 0;
                                if(isset($_SESSION['login'])){
                                    if((unserialize ($_SESSION['login'])->getStatus()) == 1){
                                        $status = $_POST['adm'];
                                    }else{
                                        $status = 0;
                                    }
                                }
                                $u = new Usuario();
                                $u->setNome($_POST['nome']);
                                $u->setRg($_POST['rg']);
                                $u->setCpf($_POST['cpf']);
                                $u->setNascimento($_POST['nascimento']);
                                $u->setEmail($_POST['email']);
                                $u->setSenha($_POST['senha']);
                                $u->setStatus($status);
                                
                                $daoUser = new DaoUsuario();
                                $user = $daoUser->insere($u);
                                if(isset($_SESSION['login'])){
                                    if((unserialize($_SESSION['login'])->getStatus()) == 1){
                                        if($user){
                                            echo "<script>alert('Cadastrado com Sucesso')
                                            window.location.href='usuario.php'</script>";
                                        }else{
                                            echo "<script>alert('Erro ao Cadastrar Usuário')</script>";
                                        }
                                    }

                                }else{
                                    if($user){
                                        echo "<script>alert('Cadastrado com Sucesso')
                                        window.location.href='index.php'</script>";
                                    }else{
                                        echo "<script>alert('Erro ao Cadastrar Usuário')</script>";
                                    }
                                }

                            }
                            
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </main>

    </body>
</html>