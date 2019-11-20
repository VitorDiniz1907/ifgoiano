<?php
session_start();
require_once("../dao/daoEndereco.class.php");
require_once("../models/endereco.class.php");
require_once "../dao/daousuario.class.php";
require_once "../models/usuario.class.php";

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Farmácia</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form>

    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <?php
      if(isset($_SESSION['logado'])){
        echo "<button class='btn btn-outline-success my-2 my-sm-0' type='submit' href=''>
        <a class='nav-link' href='atualizarusuario.php?id=".unserialize($_SESSION['logado'])->getIdUsuario()."' tabindex='-1' aria-disabled='true'>".unserialize($_SESSION['logado'])->getNome()."</a>
        </button>
        <button class='btn btn-outline-success my-2 my-sm-0' type='submit' >
        <a class='nav-link' href='sair.php' tabindex='-1' aria-disabled='true'>SAIR</a>
        </button>";
      }else{
        echo "<button class='btn btn-outline-success my-2 my-sm-0' type='submit' href=''>
        <a class='nav-link' href='../cadastrologin/login.php' tabindex='-1' aria-disabled='true'>LOGIN</a>
        </button>
        <button class='btn btn-outline-success my-2 my-sm-0' type='submit' >
        <a class='nav-link' href='../cadastrologin/cadastro.php' tabindex='-1' aria-disabled='true'>CADASTRE-SE</a>
        </button>";
      }
    ?>
    
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >
      <a class="nav-link " href="../carrinho/carrinho.php" tabindex="-1" aria-disabled="true">CARRINHO</a>
    </button>
 
  </div>
</nav>
    
    <form method="POST">
        <div class="container">

           
                    <center><h1 class = "my-4  italic" style="color: darkblue;">Cadastro de Endereço</h1></center>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Informe o Lograouro">
                        </div>

                        <div class="for-group col-md-2">
                            <label class="num">Número</label>
                            <input class="form-control" type="text" id="num" name="num" placeholder="Número">
                        </div>

                        <div class="for-group col-md-3">
                            <label class="comp">Complemento</label>
                            <input class="form-control" type="text" id="comp" name="comp" placeholder="Complemento">
                        </div>

                        <div class="for-group col-md-3">
                            <label class="bairro">Bairro</label>
                            <input class="form-control" type="text" id="bairro" name="bairro" placeholder="Bairro">
                        </div>
                    </div>
                    <div class="form-row">


                         <div class="form-group col-md-4">
                            <label class="cidade">Cidade</label>
                        <input class="form-control" type="text" id="cidade" name="cidade" placeholder="Cidade">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Estado</label>
                            <select  class="custom-select mr-sm-2" id="estado" name="estado" required>
                                <option value="AC">Acre</option>
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

                        <div class="for-group col-md-4">
                            <label class="cep">CEP</label>
                            <input class="form-control" type="text" id="cep" name="cep" placeholder="CEP">
                        </div>
                    
                    </div>    
                        <div class="form-row">

                           
                                <br><br>
                        </div>
                        <div class="form-row">
                        <!-- <p class="text-center">   -->
                            <button type="submit" name="enviar" id="enviar" class="btn btn-outline-primary center">CADASTRAR </button>
                            
                        <!-- </p> -->
                    </div>

         </div>
         </form>
    
    <?php

if(isset($_POST['enviar'])){
    $usuario = unserialize($_SESSION['logado'])->getIdUsuario();
    //Cadastrar Endereço
    $endereco = new Endereco();
    $endereco->setLogradouro($_POST['logradouro']);
    $endereco->setNumero($_POST['num']);
    $endereco->setComplemento($_POST['comp']);
    $endereco->setCidade($_POST['cidade']);
    $endereco->setEstado($_POST['estado']);
    $endereco->setCep($_POST['cep']);
    $endereco->setIdUser($usuario);
    $endereco->setBairro($_POST['bairro']);

    $daoEnd = new DaoEndereco();
    $e = $daoEnd->salvar($endereco);

    if($e > 0){
        echo "<script>alert('Endereço Inserido com Sucesso')</script>";
        echo "<script>window.location.href='carrinho.php'</script>";
      }else{
        echo "<script>alert('erro')</script>";
      }
    
    
    var_dump($endereco);
}
?>
                   

         

   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>