<?php
    $username = "AYAMGUNTINGRASTA";
    $password = "123";
    $host = "localhost:1521/xe";

    $connection = oci_connect($username,$password,$host);
    if(!$connection) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),
        E_USER_ERROR);
    } 
?>