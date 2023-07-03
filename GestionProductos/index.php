


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyKingDom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>     <link rel="stylesheet" href="css/header.css">
</head>

<?php  
session_start();

if(!isset($_SESSION['user'])){
    header('location:login.php');
}else{ 
include "menu.php";




?>

<div class="px-4 pt-5 my-5 text-center border-bottom border shadow-lg">
    <h1 class="display-4 fw-bold">Bienvenido <?php echo ucfirst($_SESSION['user'])?></h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Desde esta Web podras administrar tus productos, el stock, añadir y modificar los existentes. Si tienes algun problema por favor ponte en contacto con el administrador de la web.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Añadir Producto</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Ver Inventario</button>
      </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">
        <img src="img/fondoIndex.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" loading="lazy" width="700" height="500">
      </div>
    </div>
  </div>
  






<?php
}
?>

<body>
    
</body>
</html>