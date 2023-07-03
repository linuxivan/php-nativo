<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/globalstyle.css">
    <link rel="stylesheet" href="css/controlpanel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">



</head>


<!--<img src="/img/logo.png" width="200px">-->



<body>
    <?php
include "menu.php";

?>


    <div class="noticias">
        <h1>Control Noticias</h1>
        <div class="busqueda">
                    <input type="text" id="busquedaNoticias">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
        <div>
            <table>
                
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody id="tablaNoticias">
                    <tr>
                        <input type="hidden">
                        <td>02/02/2019</td>
                        <td>La locura</td>
                        <td>
                            <img src="img/btnEditar.png" width="75px" id="btnEditar">
                        </td>
                        <td>
                            <img src="img/btnBorrar.png" width="75px" id="btnEliminar">
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>


</body>
<script src="js/jquery-3.6.0.min.js"></script>
<footer>
    <div class="enlaces">
        <ul>
            <li><a href="">Instagram</a></li>
            <li><a href="">Twitter</a></li>
            <li><a href="">Youtube</a></li>
        </ul>
    </div>
</footer>

</html>