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
    <link rel="stylesheet" href="/css/galeria.css">
    <script src="https://kit.fontawesome.com/ce6edec959.js" crossorigin="anonymous"></script>


</head>


<!--<img src="/img/logo.png" width="200px">-->



<body>
<?php
include "menu.php";
?>
    <h1>Galeria</h1>

<div class="galeria">
    <div class="imagen-gal"><img src="/img/galeria/1.jpg" ></div>
    <div class="imagen-gal"><img src="/img/galeria/2.jpeg" ></div>
    <div class="imagen-gal"><img src="/img/galeria/3.jpg" ></div>
    <div class="imagen-gal"><img src="/img/galeria/4.jpeg" ></div>
    <div class="imagen-gal"><img src="/img/galeria/5.jpg" ></div>
    <div class="imagen-gal"><img src="/img/galeria/6.png" ></div>
    <div class="imagen-gal"><img src="/img/galeria/7.jpg" ></div>
    <div class="imagen-gal"><img src="/img/galeria/8.jpg" ></div>
    <div class="imagen-gal"><img src="/img/galeria/9.jpg"></div>
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