<?php
include_once 'connection.php';
$query = oci_parse($connection, "DELETE FROM ORDERS WHERE ORDER_ID='" . $_GET["ORDER_ID"] . "'");
$result = oci_execute($query, OCI_DEFAULT);
if ($result) {
    oci_commit($connection); //*** Commit Transaction ***// 
    echo "Data Deleted Successfully.";
    echo
    "<script type='text/javascript'>
        window.location = 'orderlist.php'
    </script>";
} else {
    echo "Error.";
}
