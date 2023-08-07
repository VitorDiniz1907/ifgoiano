<?php
session_start();
require_once "../class/usuario.class.php";
require_once "../dao/daoUsuario.class.php";

require_once "../class/endereco.class.php";
require_once "../dao/daoEnd.class.php";
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
            <h1 class="title has-text-ligth has-text-centered">Cadastrar Endereço</h1>
        </section>

        <main class="section container">
            <div class="columns is-centered">
                <div class="column is-8">
                    <div class="box">
                        <form method="POST">
                            <div class="field">
                                <label class="label">Logradouro</label>
                                <div class="control"><input type="text"  name="logradouro" class="input" required></div>
                            </div>
                            <div class="field">
                                <label class="label">Número</label>
                                <div class="control"><input type="text" name="num" class="input" required></div>
                            </div>
                            <div class="field">
                                <label  class="label">Complemento</label>
                                <div class="control"><input type="text" name="comp" class="input" required></div>
                            </div>
                            <div class="field">
                                <label  class="label">Bairro</label>
                                <div class="control"><input type="text" name="bairro" class="input" required></div>
                            </div>
                            <div class="field">
                                <label  class="label">Cidade</label>
                                <div class="control"><input type="text" name="cidade" class="input" required></div>
                            </div>
                            <div class="field">
                                <label  class="label">Estado</label>
                                <div class="control select">
                                    <select required name="estado">                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label  class="label">CEP</label>
                                <div class="control"><input type="text" name="cep" class="input" required></div>
                            </div>

                            


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
                                
                                $e = new Endereco();
                                $e->setLogradouro($_POST['logradouro']);
                                $e->setNumero($_POST['num']);
                                $e->setBairro($_POST['bairro']);
                                $e->setComplemento($_POST['comp']);
                                $e->setEstado($_POST['estado']);
                                $e->setCidade($_POST['cidade']);
                                $e->setCep($_POST['cep']);
                                $e->setIdUser(unserialize($_SESSION['login'])->getId());

                                $dao = new DaoEndereco();
                                $end = $dao->save($e);

                                if($end > 0){
                                    echo "<script>alert('Cadastrado com Sucesso')
                                    window.location.href='carrinho.php'</script>";
                                }else{
                                    echo "<script>alert('Erro ao Cadastrar')</script>";
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