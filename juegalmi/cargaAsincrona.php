<?php
    session_start();
    include 'datos.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuegAlmi</title>
    <link rel="stylesheet" type="text/css" href="css/comun.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Grechen+Fuemen&display=swap" rel="stylesheet">
</head>
<body>
    <div id="encabezado">
        <h1 id="tituloWeb">JuegAlmi</h1>
        <a href="index.html"><img id="logo" src="images/raton.png" alt="Logo con ratón" /></a>
        <div id="menu">
            <ul>
                <li class="seleccionado"><a href="index.html">Inicio</a></li>
                <li>
                    <a href="generos.html">Generos</a>
                    <ul>
                        <li><a href="rpg.html">RPG</a></li>
                        <li><a href="estrategia.html">Estrategia</a></li>
                        <li><a href="deportes.html">Deportes</a></li>
                    </ul>
                </li>
                <li><a href="recomendaciones.html">Recomendaciones</a></li>
                <?php
                    if(isset($_SESSION["user"]) == true)
                    {
                        echo "<li><a href='altaJuego.php'>Crear juego</a></li>";
                    }
                ?>
            </ul>
           
        </div>
    </div>
    <div id="cuerpo">
        <select name="" id="generosSelect">
            <?php
            $tipos = get_tipos();
            var_dump($tipos);
            for ($i=0; $i < count($tipos); $i++) { 
                echo "<option value='".$tipos[$i]['id']."'>".$tipos[$i]['nombre']."</option>";
            }
            ?>
        </select>
        <select name="" id="juegosSelect"></select>
        <button id="cargarJuego">Cargar juegos</button>

        <div id="juegos">

        </div>

          
    </div>
    <div id="pie">
        <div id="rrss">
            <span>Síguenos en redes sociales</span>
            <img class="iconosSociales" src="images/instagram.png" alt="icono instagram"/>
            <img class="iconosSociales" src="images/twitter.png" alt="icono twitter"/>
            <img class="iconosSociales" src="images/tiktok.png" alt="icono tiktok"/>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/cargaAsincrona.js"></script>
</body>
</html>