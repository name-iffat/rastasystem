<?php
    include('connection.php');
?>
<?php
    $result = oci_parse($connection,"SELECT SUM(JAN.SUBTOTAL)
    FROM ORDER_DETAILS JAN JOIN ORDERS O
    ON JAN.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 01");

    $result2 = oci_parse($connection,"SELECT SUM(FEB.SUBTOTAL)
    FROM ORDER_DETAILS FEB JOIN ORDERS O
    ON FEB.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 02");

    $result3 = oci_parse($connection,"SELECT SUM(MAC.SUBTOTAL)
    FROM ORDER_DETAILS MAC JOIN ORDERS O
    ON MAC.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 03");

    $result4 = oci_parse($connection,"SELECT SUM(APR.SUBTOTAL)
    FROM ORDER_DETAILS APR JOIN ORDERS O
    ON APR.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 04");

    $result5 = oci_parse($connection,"SELECT SUM(MAY.SUBTOTAL)
    FROM ORDER_DETAILS MAY JOIN ORDERS O
    ON MAY.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 05");

    $result6 = oci_parse($connection,"SELECT SUM(JUN.SUBTOTAL)
    FROM ORDER_DETAILS JUN JOIN ORDERS O
    ON JUN.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 06");

    $result7 = oci_parse($connection,"SELECT SUM(JUL.SUBTOTAL)
    FROM ORDER_DETAILS JUL JOIN ORDERS O
    ON JUL.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 07");

    $result8 = oci_parse($connection,"SELECT SUM(AUG.SUBTOTAL)
    FROM ORDER_DETAILS AUG JOIN ORDERS O
    ON AUG.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 08");

    $result9 = oci_parse($connection,"SELECT SUM(SEP.SUBTOTAL)
    FROM ORDER_DETAILS SEP JOIN ORDERS O
    ON SEP.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 09"); 

    $result10 = oci_parse($connection,"SELECT SUM(OCT.SUBTOTAL)
    FROM ORDER_DETAILS OCT JOIN ORDERS O
    ON OCT.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 10");

    $result11 = oci_parse($connection,"SELECT SUM(NOV.SUBTOTAL)
    FROM ORDER_DETAILS NOV JOIN ORDERS O
    ON NOV.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 11");

    $result12 = oci_parse($connection,"SELECT SUM(DEC.SUBTOTAL)
    FROM ORDER_DETAILS DEC JOIN ORDERS O
    ON DEC.ORDER_ID = O.ORDER_ID
    WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 12");
    
    oci_execute($result);
    $row = oci_fetch_array($result, OCI_ASSOC);  
    $count = oci_num_rows($result);

    oci_execute($result2);
    $row2 = oci_fetch_array($result2, OCI_ASSOC);  
    $count = oci_num_rows($result2);

    oci_execute($result3);
    $row3 = oci_fetch_array($result3, OCI_ASSOC);  
    $count = oci_num_rows($result3); 

    oci_execute($result4);
    $row4 = oci_fetch_array($result4, OCI_ASSOC);  
    $count = oci_num_rows($result4);

    oci_execute($result5);
    $row5 = oci_fetch_array($result5, OCI_ASSOC);  
    $count = oci_num_rows($result5);

    oci_execute($result6);
    $row6 = oci_fetch_array($result6, OCI_ASSOC);  
    $count = oci_num_rows($result6); 

    oci_execute($result7);
    $row7 = oci_fetch_array($result7, OCI_ASSOC);  
    $count = oci_num_rows($result7);

    oci_execute($result8);
    $row8 = oci_fetch_array($result8, OCI_ASSOC);  
    $count = oci_num_rows($result8);

    oci_execute($result9);
    $row9 = oci_fetch_array($result9, OCI_ASSOC);  
    $count = oci_num_rows($result9); 

    oci_execute($result10);
    $row10 = oci_fetch_array($result10, OCI_ASSOC);  
    $count = oci_num_rows($result10);

    oci_execute($result11);
    $row11 = oci_fetch_array($result11, OCI_ASSOC);  
    $count = oci_num_rows($result11);

    oci_execute($result12);
    $row12 = oci_fetch_array($result12, OCI_ASSOC);  
    $count = oci_num_rows($result12); 
 
 $dataPoints = array(
     array("label"=> "JAN", "y"=> 0),
     array("label"=> "FEB", "y"=> 0),
     array("label"=> "MAC", "y"=> 0),
     array("label"=> "APR", "y"=> 0),
     array("label"=> "MAY", "y"=> $row5['SUM(MAY.SUBTOTAL)']),
     array("label"=> "JUN", "y"=> $row6['SUM(JUN.SUBTOTAL)'],"indexLabel"=> "Lowest"),
     array("label"=> "JUL", "y"=> $row7['SUM(JUL.SUBTOTAL)'], "indexLabel"=> "Highest"),
     array("label"=> "AUG", "y"=> 0),
     array("label"=> "SEP", "y"=> 0),
     array("label"=> "OCT", "y"=> 0),
     array("label"=> "NOV", "y"=> 0),
     array("label"=> "DEC", "y"=> 0),
 );
     
 ?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="./style.css" rel="stylesheet">
        <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "SALES IN THE YEAR OF 2022"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
    <script>
        function logout() {
            return confirm("Log Out?");
        }
    </script>
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
        <input type="button" class="button mb-3" onclick="location.href='adminhome.php';" value="Back">
        <?php
        $result = oci_parse($connection,"SELECT O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE, COUNT(ORDER_ID), SUM(TOTAL)
        FROM ORDERS O
        JOIN EMPLOYEE E
        ON O.EMPLOYEE_ID = E.EMPLOYEE_ID
        WHERE TO_CHAR(O.ORDER_DATE, 'YYYY') = 2022
        GROUP BY O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE
        ORDER BY O.EMPLOYEE_ID");
        oci_execute($result);
        echo "<table class='table'>
        <tr>
        <th>EMPLOYEE ID</th>
        <th>LAST NAME</th>
        <th>PHONE NUMBER</th>
        <th>TOTAL QUANTITY</th>
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
        WHERE TO_CHAR(ORDER_DATE, 'YYYY') = 2022");
        oci_execute($result2);
        $row = oci_fetch_array($result2, OCI_ASSOC);  
        $count = oci_num_rows($result2); 
        ?>
        <p> TOTAL ORDERS IN YEAR OF 2022 IS : <?php echo $row['COUNT(ORDER_ID)'] ?></p>
        <?php
        $result1 = oci_parse($connection,"SELECT SUM(ODD.SUBTOTAL)
        FROM ORDER_DETAILS ODD JOIN ORDERS O
        ON ODD.ORDER_ID = O.ORDER_ID
        WHERE TO_CHAR(O.ORDER_DATE, 'YYYY') = 2022");
        oci_execute($result1);
        $row = oci_fetch_array($result1, OCI_ASSOC);  
        $count = oci_num_rows($result1); 
        ?>
        <p> TOTAL SALES IN YEAR OF 2022 IS : <?php echo $row['SUM(ODD.SUBTOTAL)'] ?></p>
    </div>
    <br>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
    </body>
</html>
