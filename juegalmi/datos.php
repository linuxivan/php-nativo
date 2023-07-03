<?php
    function conectarBBDD()
    {
        $mysqli = new mysqli("127.0.0.1", "root", 
                                "", "juegalmi2");

        mysqli_set_charset($mysqli, "utf8");
        
        if($mysqli->connect_errno)
        {
            echo "Fallo en la conexión: ".$mysqli->connect_errno;
        }

        return $mysqli;
    }

    function get_juegos_genero($id_genero)
    {
        $mysqli = conectarBBDD();

        $sql = "SELECT * FROM Juego WHERE id_genero = ?";
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("i", $id_genero);
        if(!$asignar)
        {
            echo "Fallo en la asignación de parámetros: ".$mysqli->errno;
        }
        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $id = -1;
        $titulo = "";
        $descripcion = "";
        $imagen = "";
        $precio = -1;
        $id_genero = -1;
        $enlace = "";
        $id_usuario = -1;
        $vincular = $sentencia->bind_result($id, $titulo, $descripcion, $precio, $imagen, $id_genero, $enlace, $id_usuario);
        if(!$vincular)
        {
            echo "Fallo al asociar parámetros: ".$mysqli->errno;
        }

        $juegos = array();
        while($sentencia->fetch())
        {
            $juego = array(
                "id" => $id,
                "titulo" => $titulo,
                "descripcion" => $descripcion,
                "precio" => $precio,
                "imagen" => $imagen,
                "id_genero" => $id_genero,
                "enlace" => $enlace
            );
            $juegos[] = $juego;
        }

        $mysqli->close();
        return $juegos;
    }

    function get_juegos()
    {
        $mysqli = conectarBBDD();

        $sql = "SELECT * FROM Juego";
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $id = -1;
        $titulo = "";
        $descripcion = "";
        $imagen = "";
        $precio = -1;
        $id_genero = -1;
        $enlace = "";
        $id_usuario = -1;
        $vincular = $sentencia->bind_result($id, $titulo, $descripcion, $precio, $imagen, $id_genero, $enlace, $id_usuario);
        if(!$vincular)
        {
            echo "Fallo al asociar parámetros: ".$mysqli->errno;
        }

        $juegos = array();
        while($sentencia->fetch())
        {
            $juego = array(
                "id" => $id,
                "titulo" => $titulo,
                "descripcion" => $descripcion,
                "precio" => $precio,
                "imagen" => $imagen,
                "id_genero" => $id_genero,
                "enlace" => $enlace,
                "id_usuario" => $id_usuario
            );
            $juegos[] = $juego;
        }

        $mysqli->close();
        return $juegos;
    }
    function get_juegos_limit($from, $cuant)
    {
        $mysqli = conectarBBDD();

        $sql = "SELECT * FROM Juego LIMIT $from, $cuant";
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $id = -1;
        $titulo = "";
        $descripcion = "";
        $imagen = "";
        $precio = -1;
        $id_genero = -1;
        $enlace = "";
        $id_usuario = -1;
        $vincular = $sentencia->bind_result($id, $titulo, $descripcion, $precio, $imagen, $id_genero, $enlace, $id_usuario);
        if(!$vincular)
        {
            echo "Fallo al asociar parámetros: ".$mysqli->errno;
        }

        $juegos = array();
        while($sentencia->fetch())
        {
            $juego = array(
                "id" => $id,
                "titulo" => $titulo,
                "descripcion" => $descripcion,
                "precio" => $precio,
                "imagen" => $imagen,
                "id_genero" => $id_genero,
                "enlace" => $enlace,
                "id_usuario" => $id_usuario
            );
            $juegos[] = $juego;
        }

        $mysqli->close();
        return $juegos;
    }

    function get_juego_by_id($id)
    {
        $mysqli = conectarBBDD();

        $sql = "SELECT * FROM Juego WHERE id_juego = ?";
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("i", $id);
        if(!$asignar)
        {
            echo "Fallo en la asignación de parámetros: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $id = -1;
        $titulo = "";
        $descripcion = "";
        $imagen = "";
        $precio = -1;
        $id_genero = -1;
        $enlace = "";
        $id_usuario = -1;
        $vincular = $sentencia->bind_result($id, $titulo, $descripcion, $precio, $imagen, $id_genero, $enlace, $id_usuario);
        if(!$vincular)
        {
            echo "Fallo al asociar parámetros: ".$mysqli->errno;
        }
        $juego = array();

        if($sentencia->fetch())
        {
            $juego = array(
                "id" => $id,
                "titulo" => $titulo,
                "descripcion" => $descripcion,
                "precio" => $precio,
                "imagen" => $imagen,
                "id_genero" => $id_genero,
                "enlace" => $enlace,
                "id_usuario" => $id_usuario
            );
        }

        $mysqli->close();
        return $juego;
    }

    function crear_juego($titulo, $descripcion, $precio, $imagen, $genero, $id_usuario)
    {

        $mysqli = conectarBBDD();
        $sql = "INSERT INTO Juego(nombre, descripcion, precio, imagen, id_genero, id_usuario)
                    VALUES (?, ?, ?, ?, ?, ?)";
        
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("ssdsii", $titulo, $descripcion, $precio, $imagen, $genero, $id_usuario);
        if(!$asignar)
        {
            echo "Fallo en la asignación de parámetros: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $mysqli->close();
        return $ejecucion;
    }

    function update_juego($id_juego, $titulo, $descripcion, $precio, $imagen, $genero)
    {

        $mysqli = conectarBBDD();
        $sql = "UPDATE Juego SET nombre = ?, descripcion = ?, precio = ?, imagen = ?, id_genero = ? WHERE id_juego = ?";
        
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("ssdsii", $titulo, $descripcion, $precio, $imagen, $genero, $id_juego);
        if(!$asignar)
        {
            echo "Fallo en la asignación de parámetros: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $mysqli->close();
        return $ejecucion;
    }

    function delete_juego($id_juego)
    {

        $mysqli = conectarBBDD();
        $sql = "DELETE FROM Juego WHERE id_juego = ?";
        
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("i", $id_juego);
        if(!$asignar)
        {
            echo "Fallo en la asignación de parámetros: ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }

        $mysqli->close();
        return $ejecucion;
    }

    function get_tipos()
    {
        $mysqli = conectarBBDD();
        $sql = "SELECT * FROM Genero";
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }
        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }
        $tipos = array();
        $id_genero = -1;
        $nombre_genero = "";
        $vincular = $sentencia->bind_result($id_genero, $nombre_genero);
        if(!$vincular)
        {
            echo "Fallo al asociar parámetros: ".$mysqli->errno;
        }
        while($sentencia->fetch())
        {
            $tipo = array(
                "id" => $id_genero,
                "nombre" => $nombre_genero
            );
            $tipos[] = $tipo;
        }
        $mysqli->close();
        return $tipos;
    }

    function login($user, $password)
    {
        $mysqli = conectarBBDD();
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }
        $asignar = $sentencia->bind_param("ss", $user, $password);
        if(!$asignar)
        {
            echo "Fallo en la asignación de parámetros: ".$mysqli->errno;
        }
        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }
        $existe = false;
        if($sentencia->fetch())
        {
            $existe = true;
        }
        $mysqli->close();
        return $existe;
    }

    function get_user_id($user)
    {
        $mysqli = conectarBBDD();
        $sql = "SELECT id_usuario FROM usuarios WHERE usuario = ?";
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia: ".$mysqli->errno;
        }
        $asignar = $sentencia->bind_param("s", $user);
        if(!$asignar)
        {
            echo "Fallo en la asignación de parámetros: ".$mysqli->errno;
        }
        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución: ".$mysqli->errno;
        }
        $id_usuario = -1;
        $vincular = $sentencia->bind_result($id_usuario);
        if(!$vincular)
        {
            echo "Fallo al asociar parámetros: ".$mysqli->errno;
        }
        if($sentencia->fetch())
        {
            return $id_usuario;
        } else
        {
            return -1;
        }
    }
?>