<?php
    session_start();

    include 'datos.php';
    $usuario_existe = login($_POST['user'], $_POST['password']);
    if($usuario_existe)
    {
        $_SESSION["user"] = $_POST["user"];
        header("location: index.php");
    } else
    {
        header("location: login.html");
    }
?>