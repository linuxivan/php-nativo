<?php
    include 'datos.php';
    delete_juego($_GET["idJuego"]);
    header('location: gestionJuegos.php');
?>