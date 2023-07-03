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

    if (isset($_POST['titulo']) && isset($_POST['texto'])){
        $archivo = $_FILES['imagen']['name'];
        if (isset($archivo) && $archivo != ""){
            $tipo = $_FILES['imagen']['type'];
            $tamano = $_FILES['imagen']['size'];
            $temp = $_FILES['imagen']['tmp_name'];
            try {
                $random = random_int(400, 500000);
            } catch (Exception $e) {
            }
            if (!(strpos($tipo, "gif") || strpos($tipo, "png") || strpos($tipo, "jpg") || strpos($tipo, "jpeg"))){
                echo "Error, el formato de imagen no es correto";
            }else{
                if (move_uploaded_file($temp, 'img/'. $random. $archivo  )){
                    require "bbdd.php";
                    $mysqli = connectarBD();
                    $ruta = "img/". $random . $archivo;
                    $titulo = $_POST['titulo'];
                    $text = $_POST['texto'];
                    $id_user = $_SESSION['id_user'];
                    $stmt = $mysqli->prepare("INSERT INTO noticias VALUES (null , ?, ?, CURRENT_TIMESTAMP , ?, ?)");

                    $stmt->bind_param("ssss", $titulo, $text, $ruta, $id_user);
                    $stmt->execute();
                    $mysqli->close();

                    header("location:index.php");
                }else{
                    echo "error al subir el archivo";
                }
            }
        }
    }
    ?>
    <div>
        <div class="caja">
            <h1>Noticia</h1>
            <div class="inputs">

                <form method="post" action="" enctype="multipart/form-data">
                    <h4>Titulo</h4>
                    <div class="inputs"><input type="text" placeholder="Titulo" name="titulo"></div>
                    <h4>Texto</h4>
                    <div class="inputs"><textarea name="texto" placeholder="Texto" cols="50" rows="10"></textarea></div>
                    <h4>Imagen</h4>
                    <div class="inputs"><input type="file" name="imagen"></div>
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
