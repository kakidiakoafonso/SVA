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
     
    <title>Motos</title>
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
            </div>
        </div>
        <button id="btnAdd" class="btn btn-info btnAdicionarStyle"> Cadastrar moto</button>
</nav> 
     
    


<!--Modal add-->

<div id="addModal" class="addModal">

  <div class="addModal-content">
    <span class="fechar">&times;</span>
                <form method='POST' action=''>
              <div class="form-row row-cols-8">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Codigo" name='codigo' required>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Marca" name='marca' required>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Modelo" name='modelo' required>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Ano" name='ano'>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Preco" name='preco'>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Quantidade" name='qtdade'>
                </div>
                <div class="col itensMargem">
                  <input type="text" class="form-control" placeholder="Cilíndro" name='cilindro'>
                </div>

                <select class="custom-select itensMargem opcoes" name='tipo'>
                    <option selected>Tipo de moto</option>
                    <option value="Clássico">Clássico</option>
                    <option value="Esporte">Esporte de Pista</option>
                    <option value="MotoCross">MotoCross</option>
                    <option value="Leve">Leve</option>
                </select>
                
                <div class="col">
                  <input type="submit" name="Cadastrar" class="btn btn-primary salvarCarro" value="Cadastrar carro">
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
      <th scope="col">Ano</th>
      <th scope="col">Tipo</th>
      <th scope="col">Cilindro</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Opcao</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
    foreach (listarMoto() as $value) 
    {
      echo "
      <tr>
        <td>$value->codigo</td>
        <td>$value->marca</td>
        <td>$value->modelo</td>
        <td>$value->cilindro</td>
        <td>$value->ano</td>
        <td>$value->tipo</td>
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
      <button type="submit" class="btn btn-success btnProcessarVenda" name="salvar">Atualizar dados</button>
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
        $("#codigo").val(data[0]);
        $("#marca").val(data[1]);
        $("#modelo").val(data[2]);
        $("#preco").val(data[6]);
        $("#qtdade").val(data[7]);
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
  updateMoto($_POST);
}

if(isset($_POST['Cadastrar']))
{
  cadastrarMoto($_POST);
}

?>