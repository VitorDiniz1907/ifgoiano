<?php
    session_start();
    require_once "../dao/daomedicamento.class.php";
    require_once "../models/medicamento.class.php";

    require_once "../dao/daousuario.class.php";
    require_once "../models/usuario.class.php";

    require_once "../dao/daoItemVenda.class.php";
    require_once "../models/intemvenda.class.php";

    $dao = new DaoMedicamento();
    $med = $dao->getAll();
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
 

  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" href="#">Farmácia</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form>

        <button class="btn btn-outline-danger my-2 my-sm-0"  href="index.php" type="submit">Home</button>


    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>

    <?php
      if(isset($_SESSION['logado'])){
        echo "<button class='btn btn-outline-success my-2 my-sm-0' type='submit' href=''>
        <a class='nav-link' href='atualizarusuario.php?id=".unserialize($_SESSION['logado'])->getIdUsuario()."' tabindex='-1' aria-disabled='true'>".unserialize($_SESSION['logado'])->getNome()."</a>
        </button>
        <button class='btn btn-outline-warning my-2 my-sm-0' type='submit' >
        <a class='nav-link' href='sair.php' tabindex='-1' aria-disabled='true'>SAIR</a>
        </button>";
      }else{
        echo "<button class='btn btn-outline-warning my-2 my-sm-0' type='submit' href=''>
        <a class='nav-link' href='../cadastrologin/login.php' tabindex='-1' aria-disabled='true'>LOGIN</a>
        </button>
        <button class='btn btn-outline-warning my-2 my-sm-0' type='submit' >
        <a class='nav-link' href='../cadastrologin/cadastro.php' tabindex='-1' aria-disabled='true'>CADASTRE-SE</a>
        </button>";
      }
    ?>
  
    
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >
      <a class="nav-link " href="../carrinho/carrinho.php" tabindex="-1" aria-disabled="true">CARRINHO</a>
    </button>
 
  </div>
</nav>

  <?php
    $daoM = new DaoMedicamento();
    $medicamento = $daoM->getAll();

    $i=0;
    echo "<table><tr>";
    foreach($medicamento as $key => $value){
      if ($i == 4){
        $i=0;
        echo "<tr>";
      }
      echo "<td>";

      $preco = number_format($value->getValor(), 2);
      echo"<form method='POST' action='index.php'>
        <img style='width: 18rem;' src='../img/med.jpg' alt='Card image'>
            <h4 >{$value->getNome()}</h4>
            <p >{$value->getBula()}</p>
            <p>Valor Unitário: {$preco}</p>
            <label><b>Quantidade<b></label><br>
            <input type='number' name='qnt' min='1' max='{$value->getQuantidade()}' value='1'><br>
            <input type='hidden' name='idmedicamento' value='{$value->getIdmedicamento()}'>
            <input type='hidden' name='valor' value='{$preco}'>
            <button class='btn btn-primary' type='submit' name='car'>Adicionar ao Carrinho</button>
          
      </form>";
      
      echo "</td>";
      if ($i==1){
        echo "</tr>";
      }

      $i++;
    }
    echo "</table>";

    if(isset($_POST['car'])){
      if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
      }
      //Percorre o vetor de carrinho para verificar se tem ou não produto com mesmo ID, se tiver ele cria uma variável qualquer e não add no carrinho
      foreach($_SESSION['carrinho'] as $key => $value){
        if(unserialize($value)->getIdMedicamento() == $_POST['idmedicamento']){
          $var = $key;

          $quant = unserialize($value)->getQuantidade();
          $itens = new ItemVenda();        
          $itens->setIdMedicamento($_POST['idmedicamento']);
          $itens->setQuantidade($_POST['qnt'] + $quant);
          //var_dump($item);

          array_push($_SESSION['carrinho'], serialize($itens));
        }
      }
      if(!isset($var)){
        $i = new ItemVenda();      
        $total = $_POST['qnt'] * $_POST['valor'];
        
        $i->setIdMedicamento($_POST['idmedicamento']);
        $i->setValor($total);
        $i->setQuantidade($_POST['qnt']);
        
        
        array_push($_SESSION['carrinho'], serialize($i));
      }else{
        //echo $var;
        unset($_SESSION['carrinho'][$var]);
        
      }

    }
  ?>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>







