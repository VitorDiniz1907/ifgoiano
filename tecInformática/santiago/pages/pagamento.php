<?php
session_start();
require_once "../class/usuario.class.php";
require_once "../dao/daoUsuario.class.php";

require_once "../class/pagamento.class.php";
require_once "../dao/daoPagamento.class.php";

require_once "../class/item_venda.class.php";
require_once "../dao/daoItemVenda.class.php";
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

        <table class="table is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nome</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $daoPag = new DaoPagamento();
                    $pagamento = $daoPag->selectAll();
                    if($pagamento != NULL){
                        foreach($pagamento as $key => $p){
                            
                            echo"<form method='POST'>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{$p->getNome()}</td>
                                    <td>
                                        <button class='button'><a href='atualizaPag.php?id=".$p->getId()."'>Atualizar</a></button>
                                        <button class='button'><a href='deletaPag.php?id=".$p->getId()."'>Deletar</a></button>
                                    </td>
                                </tr>
                            </form>";
                            
                        }
                    }
                ?>

               
            </tbody>
        </table>
        <a class="button is-success is-rounded" href="cadastrarPagamento.php">Adicionar Forma de Pagamento</a>
    </body>
</html>