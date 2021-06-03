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
     
    <title>Historico</title>
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
</nav> 



<table class="table margemTop tableMargin">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Numero</th>
      <th scope="col">Morada</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
  <?php
  

    foreach (relatorio() as $value) 
    {
        
        
      echo "
      <tr>
        <td>$value->nome</td>
        <td>$value->sobrenome</td>
        <td>$value->numero</td>
        <td>$value->morada</td>
        <td>$value->marca</td>
        <td>$value->automovel</td>
        <td>$value->data</td> 
      </tr>
      ";
      
    }  
     
  ?>
  </tbody>
</table>



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