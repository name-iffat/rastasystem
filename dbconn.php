<?php

    $username = "AYAMGUNTINGRASTA";
    $password = "123";
    $host = "localhost:1521/xe";

    $dbconn = oci_connect($username,$password,$host);

    if(!$dbconn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),
        E_USER_ERROR);
    } 
    else{
        $stid = oci_parse($dbconn, 'SELECT * FROM EMPLOYEE');
        oci_execute($stid);

        echo "<table border='1'>\n";
        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
         echo "<tr>\n";
        foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
        }
        echo "</tr>\n";
        }
        echo "</table>\n";
        echo 'Connected';
        $stid = oci_parse($dbconn, 'SELECT * FROM MENU');
        oci_execute($stid);

        echo "<table border='1'>\n";
        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
         echo "<tr>\n";
        foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
        }
        echo "</tr>\n";
        }
        echo "</table>\n";
    }
?>