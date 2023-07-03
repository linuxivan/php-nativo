<?php
    include 'datos.php';
    session_start();
    $id_usuario = get_user_id($_SESSION["user"]);
    $insertar = crear_juego($_POST["titulo"], $_POST["descripcion"], $_POST["precio"], $_POST["imagen"], $_POST["genero"], $id_usuario);
    header('location: index.php');
?>