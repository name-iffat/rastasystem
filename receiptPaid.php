<?php
include("connection.php");
session_start();
$currOrder = $_SESSION['payorderid'];
$db = "SELECT E.LAST_NAME,O.ORDER_ID,O.ORDER_DATE,M.MENU_ID,M.MENU_NAME,X.SUBTOTAL,O.TOTAL,X.QUANTITY, P.PAYMENT_ID
FROM ORDERS O JOIN EMPLOYEE E ON E.EMPLOYEE_ID = O.EMPLOYEE_ID JOIN ORDER_DETAILS X
ON X.ORDER_ID = O.ORDER_ID JOIN MENU M ON M.MENU_ID = X.MENU_ID JOIN PAYMENT P ON P.ORDER_ID = O.ORDER_ID WHERE P.PAYMENT_ID = '$currOrder'";
$result = oci_parse($connection,$db);
oci_execute($result);
$i = 0;
while($row = oci_fetch_array($result)){
    $lastname = $row['LAST_NAME'];
    $orderid = $row['ORDER_ID'];
    $orderdate = $row['ORDER_DATE'];
    $menuname[$i] = $row['MENU_NAME'];
    $subtotal[$i] = $row['SUBTOTAL'];
    $total = $row['TOTAL'];
    $subquantity[$i] = $row['QUANTITY'];
    $payid = $row['PAYMENT_ID'];
    $i++;
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>AYAM RASTA WEB PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
    </head>
    <body>
        <main>
        <div class="container mt-5 pt-5 h-100 d-flex flex-column align-items-center">
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
                                <li class="nav-item"><a class="nav-link" href="adminlogin.php" onClick="return logout()">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container table-bg d-flex flex-column align-items-center rounded-4">
                <table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block text-center">
                                        <h2>Thank you for coming!</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody>
                                                <tr>
                                                <td>Waiter : <?php echo $lastname ?><br>Order #<?php echo $orderid ?><br>Date : <?php echo $orderdate ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td>Menu Name</td>
                                                            <td class='aligncenter'>Quantity(unit)</td>
                                                            <td></td>
                                                            <td class='alignright'>Subtotal(RM)</td>
                                                        </tr>
                                                        <?php
                                                        $totQuantity = 0;
                                                        for($x=0; $x < $i; $x++){
                                                            echo "<tr>";
                                                            echo "<td>" . $menuname[$x] . "</td>";
                                                            echo "<td class='aligncenter'>" . $subquantity[$x] . "</td>";
                                                            echo "<td></td>";
                                                            echo "<td class='alignright'>RM " . $subtotal[$x] . ".00</td>";
                                                            echo "</tr>";
                                                            $totQuantity = $totQuantity + $subquantity[$x];
                                                        }
                                                        ?>
                                                        <!--<tr>
                                                            <td>Service 1</td>
                                                            <td class="alignright">$ 20.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Service 2</td>
                                                            <td class="alignright">$ 10.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Service 3</td>
                                                            <td class="alignright">$ 6.00</td>
                                                        </tr> -->
                                                        <tr class="total">
                                                            <td class="alignleft" width="80%">Total Quantity / Total Price</td>
                                                            <td class="aligncenter"><?php echo $totQuantity ?></td>
                                                            <td></td>
                                                            <td class="alignright">RM <?php echo $total ?>.00</td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block text-center">
                                        <a href="adminhome.php"><button class="button mb-2">Admin Home</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block text-center">
                                        Ayam Gunting Rasta &copy; 2022
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table></div>
        </td>
        <td></td>
    </tr>
</tbody></table></div></div>
                </container>
            </container>
        </main>
    </body>
</html>