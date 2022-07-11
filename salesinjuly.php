<?php
    include('connection.php');
?>
<html>
    <head>
        <style>
            table{
                border-style:solid;
                border-width:10px;
                 border-color:pink;
            }
        </style>
    </head>
    <body>
        <?php
        $result = oci_parse($connection,"SELECT O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE, SUM(OD.QUANTITY), SUM(OD.SUBTOTAL)
        FROM ORDER_DETAILS OD JOIN ORDERS O
        ON OD.ORDER_ID = O.ORDER_ID
        JOIN EMPLOYEE E
        ON O.EMPLOYEE_ID = E.EMPLOYEE_ID
        WHERE TO_CHAR(O.ORDER_DATE, 'MM') = 07
        GROUP BY O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE
        ORDER BY O.EMPLOYEE_ID");
        oci_execute($result);
        echo "<table border='1'>
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
            echo "<td>" . $row['SUM(OD.QUANTITY)'] . "</td>";
            echo "<td>" . $row['SUM(OD.SUBTOTAL)'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
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
    </body>
</html>