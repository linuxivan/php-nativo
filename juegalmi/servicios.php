<?php

if(isset($_SERVER['HTTP_ORIGIN']))
{
    header("Access-Control-ALlow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Max-Age: 86400");
}

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
{
    if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    {
        header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");
    }

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) 
    {
        header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }

}

header('Content-Type: application/JSON');
include 'datos.php';
$function = $_POST['function'];

if($function == "juegos"){

    $juegos = get_juegos();
    $juegosJson = json_encode($juegos, JSON_UNESCAPED_UNICODE);
    echo $juegosJson;
    
}


if($function == "juegosGenero"){

    $idGenero = $_POST['id_genero'];

    $juegos = get_juegos_genero($idGenero);
    $juegosJson = json_encode($juegos, JSON_UNESCAPED_UNICODE);
    echo $juegosJson;
    
}



if($function == "juego"){

    $idJuego = $_POST['id_juego'];

    $juego = get_juego_by_id($idJuego);
    $juegosJson = json_encode($juego, JSON_UNESCAPED_UNICODE);
    echo $juegosJson;
    
}

if($function == "juegoLimit"){
    $from = $_POST['desde'];
    $cant = $_POST['cant'];
    $juego = get_juegos_limit($from, $cant);
    $juegosJson = json_encode($juego, JSON_UNESCAPED_UNICODE);
    echo $juegosJson;
    
}

?>