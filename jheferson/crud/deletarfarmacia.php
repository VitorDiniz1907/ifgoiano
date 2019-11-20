
<?php
     require_once "../dao/daofarmacia.class.php";
     require_once "../models/farmacia.class.php";
$idFarmacia = NULL; 
   if(isset($_GET['idFarmacia'])){
        //echo $_GET['id'];   
        $dao = new DaoFarmacia();
        $idFarmacia  = $dao->getfarmacia($_GET['idFarmacia']);
    }
    //var_dump($idFarmacia);
    
?>



<!doctype html>
<html lang="pt-br">
 
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
      <input readonly value="<?php  echo $idFarmacia->getNome(); ?>" type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <div class="col">
      <input readonly value="<?php echo $idFarmacia->getTelefone();?>" type="text" class="form-control" name=" telefone" id="telefone" placeholder="telefone">
    </div>
  </div><br>


  <div class="row">
    <div class="col">
      <input readonly value="<?php echo $idFarmacia->getCnpj();?>"  type="text" class="form-control" name="cnpj" id="cnpj" placeholder="Cnpj">
    </div>
    <div class="col">
      <input readonly value="<?php echo $idFarmacia->getRazaoSocial();?>" type="text" class="form-control" name="razaoSocial" id="razaoSocial" placeholder="Razão Social">
    </div>
  </div>
  </div><br><br>
  <button type="submit" name="enviar" class="btn btn-primary btn-lg">Deletar</button>
  <button> <a class=" text-light nav-item nav-link bg-primary " href="consultaFarmacia.class.php">VIZUALIZAR FARMACIA</a></button>

</div>
</form>
                <?php
                if(isset($_POST['enviar'])){
                    //como instarciar um objeto em php
                  
                    
                    $dao = new Daofarmacia();
                    if($dao->delete($idFarmacia)==TRUE){
                        echo "<script> alert('farmacia deletada com sucesso ')</script>";
                        echo "<script> window.location.href='consultafarmacia.class.php'</script> ";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>