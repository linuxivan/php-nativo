<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

function register($username, $password, $name, $phone, $email, $imagen){
    require "mdl/database.php";
    

    $conn = connectBD();

    $sql = 'SELECT * FROM usuarios WHERE usuario = :username';
    $select_sql= oci_parse($conn, $sql);

    oci_bind_by_name($select_sql, ":username", $username);

    oci_execute($select_sql);

    $row = oci_fetch_object($select_sql);
    if(oci_num_rows($select_sql) == 0){
        $archivo = $imagen['name'];

        if(isset($archivo) && $archivo != ""){
             $temp = $imagen['tmp_name'];
             $tipo =$imagen['type'];
             if (move_uploaded_file($temp, 'img/' . $archivo)){
                $ruta = "img/" . $archivo;
                
                $passcif = password_hash($password, PASSWORD_DEFAULT);
                $sql = 'INSERT INTO usuarios (usuario, pasw, nombre, telefono, email, imagen) VALUES(:username, :passw, :name, :phone, :email, :ruta)';
                $insert_sql= oci_parse($conn, $sql);
                oci_bind_by_name($insert_sql, ":username", $username);
                oci_bind_by_name($insert_sql, ":passw", $passcif);
                oci_bind_by_name($insert_sql, ":name", $name);
                oci_bind_by_name($insert_sql, ":phone", $phone);
                oci_bind_by_name($insert_sql, ":email", $email);
                oci_bind_by_name($insert_sql, ":ruta", $ruta);

        
        
                oci_execute($insert_sql);
        
                oci_free_statement($insert_sql);
                oci_free_statement($select_sql);
        
                oci_close($conn);
        
                return true;
     
             }else{
                 echo "Error al subir la Imagen";
             }
        }else{
            $passcif = password_hash($password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO usuarios (usuario, pasw, nombre, telefono, email) VALUES(:username, :passw, :name, :phone, :email)';
            $insert_sql= oci_parse($conn, $sql);
            oci_bind_by_name($insert_sql, ":username", $username);
            oci_bind_by_name($insert_sql, ":passw", $passcif);
            oci_bind_by_name($insert_sql, ":name", $name);
            oci_bind_by_name($insert_sql, ":phone", $phone);
            oci_bind_by_name($insert_sql, ":email", $email);
    
    
            oci_execute($insert_sql);
    
            oci_free_statement($insert_sql);
            oci_free_statement($select_sql);
    
            oci_close($conn);
    
            return true;
        }
             
    }else{
        return false;   
    }


}