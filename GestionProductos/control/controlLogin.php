<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

function login($username, $password){
    require "mdl/database.php";

    $conn = connectBD();

    $sql = 'SELECT * FROM usuarios WHERE usuario = :username';
    $select_sql= oci_parse($conn, $sql);

    oci_bind_by_name($select_sql, ":username", $username);

    oci_execute($select_sql);



    $row = oci_fetch_object($select_sql);
    if(oci_num_rows($select_sql) > 0){
        if(password_verify($password, $row->PASW)){
            session_start();
            $_SESSION['imagen'] = $row->IMAGEN;
            $_SESSION['user'] = $username;
            oci_free_statement($select_sql);
            oci_close($conn);
            return true;
        }
    }else{
        return false;   
    }


}