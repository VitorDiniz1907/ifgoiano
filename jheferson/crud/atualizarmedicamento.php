<?php

include_once("../dao/daomedicamento.class.php");
include_once("../models/medicamento.class.php");

$idmedicamento = NULL; 
   if(isset($_GET['idmedicamento'])){
       // echo $_GET['id'];   
        $dao = new DaoMedicamento();
        $idmedicamento  = $dao->getMedicamento($_GET['idmedicamento']);
    }
    //var_dump($idFarmacia);


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
      <input value="<?php echo $idmedicamento->getNome();?>"  type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <div class="col">
      <input value="<?php  echo $idmedicamento->getValor(); ?>" type="text" class="form-control" name=" valor" id="valor" placeholder="valor">
    </div>
    <div class="col">
      <input value="<?php  echo $idmedicamento->getQuantidade(); ?>" type="text" class="form-control" name=" quantidade" id="quantidade" placeholder="quantidade">
    </div>
  </div><br>


  <div class="row">
    <div class="col">
      <input value="<?php echo $idmedicamento->getBula(); ?>" type="text" class="form-control" name="bula" id="bula" placeholder="bula">
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
                   $m = new Medicamento();
                   $m->setIdmedicamento($_GET['idmedicamento']);
                   $m->setNome($_POST["nome"]);
                   $m->setQuantidade($_POST["quantidade"]);
                   $m->setValor($_POST["valor"]);
                   $m->setBula($_POST["bula"]);
            
                  
                   
                   $dao = new DaoMedicamento();
                   if($dao->update($m)>0){
                       echo "<script> alert('medicamento atualizado com sucesso ') </script>";
                       echo "<script> window.location.href='consultamedicamento.php'</script> ";
                   }else{echo" nada atualizado";}


                   var_dump($m);
                }
 ?>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>