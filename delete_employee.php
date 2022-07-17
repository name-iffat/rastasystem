<?php
include_once 'connection.php';
$query = oci_parse($connection, "DELETE FROM EMPLOYEE WHERE EMPLOYEE_ID='" . $_GET["EMPLOYEE_ID"] . "'");
$result = oci_execute($query, OCI_DEFAULT);
if ($result) {
    oci_commit($connection); //*** Commit Transaction ***// 
    echo "Data Deleted Successfully.";
    echo
    "<script type='text/javascript'>
        window.location = 'employeelist.php'
    </script>";
} else {
    echo "Error.";
}
