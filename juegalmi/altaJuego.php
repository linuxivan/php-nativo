<?php
    include 'datos.php';
    session_start();
    if(isset($_SESSION["user"]) != true)
    {
        header("location: login.html");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuegAlmi</title>
    <link rel="stylesheet" type="text/css" href="css/comun.css">
    <link rel="stylesheet" type="text/css" href="css/alta.css">
    <link href="https://fonts.googleapis.com/css2?family=Grechen+Fuemen&display=swap" rel="stylesheet">
</head>
<body>
    <div id="encabezado">
        <h1 id="tituloWeb">JuegAlmi</h1>
        <a href="index.html"><img id="logo" src="images/raton.png" alt="Logo con ratón" /></a>
        <div id="menu">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li>
                    <a href="generos.html">Generos</a>
                    <ul>
                        <li><a href="rpg.html">RPG</a></li>
                        <li><a href="estrategia.html">Estrategia</a></li>
                        <li><a href="deportes.html">Deportes</a></li>
                    </ul>
                </li>
                <li><a href="recomendaciones.html">Recomendaciones</a></li>
                <li class="seleccionado"><a href="altaJuego.php">Crear juego</a></li>
            </ul>
            <a class="enlaceMenu" href="registro.html">Registro</a>
            <a class="enlaceMenu" href="login.html">Login</a>
        </div>
    </div>
    <div id="cuerpo">
        <h2>Alta juego</h2>
        <form action="crearJuego.php" method="post">
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" /><br>
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="120" rows="5"></textarea><br>
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio" /><br>
            <label for="imagen">Imagen</label>
            <input type="text" name="imagen" id="imagen" /><br>
            <label for="genero">Genero</label>
            <select id="genero" name="genero">
                <?php
                    $generos = get_tipos();
                    for($i = 0; $i < count($generos); $i++)
                    {
                        echo "<option value='".$generos[$i]["id"]."'>".$generos[$i]["nombre"]."</option>";
                    }
                ?>
            </select><br>
            <input type="submit" value="Enviar"/>
        </form>
    </div>
    <div id="pie">
        <div id="rrss">
            <span>Síguenos en redes sociales</span>
            <img class="iconosSociales" src="images/instagram.png" alt="icono instagram"/>
            <img class="iconosSociales" src="images/twitter.png" alt="icono twitter"/>
            <img class="iconosSociales" src="images/tiktok.png" alt="icono tiktok"/>
        </div>
    </div>
</body>
</html>