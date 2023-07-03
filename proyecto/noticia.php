<?php
session_start()
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
    <link rel="stylesheet" href="/css/noticia.css">
    <script src="https://kit.fontawesome.com/ce6edec959.js" crossorigin="anonymous"></script>


</head>


<!--<img src="/img/logo.png" width="200px">-->



<body>
<?php
include "menu.php";

if (isset($_GET['idnoticia'])){
    $id_noticia = $_GET['idnoticia'];

    require "bbdd.php";
    $mysqli = connectarBD();

    $stmt = $mysqli->prepare("SELECT * FROM noticias WHERE id_noticia = ? ");
    $stmt->bind_param("i", $id_noticia);
    $stmt->execute();
    $result = $stmt->get_result();
    $noticia = $result->fetch_assoc();

}


?>
<div class="noticia">
    <h1><?php echo $noticia['titulo'] ?></h1>
    <h2><?php echo $noticia['texto'] ?></h2>
    <img src="<?php echo $noticia['imagen'] ?>" height="500px">
    <?php if ($_SESSION['admin'] = true){
    ?>

    <a href="editarnoticia.php?id_noticia=<?php echo $id_noticia ?>">Editar Noticia</a>
    <?php
    } ?>



</div>



</body>
<footer>
    <div class="enlaces">
        <ul>
            <li><a href="">Instagram</a></li>
            <li><a href="">Twitter</a></li>
            <li><a href="">Youtube</a></li>
        </ul>
    </div>
</footer>

</html>