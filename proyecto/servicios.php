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
$function = $_POST['function'];

if($function == "noticias"){

    
    



    // $juegosJson = json_encode($juegos, JSON_UNESCAPED_UNICODE);
    // echo $juegosJson;
    
}



?>