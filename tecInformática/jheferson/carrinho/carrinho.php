<?php
session_start();
// var_dump($_SESSION['carrinho']);
// exit;

    require_once "../dao/daousuario.class.php";
    require_once "../models/usuario.class.php";

    require_once "../dao/daomedicamento.class.php";
    require_once "../models/medicamento.class.php";

    require_once "../models/intemvenda.class.php";
    require_once "../dao/daoItemVenda.class.php";

    require_once "../dao/daopagamento.class.php";
    require_once "../models/pagamento.class.php";

    require_once "../dao/daofarmacia.class.php";
    require_once "../models/farmacia.class.php";

    require_once "../dao/daoreceita.class.php";
    require_once "../models/receita.class.php";

    require_once "../dao/daoEndereco.class.php";
    require_once "../models/endereco.class.php";


    date_default_timezone_set('America/Sao_Paulo');
    //echo date('dmYHi');
    

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
        <a class="nav-link" href="../page/index.php">Home <span class="sr-only">(current)</span></a>
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
        <a class='nav-link' href='../page/atualizarusuario.php?id=".unserialize($_SESSION['logado'])->getIdUsuario()."' tabindex='-1' aria-disabled='true'>".unserialize($_SESSION['logado'])->getNome()."</a>
        </button>
        <button class='btn btn-outline-success my-2 my-sm-0' type='submit' >
        <a class='nav-link' href='../page/sair.php' tabindex='-1' aria-disabled='true'>SAIR</a>
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
      <a class="nav-link " href="carrinho.php" tabindex="-1" aria-disabled="true">CARRINHO</a>
    </button>
 
  </div>
</nav>
 

<div class="container">

  <form method="POST">
  <center><h1 class = "my-4  italic" style="color: darkblue;">CARRINHO DE COMPRAS</h1></center>

    <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">NOME</th>
        <th scope="col">QUANTIDADE</th>
        <th scope="col">PREÇO</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          unset($_SESSION['carrinho'][$id]);
        }
        $total = 0;
        if(isset($_SESSION['carrinho'])){
          foreach($_SESSION['carrinho'] as $key => $value){
            $daoM = new DaoMedicamento();
            $m = $daoM->getMedicamento(unserialize($value)->getIdmedicamento());
            $valor = number_format($m->getValor()*unserialize($value)->getQuantidade(), 2);
            echo "<tr>
                    <th>{$m->getNome()}</th>
                    <td>".unserialize($value)->getQuantidade()."</td>
                    <td>{$valor}</td>
                    <td><a class='btn btn-primary' href='carrinho.php?id={$key}'>Apagar</a></td>
                  </tr>";
                  
                  //echo unserialize($value)->getIdmedicamento() . "<br>" . "<br>";
                  $total = $total + $valor;
          }
        }
      ?>
      
    </tbody>
   </table><br>
   <label><b>Valor Total dos Itens: <?php echo number_format($total,2);?></b></label>



  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="medico" placeholder="MÉDICO">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="cfm" placeholder="CFM">
    </div>
  </div>

  <div class="row">
    <div class="col">
      <select class="custom-select mr-sm-2" id="pagamento" name="pagamento" required>
        <option selected disable>Endereço</option>
        <?php
          $usuario = unserialize($_SESSION['logado'])->getIdUsuario();
          $daoE = new DaoEndereco();
          $end = $daoE->consultaEnd($usuario);
          
          foreach($end as $key => $e){
            echo "<option value='{$e->getIdEndereco()}'>{$e->getLogradouro()}, {$e->getNumero()}, {$e->getComplemento()}, {$e->getCidade()}, {$e->getEstado()}</option>";

          }
        
        ?>
      </select>
    </div>
      <div class="col">
        <a class="btn btn-primary" role="button" href="cadEnd.php">Cadastrar Endereço</a>
      </div>
  </div>

  <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
      <select class="custom-select mr-sm-2" id="pagamento" name="pagamento" required>
        <option selected disabled>Formas de pagamento</option>
        <?php
          $daoP = new DaoPagamento();
          $pagamento = $daoP->getAll();
          foreach($pagamento as $key => $p){
            echo "<option value='{$p->getIdpagamento()}'>{$p->getNome()}</option>";

          }
        ?>
      </select>
    </div>

    <div class="col-auto my-1">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect"></label>
      <select class="custom-select mr-sm-2" id="farmacia" name="farmacia" required>
        <option selected disabled>Farmácia</option>
        <?php
          $daoF = new DaoFarmacia();
          $farmacia = $daoF->getAll();
          foreach($farmacia as $key => $f){
            echo "<option value='{$f->getIdfarmacia()}'>{$f->getNome()}</option>";

          }
        ?>
      </select>
    </div>
    <div class="col-auto my-1">
      <button type="submit" name="finalizar" class="btn bg-danger btn-primary">Finalizar compras</button>
    </div>

    <?php
      if(isset($_POST['finalizar'])){
        if(!isset($_SESSION['usuario'])){
          echo "<script>alert('Faça Login')
              window.location.href='login.php</script>";
        }
          $receita = new Receita();
          $receita->setMedico($_POST['medico']);
          $receita->setCmf($_POST['cfm']);

          $daoRec = new DaoReceita();
          $rec = $daoRec->salvar($receita);

          


          foreach($_SESSION['carrinho'] as $key => $value){
            $idMedicamento = unserialize($value)->getIdMedicamento();
            $usuario = unserialize($_SESSION['logado'])->getIdUsuario();
            $valor = unserialize($value)->getValor();
            $quantidade = unserialize($value)->getQuantidade();
            $item = new ItemVenda();

            
            $item->setIdFarmacia(intval($_POST['farmacia']));
            $item->setIdMedicamento(intval($idMedicamento));
            $item->setIdPagamento(intval($_POST['pagamento']));
            $item->setIdReceita(intval($rec));
            $item->setIdUsuario(intval($usuario));
            $item->setQuantidade(intval($quantidade));
            $item->setValor($valor);
            $item->setLogradouro($_POST['logradouro']);
            $item->setBairro($_POST['bairro']);
            $item->setCidade($_POST['cidade']);
            $item->setEstado($_POST['estado']);
            $item->setData(date('Y-m-d'));
            $item->setReferencia((date('dmYHi').$usuario));

            $daoItem = new DaoItemVenda();
            $i = $daoItem->salvar($item);
            var_dump($item);
            //echo $item->getIdVenda() . "<br>" . "<br>";

          }
          
          if($i > 0){
            echo "<script>alert('compra realizada')</script>";
            echo "<script>window.location.href='../page/index.php'</script>";
            unset ($_SESSION['carrinho']);
          }else{
            echo "<script>alert('erro')</script>";
          }
      }
    
    ?>




  </form>

</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>