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
        <div class="container table-bg d-flex flex-column align-items-center rounded-4">

    <?php
        $result = oci_parse($connection,"SELECT O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE, COUNT(ORDER_ID), SUM(TOTAL)
        FROM ORDERS O JOIN EMPLOYEE E
        ON O.EMPLOYEE_ID = E.EMPLOYEE_ID
        WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 07
        GROUP BY O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE
        ORDER BY O.EMPLOYEE_ID");
        oci_execute($result);
        echo "<table class='table'>
        <tr>
        <th>EMPLOYEE ID</th>
        <th>LAST NAME</th>
        <th>PHONE NUMBER</th>
        <th>TOTAL ORDERS</th>
        <th>TOTAL SALES</th>
        </tr>";
        while($row = oci_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['EMPLOYEE_ID'] . "</td>";
            echo "<td>" . $row['LAST_NAME'] . "</td>";
            echo "<td>" . $row['PHONE'] . "</td>";
            echo "<td>" . $row['COUNT(ORDER_ID)'] . "</td>";
            echo "<td>" . $row['SUM(TOTAL)'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <?php
         $result2 = oci_parse($connection,"SELECT COUNT(ORDER_ID)
         FROM ORDERS 
         WHERE TO_CHAR(ORDER_DATE, 'MM') = 07");
         oci_execute($result2);
         $row = oci_fetch_array($result2, OCI_ASSOC);  
         $count = oci_num_rows($result2); 
        ?>
        <p> TOTAL ORDERS IN MONTH OF JULY IS : <?php echo $row['COUNT(ORDER_ID)'] ?></p>
        <?php
        $result1 = oci_parse($connection,"SELECT SUM(ODD.SUBTOTAL)
        FROM ORDER_DETAILS ODD JOIN ORDERS O
        ON ODD.ORDER_ID = O.ORDER_ID
        WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 07");
        oci_execute($result1);
        $row = oci_fetch_array($result1, OCI_ASSOC);  
        $count = oci_num_rows($result1);
        ?>
        <p> TOTAL SALES IN MONTH OF JULY IS : <?php echo $row['SUM(ODD.SUBTOTAL)'] ?></p>
    </div>
    </div>
    </body>
</html>