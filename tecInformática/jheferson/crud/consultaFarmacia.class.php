<?php
    require_once "../dao/daofarmacia.class.php";
    require_once "../models/farmacia.class.php";
    function converterData($us){
        $pt_br  = date("d-m-Y",strtotime($us)); // convert date to pt-br 
        return $pt_br;
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Consultando todos os produtos</title>
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
        <table class="table table-hover">

        <?php
  echo "<thead>
    <tr>
      <th scope='col'>IDFarmacia</th>
      <th scope='col'>NOME</th>
      <th scope='col'>CNPJ</th>
      <th scope='col'>RAZAO SOCIAL</th>
      <th scope='col'>TELEFONE</th>
      <th scope='col'>ALTERAR</th>
      <th scope='col'>DELETAR</th>
    </tr>
  </thead>";
 echo " <tbody>";
    
    $dao = new DaoFarmacia();
    $resultado = $dao->getAll();
    if($resultado != NULL){
        foreach($resultado as $chave  => $farmacia){
          
            echo "<tr>";
            echo "<th scope='row'>{$farmacia->getIdfarmacia()}</th>
                              <td>{$farmacia->getNome()}</td>
                              <td>{$farmacia->getCnpj()}</td>
                              <td>{$farmacia->getRazaoSocial()}</td>
                              <td>{$farmacia->getTelefone()}</td>
                              <td><a href='atualizarfarmacia.class.php?idFarmacia={$farmacia->getIdFarmacia()}'><i class='material-icons'> update </i></a></td>
                              <td><a href='deletarfarmacia.php?idFarmacia={$farmacia->getIdFarmacia()}'><i class='material-icons'> delete </i></a></td>
    
      </tr>";
        }
    }
    
    
  echo "</tbody>
</table> ";
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