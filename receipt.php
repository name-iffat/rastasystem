<?php
include("connection.php");
session_start();
$currOrder = $_SESSION['orderId'];
$db = "SELECT E.LAST_NAME,O.ORDER_ID,O.ORDER_DATE,M.MENU_ID,M.MENU_NAME,X.SUBTOTAL,O.TOTAL,X.QUANTITY, P.PAYMENT_ID
FROM ORDERS O JOIN EMPLOYEE E ON E.EMPLOYEE_ID = O.EMPLOYEE_ID JOIN ORDER_DETAILS X
ON X.ORDER_ID = O.ORDER_ID JOIN MENU M ON M.MENU_ID = X.MENU_ID JOIN PAYMENT P ON P.ORDER_ID = O.ORDER_ID WHERE O.ORDER_ID = '$currOrder'";
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap');
    html{
    font-family: "Anton", sans-serif;
    font-size: 12px;
    box-sizing: border-box;
    scroll-behavior: smooth;
    color: #ff0000e7;         /* Text Color for about us description */
    background: rgb(169, 209, 99); /* whole page background */
    }
    a{
    color: rgb(101, 255, 255);
    text-decoration: none;

    /* color for footer section */
    }
    a:hover{
    color: rgba(14, 18, 249, 0.89);
    /* color for footer section when mouse interact */
    }
    img{
    width: 100%;
    max-width: 100%;
}

.topnav{
    background-color: rgb(208, 255, 0);
    overflow: hidden;
}

.topnav a{
    float: left;
    color: #ff0000;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover{
    background-color: rgb(255, 0, 0);
    color: rgb(238, 255, 0);
}

.container{
    width: 100%;
    max-width: 90rem;
    margin: 0 auto;
}

nav{
    width: 110%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid rgba(226, 175, 175, 0.2);
}

.nav-pic{
    width: 7rem;
}

.nav-pic a img{
    border-radius: 50%;
}

/* -------------------------------------
    GLOBAL
    A very basic CSS reset
------------------------------------- */
* {
    margin: 0;
    padding: 0;
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    box-sizing: border-box;
    font-size: 14px;
}

img {
    max-width: 100%;
}

body {
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 100% !important;
    height: 100%;
    line-height: 1.6;
}

/* Let's make sure all tables have defaults */
table td {
    vertical-align: top;
}

/* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
body {
    background-color: #f6f6f6;
}

.body-wrap {
    background-color: #f6f6f6;
    width: 100%;
}

.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    /* makes it centered */
    clear: both !important;
}

.content {
    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
    background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
}

.content-wrap {
    padding: 20px;
}

.content-block {
    padding: 0 0 20px;
}

.header {
    width: 100%;
    margin-bottom: 20px;
}

.footer {
    width: 100%;
    clear: both;
    color: #999;
    padding: 20px;
}
.footer a {
    color: #999;
}
.footer p, .footer a, .footer unsubscribe, .footer td {
    font-size: 12px;
}

/* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
    font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    color: #000;
    margin: 40px 0 0;
    line-height: 1.2;
    font-weight: 400;
}

h1 {
    font-size: 32px;
    font-weight: 500;
}

h2 {
    font-size: 24px;
}

h3 {
    font-size: 18px;
}

h4 {
    font-size: 14px;
    font-weight: 600;
}

p, ul, ol {
    margin-bottom: 10px;
    font-weight: normal;
}
p li, ul li, ol li {
    margin-left: 5px;
    list-style-position: inside;
}

/* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
a {
    color: #1ab394;
    text-decoration: underline;
}

.btn-primary {
    text-decoration: none;
    color: #FFF;
    background-color: #1ab394;
    border: solid #1ab394;
    border-width: 5px 10px;
    line-height: 2;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border-radius: 5px;
    text-transform: capitalize;
}

/* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
.last {
    margin-bottom: 0;
}

.first {
    margin-top: 0;
}

.aligncenter {
    text-align: center;
}

.alignright {
    text-align: right;
}

.alignleft {
    text-align: left;
}

.clear {
    clear: both;
}

/* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
.alert {
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;
}
.alert a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
}
.alert.alert-warning {
    background: #f8ac59;
}
.alert.alert-bad {
    background: #ed5565;
}
.alert.alert-good {
    background: #1ab394;
}

/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
    margin: 40px auto;
    text-align: left;
    width: 80%;
}
.invoice td {
    padding: 5px 0;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333; */
    font-weight: 700;
}

    </style>
    </head>
    <body>
        <main>
            <container>
                <div class="container">
                    <nav>
                        <div class="nav-pic">
                            <a href="index.php">
                                <img src="images/Logo2.png" alt="" />
                            </a>
                        </div>
                        <div class="topnav">
                            <a href="index.php">Home</a>
                            <a href="index.php">Our Menu</a>
                            <a href="index.php">About us</a>
                            <a href="index.php">Contact us</a>
                        </div>
                    </nav>
                </div>
                <container>
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
                                    <td class="content-block">
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
                                    <td class="content-block">
                                        <a href="statUNPAID.php?payment_id=<?php echo $payid; ?>">Pay later</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                    <a href="statPAID.php?payment_id=<?php echo $payid; ?>">Pay Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <a href="adminhome.php">Return to Admin Home</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        -Company address here-
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody><tr>
                            <td class="aligncenter content-block">Suggestions? Email <a href="mailto:">support@company.inc</a></td>
                        </tr>
                    </tbody></table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>
                </container>
            </container>
        </main>
    </body>
</html>