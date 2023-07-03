<?php
session_start();





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
        <link rel="stylesheet" href="/css/altanoticia.css">
        <script src="https://kit.fontawesome.com/ce6edec959.js" crossorigin="anonymous"></script>


    </head>


    <!--<img src="/img/logo.png" width="200px">-->



    <body>
    <?php
    include "menu.php";
if (isset($_SESSION['admin'])){

    if (isset($_POST['nombre']) && isset($_POST['instrumento'])&& isset($_POST['fecha_nac'])&& isset($_POST['ciudad_origen'])){



                    require "bbdd.php";
                    $mysqli = connectarBD();
                    $nombre = $_POST['nombre'];
                    $instrumento = $_POST['instrumento'];
                    $id_user = $_SESSION['id_user'];
                    $fecha_nac = $_POST['fecha_nac'];
                    $ciudad = $_POST['ciudad_origen'];
                    $stmt = $mysqli->prepare("INSERT INTO miembrosgrup VALUES (null , ?, ?, ? , ?, ?)");

                    $stmt->bind_param("ssssi", $nombre, $instrumento, $fecha_nac, $ciudad, $id_user);
                    $stmt->execute();
                    $mysqli->close();

                    header("location:index.php");



    }
    ?>
    <div>
        <div class="caja">
            <h1>Miembro</h1>
            <div class="inputs">

                <form method="post" action="" enctype="multipart/form-data">
                    <h4>Nombre</h4>
                    <div class="inputs"><input type="text" placeholder="Nombre" name="nombre"></div>
                    <h4>Instrumento</h4>
                    <div class="inputs"><input type="text" placeholder="Instrumento" name="instrumento"></div>
                    <h4>Fecha de Nacimiento</h4>
                    <div class="inputs"><input type="date" name="fecha_nac"></div>
                    <h4>Ciudad Origen</h4>
                    <div class="inputs"><input type="text" placeholder="Ciudad" name="ciudad_origen"></div>
                    <div class="boton"><input type="submit" value="Continuar"></div>
                </form>

            </div>
        </div>
    </div>
    <?php

}else{

echo "<h1>Necesitas ser administrador para acceder a esta pagina.</h1>"

    ?>


    </body>

    </html>


<?php

}
