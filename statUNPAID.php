<?php

include('connection.php');

$pay_id = $_GET['payment_id'];

$db = "SELECT * FROM PAYMENT WHERE PAYMENT_ID = '$pay_id'";
$result = oci_parse($connection, $db);
oci_execute($result);
$row = oci_fetch_array($result, OCI_ASSOC);  
$count = oci_num_rows($result); 

if($count == 1){
    $query = "UPDATE PAYMENT SET PAYMENT_STATUS = 'UNPAID' WHERE PAYMENT_ID = '$pay_id'";
    $result2 = oci_parse($connection, $query);
    oci_execute($result2);
    //echo "<script>alert('Payment later Success!')</script>";
    echo "<script>window.open('adminhome.php','_self')</script>";
    //header("Location:adminhome.php");
    //header("Location:adminhome.php");
 }
 else{
    //echo "<script>alert('Payment no later!')</script>";
    echo "<script>window.open('receipt.php','_self')</script>";
    //header("Location:receipt.php");
 }
?>