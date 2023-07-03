<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
if(isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['name'])&& isset($_POST['phone'])&& isset($_POST['email'])){
    require "control/controlRegister.php";

    if(register($_POST['username'], $_POST['password'], $_POST['name'], $_POST['phone'], $_POST['email'], $_FILES['imagen'])){
        header("location:login.php");
    }else{
        echo "Error en el registro";
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signin.css">

    <title>Registro</title>
   

    
</head>
<body>
    

<body class="text-center">
    
    <main class="form-signin">
      <form action="" method="post" enctype="multipart/form-data">
        <img class="mb-4" src="img/Logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal">Registro</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
          <label for="floatingInput">Usuario</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Contraseña</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="name">
          <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Telefono" name="phone">
          <label for="floatingInput">Telefono</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="eMail" name="email">
          <label for="floatingInput">Mail</label>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Foto de perfil:</label>
          <input class="form-control" type="file" id="formFile" name="imagen">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">CONTINUAR</button>
        <p>Ya tienes cuenta?<a href="login.php" class="link-primary">Inicia Sesion</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; MyKingdom</p>
      </form>
      
    </main>
    
    
</body>
</html>