<?php
include('connection.php');

echo 'test from adminhome';
session_start();

?>
<html>

</html>
<!DOCTYPE html>

<head>
    <script>
        function logout() {
            return confirm("Log Out?");
        }
    </script>
</head>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./style1.css" rel="stylesheet">
</head>

<body>
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
    <br><br><br><br><br>
    <h1> Welcome, <?php echo $_SESSION['lname']; ?> !</h1>
    <a href="order.php">
        <button>Order Now</button>
    </a>
    <a href="registrationform.php">
        <button>Employee Registration</button>
    </a>
    <a href="employeelist.php">
        <button>List of Employees</button>
    </a>
    <a href="paymentstatus.php">
        <button>Payment Status</button>
    </a>
    <a href="orderlist.php">
        <button>List of Orders</button>
    </a>
    <a href="orderdetailslist.php">
        <button>List of Order Details</button>
    </a>
    <a href="salesinmay.php">
        <button>Sales in the month of May</button>
    </a>
    <a href="salesinjune.php">
        <button>Sales in the month of June</button>
    </a>
    <a href="salesinjuly.php">
        <button>Sales in the month of July</button>
    </a>
    <a href="salesin2022.php">
        <button>Sales in the year of 2022</button>
    </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>