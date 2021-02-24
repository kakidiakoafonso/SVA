<?php
include_once('./DAO/dao.php');
  if(isset($_POST['Vender']))
  {
    vender($_POST);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap/css/style.css">
    <script src="./bootstrap/js/jQuery.min.js"></script>
     
    <title>Vender veiculo</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary fixed-top">
        <a href="index.php" class="navbar-brand">AngoCar</a>
        
        <div class="collapse navbar-collapse" id="navbarCollapse2">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="carros.php" class="nav-item nav-link">Carros</a>
                <a href="motos.php" class="nav-item nav-link">Motos</a>
                <a href="vender.php" class="nav-item nav-link">Vender</a>
                <a href="historico.php" class="nav-item nav-link">Histórico</a>
            </div>
        </div>
</nav> 
    

<table class="table margemTop tableMargin">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Automovel</th>
      <th scope="col">Codigo</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Ano</th>
      <th scope="col">Tipo</th>
      <th scope="col">Potencia/Cilindo</th>
      <th scope="col">Preco</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Opcao</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
    foreach (listarCarro() as $value) 
    {
      echo "
      <tr>
        <td>Carro</td>
        <td>$value->codigo</td>
        <td>$value->marca</td>
        <td>$value->modelo</td>
        <td>$value->ano</td>
        <td>$value->tipo</td>
        <td>$value->potencia</td>
        <td>$value->preco</td>
        <td>$value->qtdade</td>
        <td><button type='button' class='btn btn-secondary vender'>Vender</button></td>  
      </tr>
      ";
    }  
      foreach (listarMoto() as $value) 
    {
      echo "
      <tr>
        <td>Moto</td>
        <td>$value->codigo</td>
        <td>$value->marca</td>
        <td>$value->modelo</td>
        <td>$value->ano</td>
        <td>$value->tipo</td>
        <td>$value->cilindro</td>
        <td>$value->preco</td>
        <td>$value->qtdade</td>
        <td><button type='button' class='btn btn-secondary vender'>Vender</button></td>  
      </tr>
      ";
    }  
  ?>
  </tbody>
</table>



<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    
    <form class="" method="POST">
      <div class="row margem">
        <div class="col">
          <label>Marca</label>
          <input type="text" class="form-control" id="marca" readonly name="marca">
        </div>
        <div class="col">
          <label>Modelo</label>
          <input type="text" class="form-control" id="modelo" readonly name="modelo">
        </div>
      </div>
      <div class="row margem">
        <div class="col">
          <label>Ano de fabrico</label>
          <input type="text" class="form-control" id="ano" readonly name="ano">
        </div>
        <div class="col">
          <label>Tipo</label>
          <input type="text" class="form-control" id="tipo" readonly name="tipo">
        </div>
      </div>
      <div class="row margem">
        <div class="col">
          <input type="text" class="form-control" placeholder="Nome" name="nome">
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome">
        </div>
      </div>
      <div class="row margem">
        <div class="col">
          <input type="number" class="form-control" placeholder="Número de telefone" name="telefone"> 
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Morada" name="morada">
        </div>
      </div>
      <button class="btn btn-warning btnCancelar btnMargin ">Cancelar venda</button>
      <button type="submit" class="btn btn-success btnProcessar" name="Vender">Processar venda</button>
    </form>
  </div>

</div>



<script>
    $(document).ready(function()
    {
      $("#btnAdd").click(function()
      {
        $("#addModal").css("display","block");
      })
      $(".fechar").click(function()
      {
        $("#addModal").css("display","none");
      })


      $(".vender").click(function()
      {
        $("#myModal").css("display","block");
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function()
        {
          return $(this).text();
        }).get();
        console.log(data);
        $("#marca").val(data[2]);
        $("#modelo").val(data[3]);
        $("#tipo").val(data[5]);
        $("#ano").val(data[4]);
        $("#potCilindro").html(data[6]);
      }); 


      $(".close").click(function()
      {
        $("#myModal").css("display","none")
      })
    });</script>  
<footer class="bg-light text-center text-lg-start fixed-bottom">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2021 Copyright:
    <a class="text-dark">Kakidiako Afonso António</a>
  </div>
</footer>
</body>
</html>


