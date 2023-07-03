<?php


if(isset($_POST['username']) && isset($_POST['password'])){
    require "control/controlLogin.php";
    if(login($_POST['username'], $_POST['password'])){
        header("location:index.php");
    }else{
        echo "Usuario o contraseña incorrectos";
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

    <title>Login</title>
   

    
</head>
<body>
    

<body class="text-center">
    
    <main class="form-signin">
      <form action="" method="post">
        <img class="mb-4" src="img/Logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal">Inicio Sesion</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
          <label for="floatingInput">Usuario</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Contraseña</label>
        </div>
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">CONTINUAR</button>
        <p>No tienes cuenta?<a href="register.php" class="link-primary">Registrate</a></p>

        <p class="mt-5 mb-3 text-muted">&copy; MyKingdom</p>

      </form>
    </main>
    
    
</body>
</html>