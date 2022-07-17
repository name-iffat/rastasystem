<?php
session_start();
include('connection.php');
?>
<html>

<head>
    <style>
        table {
            border-style: solid;
            border-width: 10px;
            border-color: pink;
        }
    </style>
    <script src="jquery-1.7.1.min.js"></script>
</head>

<body>
    <?php
    $id=['paymentid'];
    $result = oci_parse($connection, "SELECT P.ORDER_ID, P.PAYMENT_ID, O.ORDER_DATE, TOTAL, O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE, PAYMENT_STATUS
        FROM ORDERS O JOIN EMPLOYEE E
        ON O.EMPLOYEE_ID = E.EMPLOYEE_ID
        JOIN PAYMENT P
        ON O.ORDER_ID = P.ORDER_ID
        WHERE PAYMENT_STATUS = 'UNPAID'
        ORDER BY ORDER_ID");
    oci_execute($result);
    ?>
    <script>
        function del() {
            return confirm("Do you want to delete data?\nclick OK to proceed");
        }
    </script>
    <input type="button" onclick="location.href='adminhome.php';" value="Back">
    <table border='1'>
        <tr>
            <th>ORDER ID</th>
            <th>ORDER DATE</th>
            <th>EMPLOYEE ID</th>
            <th>LAST NAME</th>
            <th>PHONE NUMBER</th>
            <th>TOTAL</th>
            <th>PAYMENT STATUS</th>
            <th>PAYMENT</th>
        </tr>
        <?php
        while ($row = oci_fetch_array($result)) {
        ?>
            <tr>
                
                    <td> <?php echo $row['ORDER_ID']; ?> </td>
                    <td> <?php echo $row['ORDER_DATE']; ?></td>
                    <td> <?php echo $row['EMPLOYEE_ID']; ?> </td>
                    <td> <?php echo $row['LAST_NAME']; ?> </td>
                    <td> <?php echo $row['PHONE']; ?> </td>
                    <td> <?php echo $row['TOTAL']; ?></td>
                    <td> <?php echo $row['PAYMENT_STATUS']; ?> </td>
                    <td><form method="POST" action="paymentstatus.php">
                    <input type=hidden  name="paymentid" value="<?php echo $row['PAYMENT_ID'] ?>"> 
                    <button type="submit" name="pay" onClick="return confirmpayment()">PAY</button> 
                    </form></td>
            
            </tr>
        <?php
        } ?>
    </table>
    <?php
    $result1 = oci_parse($connection, "SELECT COUNT(PAYMENT_ID)
        FROM PAYMENT
        WHERE PAYMENT_STATUS = 'UNPAID'");
    oci_execute($result1);
    $row = oci_fetch_array($result1, OCI_ASSOC);
    $count = oci_num_rows($result1);
    ?>
    <p> TOTAL UNPAID ORDERS : <?php echo $row['COUNT(PAYMENT_ID)'] ?></p>
</body>
<script>
        function confirmpayment()
        {
          return confirm("Confirm Payment?");
        }
</script>
</html>
<?php 
    if (isset($_POST['pay'])) 
    {
        $id=$_POST['paymentid'];
        $updatepayment=oci_parse($connection, "UPDATE PAYMENT SET PAYMENT_STATUS='PAID' WHERE PAYMENT_ID='$id'");
        oci_execute($updatepayment);
        if($updatepayment)
        {
            $_SESSION['payorderid'] = $id;
            echo "<script>window.open('receiptPaid.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Error!')</script>";
            echo "<script>window.open('paymentstatus.php','_self')</script>";
        }
    }
?>