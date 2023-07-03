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
    <link rel="stylesheet" href="/css/discografia.css">
    <script src="https://kit.fontawesome.com/ce6edec959.js" crossorigin="anonymous"></script>


</head>


<!--<img src="/img/logo.png" width="200px">-->



<body>
<?php
include "menu.php";
?>

    <div class="canciones">
        <div class="cancion">
            <h2>Aiman Jr Chin Chin</h2>
            <audio controls src="/media/aiman.mp3" type="audio/mpeg"></audio>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta nulla quo rerum nemo numquam earum beatae
                voluptate, animi aut maiores dolorum veniam labore quam qui sed harum itaque libero. Pariatur!</p>
        </div>
        <div class="cancion">
            <h2>Beny JR THor</h2>
            <audio controls src="/media/benyjr.mp3" type="audio/mpeg"></audio>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta nulla quo rerum nemo numquam earum beatae
                voluptate, animi aut maiores dolorum veniam labore quam qui sed harum itaque libero. Pariatur!</p>
        </div>
        <div class="cancion">
            <h2>Morad Como Estan</h2>
            <audio controls src="/media/morad.mp3" type="audio/mpeg"></audio>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta nulla quo rerum nemo numquam earum beatae
                voluptate, animi aut maiores dolorum veniam labore quam qui sed harum itaque libero. Pariatur!</p>
        </div>
        <div class="cancion">
            <h2>ThePoing Plata</h2>
            <audio controls src="/media/thepoing.mp3" type="audio/mpeg"></audio>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta nulla quo rerum nemo numquam earum beatae
                voluptate, animi aut maiores dolorum veniam labore quam qui sed harum itaque libero. Pariatur!</p>
        </div>
        <h3>ESCUCHANOS AHORA EN SPOTIFY</h3>

        <iframe src="https://open.spotify.com/embed/album/60IwCIJHvLeYYCI6C837fh?utm_source=generator&theme=0" width="100%" height="380" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
        
    </div>

    <footer>
        <div class="enlaces">
            <ul>
                <li><a href="">Instagram</a></li>
                <li><a href="">Twitter</a></li>
                <li><a href="">Youtube</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>