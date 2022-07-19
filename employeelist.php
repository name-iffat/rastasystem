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
    <script>
        function del() {
            return confirm("Do you want to delete data?\nclick OK to proceed");
        }
    </script>
    <div class="table-bg d-flex flex-column align-items-center rounded-4">
    <input type="button" class="button" onclick="location.href='adminhome.php';" value="Back">
<br>
    <?php
    echo '<h5>All employee details</h5>';

    $result = oci_parse($connection, "SELECT * 
        FROM EMPLOYEE
        ORDER BY EMPLOYEE_ID");
    oci_execute($result);
    echo "<table class='container table'>
        <tr>
        <th>EMPLOYEE ID</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>BIRTH DATE</th>
        <th>ADDRESS</th>
        <th>CITY</th>
        <th>STATE</th>
        <th>POSTAL CODE</th>
        <th>COUNTRY</th>
        <th>PHONE</th>
        <th>HIRE DATE</th>
        <th>POSITION</th>
        <th>SUPERVISOR ID</th>
        <th align='center' colspan='2'>ACTION</th>
        </tr>";
    while ($row = oci_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['EMPLOYEE_ID'] . "</td>";
        echo "<td>" . $row['FIRST_NAME'] . "</td>";
        echo "<td>" . $row['LAST_NAME'] . "</td>";
        echo "<td style='width:25%'>" . $row['BIRTH_DATE'] . "</td>";
        echo "<td style='width:25%'>" . $row['ADDRESS'] . "</td>";
        echo "<td>" . $row['CITY'] . "</td>";
        echo "<td>" . $row['STATE'] . "</td>";
        echo "<td>" . $row['POSTAL_CODE'] . "</td>";
        echo "<td>" . $row['COUNTRY'] . "</td>";
        echo "<td>" . $row['PHONE'] . "</td>";
        echo "<td>" . $row['HIRE_DATE'] . "</td>";
        echo "<td>" . $row['POSITION'] . "</td>";
        echo "<td>" . $row['SUPERVISOR_ID'] . "</td>";
        echo "<td width='10%' align='center'><a class='one' onclick='return del()' href='delete_employee.php?EMPLOYEE_ID=" . $row['EMPLOYEE_ID'] . "'><button class='button'>Delete</button></a></td>";

        echo "</tr>";
    }
    echo "</table>";
    ?>
    <div class="buttonContainer text-center">
            <input type="button" class="button mt-3" onclick="location.href='adminhome.php';" value="Back">
                    </div>
    </div>
</div>
</body>

</html>