<?php
    session_start();
    include 'datos.php';
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
    <link rel="stylesheet" type="text/css" href="css/gestionJuegos.css">
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
            <?php
                $user = $_SESSION["user"];
                if( isset($user) != true)
                {
                    echo "<a class='enlaceMenu' href='registro.html'>Registro</a>";
                    echo "<a class='enlaceMenu' href='login.html'>Login</a>";
                } else
                {
                    echo "<a class='enlaceMenu' href='cerrarSesion.php'>Cerrar sesión</a>";
                }
            
            
            ?>
        </div>
    </div>
    <div id="cuerpo">
        <h2>Gestión juegos</h2>
        <table>
            <tr>
                <th>Título</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        <?php
            $juegos = get_juegos();

            for($i = 0; $i < count($juegos); $i++)
            {
                echo "<tr>";
                    echo "<td><a href='detalles.php?id=".$juegos[$i]["id"]."'>".$juegos[$i]["titulo"]."</a></td>";
                    echo "<td><a href='actualizarJuegos.php?idJuego=".$juegos[$i]["id"]."'><img class='iconosTabla' src='images/edit.png'></a></td>";
                    echo "<td><a href='deleteJuegos.php?idJuego=".$juegos[$i]["id"]."'><img class='iconosTabla' src='images/trash.png'></a></td>";
                echo "</tr>";
            }
        ?>
        </table>
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