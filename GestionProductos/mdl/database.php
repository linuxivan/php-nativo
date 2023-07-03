<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

function connectBD(){
    $username = "mykingdom";
    $password = "mykingdom";
    $cadenaConexion= "(DESCRIPTION=(ADDRESS=(PROTOCOL=tcp) (HOST=192.168.6.209) (PORT=1521)) (CONNECT_DATA=(SERVICE_NAME=ORCLCDB)))";

    $conn = oci_connect($username, $password, $cadenaConexion);

    if (!$conn) {
        $e = oci_error();
        return trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }else{
        return $conn;
    }
}

$conn = connectBD();





/*$sql = 'SELECT last_name FROM employees WHERE department_id = :dpid ';

$stid = oci_parse($conn, $sql);
$didbv = 60;

oci_bind_by_name($stid, ':dpid ', $didbv);
oci_execute($stid);

while (($row = oci_fetch_object($stid)) != false) {
    echo $row->last_name ."<br>\n";
}


oci_free_statement($stid);
oci_close($conn);

*/

 /*   $select_sql= oci_parse($conn, 'SELECT usuario FROM usuarios');
    oci_execute($select_sql);

    while (($row = oci_fetch_object($select_sql)) != false) {
        // Use upper case attribute names for each standard Oracle column
        echo $row->USUARIO . "<br>\n";
        //echo $row->CONTRASEÑA . "<br>\n"; 
    }

    //oci_free_statement($stid);
    oci_close($conn);
*/
    ?>