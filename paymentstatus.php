<?php
session_start();
include('connection.php');
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
    <script src="jquery-1.7.1.min.js"></script>
</head>

<body class="section-admin">
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
                    <div class="container px-4 px-lg-5">
                        <a class="navbar-brand" href="adminhome.php"><img class="img-fluid" src="./images/Logo2.png"></a>
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            Menu
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                                <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
                                <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                                <li class="nav-item"><a class="nav-link" href="adminlogin.php" onClick="return logout()">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
<div class="container mt-5 pt-5 h-100 d-flex flex-column align-items-center justify-content-center">
                
                <div class="container table-bg align-items-center rounded-4">
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
    <table class="table table-responsive">
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
                    <button type="submit" class="button" name="pay" onClick="return confirmpayment()">PAY</button> 
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
</div>
    </div>
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