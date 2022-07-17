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
        $result = oci_parse($connection,"SELECT O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE, COUNT(ORDER_ID), SUM(TOTAL)
        FROM ORDERS O JOIN EMPLOYEE E
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
    </body>
</html>