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
        $result = oci_parse($connection,"SELECT EMPLOYEE_ID, SUM(TOTAL) 
        FROM ORDERS
        GROUP BY EMPLOYEE_ID
        ORDER BY EMPLOYEE_ID");
        oci_execute($result);
        echo 'Total Sale from each employee according to TABLE ORDERS';
        echo "<table border='1'>
        <tr>
        <th>EMPLOYEE ID</th>
        <th>TOTAL SALE</th>
        </tr>";
        while($row = oci_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['EMPLOYEE_ID'] . "</td>";
            echo "<td>" . $row['SUM(TOTAL)'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo 'All employee details';
        $result = oci_parse($connection,"SELECT * 
        FROM EMPLOYEE
        ORDER BY EMPLOYEE_ID");
        oci_execute($result);
        echo "<table border='1'>
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
        </tr>";
        while($row = oci_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['EMPLOYEE_ID'] . "</td>";
            echo "<td>" . $row['FIRST_NAME'] . "</td>";
            echo "<td>" . $row['LAST_NAME'] . "</td>";
            echo "<td>" . $row['BIRTH_DATE'] . "</td>";
            echo "<td>" . $row['ADDRESS'] . "</td>";
            echo "<td>" . $row['CITY'] . "</td>";
            echo "<td>" . $row['STATE'] . "</td>";
            echo "<td>" . $row['POSTAL_CODE'] . "</td>";
            echo "<td>" . $row['COUNTRY'] . "</td>";
            echo "<td>" . $row['PHONE'] . "</td>";
            echo "<td>" . $row['HIRE_DATE'] . "</td>";
            echo "<td>" . $row['POSITION'] . "</td>";
            echo "<td>" . $row['SUPERVISOR_ID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>