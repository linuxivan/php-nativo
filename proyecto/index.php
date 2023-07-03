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
    <link rel="stylesheet" href="css/globalstyle.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/ce6edec959.js" crossorigin="anonymous"></script>


</head>


<!--<img src="/img/logo.png" width="200px">-->



<body>
<?php
include "menu.php";
?>

    <div class="ultimovideo">
        <h1>Ultimo Tema</h1>
        <iframe id="yt-frame" width="100%" height="720px"
            src="https://www.youtube.com/embed/CDyJ0UlyjTM?autoplay=1&mute=0&enablejsapi=1&modestbranding=1"
            frameborder="0">
        </iframe>
    </div>
    <div class="tienda">
        <h1>SHOP</h1>
        <div class="art">
            <div class="prenda">
                <img src="/img/CAMISETA-AZULMDLR-1.png" alt="">
                <h2>Camiseta Azul logo MDLR Blanco</h2>
                <span>25,00€ IVA Incluido</span>
                <div class="boton"><a href="#">COMPRAR</a></div>
            </div>
            <div class="prenda">
                <img src="/img/SHORT-AZUL2MDLR.png" alt="">
                <h2>Camiseta Azul logo MDLR Blanco</h2>
                <span>35,00€ IVA Incluido</span>
                <div class="boton"> <a href="#">COMPRAR</a></div>

            </div>
            <div class="prenda">
                <img src="/img/CAMISETA-ROJOMDLR.png" alt="">
                <h2>Camiseta Roja logo MDLR Blanco</h2>
                <span>25,00€ IVA Incluido</span>
                <div class="boton"><a href="#">COMPRAR</a></div>

            </div>

            <div class="prenda">
                <img src="/img/SHORT-ROJOMDLR.png" alt="">
                <h2>Bermudas Rojas logo MDLR blanco</h2>
                <span>35,00€ IVA Incluido</span>
                <div class="boton"><a href="#">COMPRAR</a></div>

            </div>
        </div>
    </div>
    <div class="fechas">
        <h1>Proximas Fechas</h1>
        <div>
            <table>
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>25 Febrero</td>
                        <td>LISBOA PORTUGAL</td>
                        <td>
                            <div class="boton2"><a href="#">ENTRADAS</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>26 Febrero</td>
                        <td>PORTO PORTUGAL</td>
                        <td>
                            <div class="boton2"><a href="#">ENTRADAS</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>16 Junio</td>
                        <td>SONAR BARCELONA</td>
                        <td>
                            <div class="boton2"><a href="#">ENTRADAS</a></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="noticias">
        <h1>Ultimas Noticias</h1>
        <div class="art">
            <?php

            require "bbdd.php";
            $mysqli = connectarBD();

            $stmt = $mysqli->prepare("SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 5 ");
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()){
                ?>
                <div class="noticia">
                    <img src="<?php echo $row['imagen'] ?>" width="80">
                    <h2><?php echo $row['titulo'] ?></h2>
                    <span><?php echo $row['texto'] ?></span>
                    <a href="noticia.php?idnoticia=<?php echo $row['id_noticia']?>">Leer mas...</a>
                </div>

            <?php
            }

            ?>


        </div>
    </div>
<div class="noticias">
    <h1>Miembros</h1>
    <div class="art">
        <?php
        $stmt = $mysqli->prepare("SELECT * FROM miembrosgrup ORDER BY fecha_nac DESC ");
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()){
            ?>
            <div class="noticia">

                <h2 class="nombreArtista"><?php echo $row['nombre'] ?></h2>
                <h2><?php echo $row['instrumento'] ?></h2>
                <h2><?php echo $row['fecha_nac'] ?></h2>
                <h2><?php echo $row['ciudad'] ?></h2>
            </div>

            <?php
        }

        ?>


    </div>
</div>
    </div>
    <div class="entrevista">
        <h1>Entrevista Beny</h1>

        <video controls src="/media/documental.mp4">El video no esta disponible</video>
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