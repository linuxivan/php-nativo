<?php
if (isset($_POST['id_noticia'])){
    require "bbdd.php";
    $mysqli = connectarBD();

    $stmt = $mysqli->prepare("DELETE from noticias  WHERE id_noticia = ?");
    $id_noticia = $_POST['id_noticia'];
    $stmt->bind_param("i", $id_noticia);
    $stmt->execute();
    $mysqli->close();
    header("location:index.php");
}else{
    echo "selecciona una noticia para eliminarla";
}