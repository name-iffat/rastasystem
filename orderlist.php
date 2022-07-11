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
        $result = oci_parse($connection,"SELECT ORDER_ID, ORDER_DATE, NOTES, TOTAL, O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE
        FROM ORDERS O JOIN EMPLOYEE E
        ON O.EMPLOYEE_ID = E.EMPLOYEE_ID
        ORDER BY ORDER_ID");
        oci_execute($result);
        echo "<table border='1'>
        <tr>
        <th>ORDER ID</th>
        <th>ORDER DATE</th>
        <th>NOTES</th>
        <th>TOTAL</th>
        <th>EMPLOYEE ID</th>
        <th>LAST NAME</th>
        <th>PHONE NUMBER</th>
        </tr>";
        while($row = oci_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['ORDER_ID'] . "</td>";
            echo "<td>" . $row['ORDER_DATE'] . "</td>";
            echo "<td>" . $row['NOTES'] . "</td>";
            echo "<td>" . $row['TOTAL'] . "</td>";
            echo "<td>" . $row['EMPLOYEE_ID'] . "</td>";
            echo "<td>" . $row['LAST_NAME'] . "</td>";
            echo "<td>" . $row['PHONE'] . "</td>";
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