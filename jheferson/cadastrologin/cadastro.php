<?php

require_once("../dao/daousuario.class.php");
require_once("../models/usuario.class.php");


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

           
                    <center><h1 class = "my-4  italic" style="color: darkblue;">Cadastro de Usuário</h1></center>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe o nome do Usuário">
                        </div>

                        <div class="for-group col-md-4">
                            <label class="codigo">Cpf</label>
                            <input class="form-control" type="text" id="cpf" name="cpf" placeholder="Cpf">
                        </div>
                    </div>
                    <div class="form-row">


                         <div class="form-group col-md-4">
                            <label class="estoque">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                            <label class="estoque">Senha</label>
                        <input class="form-control" type="text" id="senha" name="senha" placeholder="">
                        </div>

                        <div class="for-group col-md-4">
                            <label class="rg">Rg</label>
                            <input class="form-control" type="text" id="rg" name="rg" placeholder="rg">
                        </div>
                   
                        
                        <div class="form-group col md-4">
                                <label class="data">Data De Nascimento</label>
                                <input class="form-control" type="date" id="nascimento" name="nascimento" >
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
    
    // como instanciar um objeto em php
    $usuario = new Usuario();
    $usuario->setNome($_POST["nome"]);
    $usuario->setCpf($_POST["cpf"]);
    $usuario->setRg($_POST["rg"]);
    $usuario->setEmail($_POST["email"]);
    $usuario->setSenha($_POST["senha"]);
    $usuario->setNascimento($_POST["nascimento"]);
    $usuario->setStatus(0);
    
    
    
    $dao = new Daousuario();
    if($dao->salvar($usuario)>0){
        echo "<script> alert('usuario cadastrado com sucesso ') 
        window.location.href='../page/index.php'</script>";
        
    }else{
        echo "nada cadastrado";
    }
    
    
    //var_dump($usuario);
}
?>
                   

         

   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>