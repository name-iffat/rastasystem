<?php
include('connection.php');
?>
<html>

<head>
    <style>
        table {
            border-style: solid;
            border-width: 2px;
            border-color: pink;
        }
    </style>
</head>

<body>
    <script>
        function del() {
            return confirm("Do you want to delete data?\nclick OK to proceed");
        }
    </script>
    <input type="button" onclick="location.href='adminhome.php';" value="Back">

    <?php
    echo 'All employee details';

    $result = oci_parse($connection, "SELECT * 
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
        <th align='center' colspan='2'>ACTION</th>
        </tr>";
    while ($row = oci_fetch_array($result)) {
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
        echo "<td width='10%' align='center'><a class='one' onclick='return del()' href='delete_employee.php?EMPLOYEE_ID=" . $row['EMPLOYEE_ID'] . "'>Delete</a></td>";

        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>