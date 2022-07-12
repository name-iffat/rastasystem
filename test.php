<?php
include('connection.php');
$sql3 = oci_parse($connection, "SELECT * FROM ORDERS");
oci_execute($sql3);
$count = oci_fetch($sql3);

echo $count;
?>