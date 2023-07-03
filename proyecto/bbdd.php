<?php
function connectarBD(){
    $mysqli = new mysqli("localhost", "root", "", "mdlr");
    if($mysqli->connect_errno)
    {
        echo "Fallo en la conexión: ".$mysqli->connect_errno;
    }
    return $mysqli;
}



