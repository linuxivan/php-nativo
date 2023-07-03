<?php
    var_dump($_POST);
    include 'datos.php';
    update_juego($_POST["id"], $_POST["titulo"], $_POST["descripcion"], $_POST["precio"],$_POST["imagen"],$_POST["genero"]);
    header('location: gestionJuegos.php');
?>