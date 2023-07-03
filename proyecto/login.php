<?php
    session_start();
if (isset($_POST['user']) && isset($_POST['pass'])){

    require "bbdd.php";
    $mysqli = connectarBD();
    $pass =$_POST['pass'];
    $user =$_POST['user'];
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();


        if (password_verify($pass, $row['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['id_user'] = $row['id_user'];
            if ($row['admin'] == 1){
                $_SESSION['admin'] = true;
            }

            header("location:index.php");
        }else{
            echo "Error en el inicio de sesion";
        }
    }



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
            <h1>Login</h1>
            <div class="inputs">

                <form method="post" action="">
                <div class="inputs"><input type="text" placeholder="Usuario" name="user"></div>
                <div class="inputs"><input type="password" placeholder="Contraseña" name="pass"></div>
                <div class="boton"><input type="submit" value="Continuar"></div>
                </form>
                <p>¿No tienes cuenta? <a href="registro.php">Registrate</a></p>

            </div>
        </div>
    </div>

</body>

</html>