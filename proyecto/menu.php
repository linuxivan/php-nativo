
<div class="dropdwn">
    <nav>
        <img src="img/logo.png" class="logo">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="#">Gira <i class="fas fa-caret-down"></i></a>
                <ul>
                    <li><a href="giracompleta.php">Gira Completa</a></li>
                    <li><a href="geleria.php">Galeria</a></li>
                    <li><a href="entradas.php">Entradas</a></li>
                </ul>
            </li>
            <li><a href="miembros.php">Miembros</a></li>
            <li><a href="discografia.php">Discografia</a></li>
            <?php
            if (isset($_SESSION['admin'])){
                ?>
                <li><a href="altanoticia.php">Añadir Noticia</a></li>
                <li><a href="crearmiembro.php">Crear Miembro</a></li>
                <li><a href="controlpanel.php">Panel de control</a></li>

                <?php
            }
            if (isset($_SESSION['user'])){
                ?>
                <li><a href="#"><?php echo $_SESSION['user'] ?> </a>
                    <ul>
                        <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
                    </ul></li>

                <?php
            }else{
                ?>
                <li><a href="login.php">Login</a> </li>

                <?php
            }

            ?>

        </ul>
    </nav>

</div>