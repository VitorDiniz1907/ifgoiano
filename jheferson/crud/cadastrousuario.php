<?php

include_once("../dao/daousuario.class.php");
include_once("../models/usuario.class.php");


?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 
  </head>
  <body>
   
  
  <nav class="nav nav-pills nav-justified">
    <a class=" text-light nav-item nav-link bg-secondary" href="index.php">HOME SIMPSON</a>
    <a class=" text-light nav-item nav-link bg-dark" href="cadastromedicamento.php">CADASTRAR MEDICAMENTOS</a>
    <a class=" text-light nav-item nav-link bg-success" href="cadastrofarmacia.class.php">CADASTRAR FARMACIAS</a>
    <a class=" text-light nav-item nav-link bg-danger " href="cadastrousuario.php">CADASTRAR USUARIO</a>
    <a class=" text-light nav-item nav-link bg-secondary " href="consultausuario.php">CONSULTA CLIENTE</a>
    <a class=" text-light nav-item nav-link bg-secondary " href="consultaPagamento.php">CONSULTA PAGAMENTO</a>
  </nav>                             




  <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST">
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

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">Administrador?  </label>
                                <input class="form-check-input" type="checkbox" id="status" name="status" value="1"  placeholder="Sim ou Não">  
                            </div>
                                <br><br>
                        </div>
                        <div class="form-row">
                        <!-- <p class="text-center">   -->
                            <button type="submit" name="enviar" id="enviar" class="btn btn-outline-primary center">CADASTRAR USUARIO</button>
                            <button> <a class=" text-light nav-item nav-link bg-primary " href="consultausuario.php">VIZUALIZAR USUARIOS</a></button>
                        <!-- </p> -->
                    </div>

                    
                </form>

<?php 
                if(isset($_POST['enviar'])){
                    if($_POST["status"] == NULL){
                       $status = 0;
                    }else{
                        $status = 1;
                    }

                   // como instanciar um objeto em php
                   $usuario = new Usuario();
                   $usuario->setNome($_POST["nome"]);
                   $usuario->setCpf($_POST["cpf"]);
                   $usuario->setRg($_POST["rg"]);
                   $usuario->setEmail($_POST["email"]);
                   $usuario->setSenha($_POST["senha"]);
                   $usuario->setNascimento($_POST["nascimento"]);
                   $usuario->setStatus($status);
            
                  
                   
                   $dao = new Daousuario();
                   if($dao->salvar($usuario)>0){
                       echo "<script> alert('usuario cadastrado com sucesso ') </script>";
                   }else{echo" nada cadastrado";}


                   var_dump($usuario);
                }
 ?>
                   
                









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>