<?php

    $username = "AYAMGUNTINGRASTA";
    $password = "system";
    $host = "localhost:1521/xe";

    $dbconn = oci_connect($username,$password,$host);

    if(!$dbconn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),
        E_USER_ERROR);
    } 
    else{
        
    }
?>