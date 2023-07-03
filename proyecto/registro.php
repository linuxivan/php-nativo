<?php
session_start()
?>

<?php
if (isset($_POST['email']) && isset($_POST['user']) && isset($_POST['pass'])){
    require "bbdd.php";
    $mysqli = connectarBD();
    $stmt = $mysqli->prepare("INSERT INTO users VALUES (null , ?, ?, ?, false)");

    $hashed_pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $stmt->bind_param("sss", $_POST['user'], $_POST['email'], $hashed_pass);
    $stmt->execute();
    $mysqli->close();

    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="/css/globalstyle.css">
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/registro.css">
    <script src="https://kit.fontawesome.com/ce6edec959.js" crossorigin="anonymous"></script>


</head>


<!--<img src="/img/logo.png" width="200px">-->



<body>
<?php
include "menu.php";
?>
<div>
    <div class="caja">
        <h1>Registro</h1>
        <div class="inputs">

            <form method="post" action="">
            <div class="inputs"><input type="email" placeholder="Email" name="email"></div>
            <div class="inputs"><input type="text" placeholder="Usuario" name="user"></div>
            <div class="inputs"><input type="password" placeholder="Contraseña" name="pass"></div>
            <p><input type="checkbox">Confirmar terminos y condiciones</p>
            <div class="boton"><input type="submit" value="Continuar"></div>
            </form>
            <p>¿Ya tienes cuenta? <a href="login.php">Login</a></p>

        </div>
    </div>
</div>

</body>

</html>