<?php
    include('connection.php');
?>
<html>
    <head>
        <style>
            table{
                border-style:solid;
                border-width:2px;
                 border-color:pink;
            }
        </style>
    </head>
    <body>
    <?php
        $result = oci_parse($connection,"SELECT O.ORDER_ID, SUM(OD.QUANTITY) , SUM(OD.SUBTOTAL), O.NOTES, O.ORDER_DATE, O.EMPLOYEE_ID, E.LAST_NAME
        FROM ORDER_DETAILS OD JOIN ORDERS O
        ON OD.ORDER_ID = O.ORDER_ID
        JOIN EMPLOYEE E
        ON E.EMPLOYEE_ID = O.EMPLOYEE_ID
        GROUP BY O.ORDER_ID, O.ORDER_DATE, O.NOTES, O.EMPLOYEE_ID, E.LAST_NAME
        ORDER BY ORDER_ID");
        oci_execute($result);
        echo "<table border='1'>
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
    </body>
</html>