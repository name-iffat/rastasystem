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
                                <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                                <li class="nav-item"><a class="nav-link" href="adminlogin.php" onClick="return logout()">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
        <div class="container table-bg align-items-center rounded-4">
    <?php
        $result = oci_parse($connection,"SELECT O.ORDER_ID, SUM(OD.QUANTITY) , SUM(OD.SUBTOTAL), O.NOTES, O.ORDER_DATE, O.EMPLOYEE_ID, E.LAST_NAME
        FROM ORDER_DETAILS OD JOIN ORDERS O
        ON OD.ORDER_ID = O.ORDER_ID
        JOIN EMPLOYEE E
        ON E.EMPLOYEE_ID = O.EMPLOYEE_ID
        GROUP BY O.ORDER_ID, O.ORDER_DATE, O.NOTES, O.EMPLOYEE_ID, E.LAST_NAME
        ORDER BY ORDER_ID");
        oci_execute($result);
        echo "<table class='container table'>
        <tr>
        <th>ORDER ID</th>
        <th>QUANTITY</th>
        <th>SUBTOTAL</th>
        <th>NOTES</th>
        <th>ORDER DATE</th>
        <th>EMPLOYEE ID</th>
        <th>LAST NAME</th>
        </tr>";
        while($row = oci_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['ORDER_ID'] . "</td>";      
            echo "<td>" . $row['SUM(OD.QUANTITY)'] . "</td>";
            echo "<td>" . $row['SUM(OD.SUBTOTAL)'] . "</td>";
            echo "<td>" . $row['NOTES'] . "</td>";
            echo "<td>" . $row['ORDER_DATE'] . "</td>";
            echo "<td>" . $row['EMPLOYEE_ID'] . "</td>";
            echo "<td>" . $row['LAST_NAME'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <?php
        $result1 = oci_parse($connection,"SELECT COUNT(ORDER_ID)
        FROM ORDERS");
        oci_execute($result1);
        $row = oci_fetch_array($result1, OCI_ASSOC);  
        $count = oci_num_rows($result1); 
        ?>
        <p> TOTAL ORDERS : <?php echo $row['COUNT(ORDER_ID)'] ?></p>
    </div>
    </div>
    </body>
</html>