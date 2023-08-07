<?php

include_once("../dao/daomedicamento.class.php");
include_once("../models/medicamento.class.php");


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




  <form method="POST">
  <div class="container"><br><br><br>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <div class="col">
      <input type="text" class="form-control" name=" quantidade" id="quantidade" placeholder="quantidade">
    </div>
    <div class="col">
      <input type="number" class="form-control" name=" valor" id="valor" placeholder="valor">
    </div> 
  </div><br>


  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="bula" id="bula" placeholder="bula">
    </div>
   
  </div>
  </div><br><br>
  <button type="submit" name="enviar" class="btn btn-primary btn-lg">Cadastrar Medicamentos</button>
  <button> <a class=" text-light nav-item nav-link bg-primary " href="consultamedicamento.php">VIZUALIZAR MEDICAMENTOS</a></button>

</div>
</form>


<?php 
                if(isset($_POST['enviar'])){
                   // como instanciar um objeto em php
                   $medicamento = new Medicamento();
                   $medicamento->setNome($_POST["nome"]);
                   $medicamento->setQuantidade($_POST["quantidade"]);
                   $medicamento->setValor($_POST["valor"]);
                   $medicamento->setBula($_POST["bula"]);
            
                  
                   
                   $dao = new DaoMedicamento();
                   if($dao->salvar($medicamento)>0){
                       echo "<script> alert('medicamento cadastrado com sucesso ') </script>";
                   }else{echo" nada cadastrado";}


                   var_dump($medicamento);
                }
 ?>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>