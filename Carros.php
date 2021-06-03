<?php
include_once('./DAO/dao.php');
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
        <a href="home.php" class="navbar-brand">AngoCar</a>
        
        <div class="collapse navbar-collapse" id="navbarCollapse2">
            <div class="navbar-nav">
                <a href="home.php" class="nav-item nav-link active">Home</a>
                <a href="carros.php" class="nav-item nav-link">Carros</a>
                <a href="motos.php" class="nav-item nav-link">Motos</a>
                <a href="vender.php" class="nav-item nav-link">Vender</a>
            </div>
        </div>
        <button id="btnAdd" class="btn btn-info btnAdicionarStyle"> Cadastrar carro</button>
</nav> 

<!--Modal add-->

<div id="addModal" class="addModal">

  <div class="addModal-content">
    <span class="fechar">&times;</span>
                <form method='POST' action=''>
              <div class="form-row row-cols-8">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Codigo" name='codigo'>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Marca" name='marca'>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Modelo" name='modelo'>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Ano" name='ano'>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Preco" name='preco'>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Quantidade" name='quantidade'>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Capacidade" name='capacidade'>
                </div>

                <select class="custom-select size3 itensMargem opcoes" name='energia'>
                    <option selected>Tipo de energia</option>
                    <option value="Electrico">Electrico</option>
                    <option value="Gasolina">Gasolina</option>
                    <option value="Diesel">Diesel</option>
                </select>

                <select class="custom-select itensMargem opcoes" name='tipo'>
                    <option selected>Tipo de carro</option>
                    <option value="Sedan">Sedan</option>
                    <option value="Van">Van</option>
                    <option value="Conversivel">Conversivel</option>
                    <option value="Todo terreno">Todo terreno</option>
                </select>
                
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Potencia" name='potencia'>
                </div>
                <div class="col">
                  <input type="submit" name="Cadastrar" class="btn btn-primary salvarCarro" value="Cadastrar carro" id="cadastrarCarro">
                </div>
              </div>
            </form>
  </div>
</div>


<table class="table margemTop tableMargin">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">N. de passageiros</th>
      <th scope="col">Ano</th>
      <th scope="col">Tipo</th>
      <th scope="col">Potencia</th>
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
        <td>$value->codigo</td>
        <td>$value->marca</td>
        <td>$value->modelo</td>
        <td>$value->capacidade</td>
        <td>$value->ano</td>
        <td>$value->tipo</td>
        <td>$value->potencia</td>
        <td>$value->preco</td>
        <td>$value->qtdade</td>
        <td><button type='button' class='btn btn-success vender'>Editar</button></td>  
      </tr>
      ";
    }  
     
  ?>
  </tbody>
</table>



<div id="myModal" class="modal">


  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="POST">
      <div class="row margem">
        <div class="col">
          <label class="col-sm-2 col-form-label">Codigo</label>
          <input type="text" class="form-control" readonly id="codigo" name="codigo">
        </div>
        <div class="col">
          <label class="col-sm-2 col-form-label" >Marca</label>
          <input type="text" class="form-control" readonly id="marca" name="marca">
        </div>
        <div class="col">
          <label class="col-sm-2 col-form-label" >Modelo</label>
          <input type="text" class="form-control" readonly id="modelo" name="modelo">
        </div>
      </div>
      <div class="row margem">
        <div class="col">
          <label class="col-sm-2 col-form-label">Preço</label>
          <input type="text" class="form-control" id="preco" name="preco">
        </div>
        <div class="col">
          <label class="col-form-label">Quantidade disponivel</label>
          <input type="text" class="form-control" id="qtdade" name="qtdade">
        </div>
      </div>
      <button class="btn btn-warning btnCancelarVenda">Cancelar</button>
      <button type="submit" class="btn btn-success btnProcessarVenda" name="salvar">Salvar</button>
    </form>
  </div>
</div>


<script>
    $(document).ready(function()
    {
      
      $("#cadastrarCarro").click(function()
      {
        $.toast('Here you can put the text of the toast')
      })
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
        $("#codigo").val(data[0]);
        $("#marca").val(data[1]);
        $("#modelo").val(data[2]);
        $("#preco").val(data[7]);
        $("#qtdade").val(data[8]);
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

<?php
if(isset($_POST['salvar']))
{
  updateCarro($_POST);
}

if(isset($_POST['Cadastrar']))
{
    include_once('./DAO/dao.php');
    cadastrarCarro($_POST);
}

?>