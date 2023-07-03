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
    require "bbdd.php";
    $mysqli = connectarBD();
    if (isset($_POST['titulo']) && isset($_POST['texto']) && isset($_POST['id_noticia'])){
        $titulo = $_POST['titulo'];
        $text = $_POST['texto'];
        $id_user = $_SESSION['id_user'];
        $id_noticia = $_POST['id_noticia'];
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
                if (move_uploaded_file($temp, 'img/'. $random . $archivo)){

                    $ruta = "img/". $random . $archivo;

                    $stmt = $mysqli->prepare("UPDATE noticias SET titulo = ?, texto = ?, imagen = ?, id_user = ? WHERE id_noticia = ?");

                    $stmt->bind_param("sssii", $titulo, $text, $ruta, $id_user, $id_noticia);
                    $stmt->execute();
                    $mysqli->close();

                    header("location:index.php");
                }else{
                    echo "error al subir el archivo";
                }
            }
        }else{
            $stmt = $mysqli->prepare("UPDATE noticias SET titulo = ?, texto = ?, id_user = ? WHERE id_noticia = ?");

            $stmt->bind_param("ssii", $titulo, $text, $id_user, $id_noticia);
            $stmt->execute();
            $mysqli->close();
            header("location:index.php");

        }
    }
    if (isset($_GET['id_noticia']))
    {
        $stmt = $mysqli->prepare("SELECT * FROM noticias WHERE id_noticia = ?");
        $id_noticia =$_GET['id_noticia'];
        $stmt->bind_param("i", $id_noticia );
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $mysqli->close();
    ?>
    <div>
        <div class="caja">
            <h1>Noticia</h1>
            <div class="inputs">

                <form method="post" action="" enctype="multipart/form-data">
                    <h4>Titulo</h4>
                    <div class="inputs"><input type="text"  value="<?php echo $row['titulo'] ?>" name="titulo"></div>
                    <div class="inputs"><textarea hidden cols="50" rows="10" type="text"><?php echo $row['texto'] ?></textarea></div>
                    <textarea name="texto" cols="50" rows="10"><?php echo $row['texto'] ?></textarea>
                    <div class="inputs"><input type="file" name="imagen"></div>
                    <input type="hidden" name="id_noticia" value="<?php echo $id_noticia ?>">
                    <div class="boton"><input type="submit" value="Continuar"></div>
                </form>
                <form method="post" action="bajanoticia.php">
                    <input type="hidden" name="id_noticia" value="<?php echo $id_noticia ?>">
                    <input type="submit" value="Eliminar Noticia">
                </form>

            </div>
        </div>
    </div>
    <?php
    }else{
        echo "Selecciona una noticia";
    }
}else{

    echo "<h1>Necesitas ser administrador para acceder a esta pagina.</h1>"

    ?>


    </body>

    </html>


    <?php

}
