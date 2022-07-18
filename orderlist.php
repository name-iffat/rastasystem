<?php
include('connection.php');
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
</head>

<body class="section-admin">
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
    <?php
    $result = oci_parse($connection, "SELECT ORDER_ID, ORDER_DATE, NOTES, TOTAL, O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE
        FROM ORDERS O JOIN EMPLOYEE E
        ON O.EMPLOYEE_ID = E.EMPLOYEE_ID
        ORDER BY ORDER_ID");
    oci_execute($result);
    ?>
    <script>
        function del() {
            return confirm("Do you want to delete data?\nclick OK to proceed");
        }
    </script>
    <div class="container table-bg align-items-center rounded-4">
    <input type="button" class="button mb-3" onclick="location.href='adminhome.php';" value="Back">
    <table class="container table">
        <tr>
            <th>ORDER ID</th>
            <th>ORDER DATE</th>
            <th>NOTES</th>
            <th>TOTAL</th>
            <th>EMPLOYEE ID</th>
            <th>LAST NAME</th>
            <th>PHONE NUMBER</th>
        </tr>
        <?php
        while ($row = oci_fetch_array($result)) {
        ?>
            <tr>
                <td> <?php echo $row['ORDER_ID']; ?> </td>
                <td> <?php echo $row['ORDER_DATE']; ?></td>
                <td> <?php echo $row['NOTES']; ?> </td>
                <td> <?php echo $row['TOTAL']; ?></td>
                <td> <?php echo $row['EMPLOYEE_ID']; ?> </td>
                <td> <?php echo $row['LAST_NAME']; ?> </td>
                <td> <?php echo $row['PHONE']; ?> </td>

            </tr>
        <?php
        } ?>
    </table>


    <?php
    $result1 = oci_parse($connection, "SELECT COUNT(ORDER_ID)
        FROM ORDERS");
    oci_execute($result1);
    $row = oci_fetch_array($result1, OCI_ASSOC);
    $count = oci_num_rows($result1);
    ?>

    <p class="text-center"> TOTAL ORDERS : <?php echo $row['COUNT(ORDER_ID)'] ?></p>

    </div>
    </div>
</body>

</html>