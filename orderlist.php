<?php
include('connection.php');
?>
<html>

<head>
    <style>
        table {
            border-style: solid;
            border-width: 10px;
            border-color: pink;
        }
    </style>
</head>

<body>
    <?php
    $result = oci_parse($connection, "SELECT ORDER_ID, ORDER_DATE, NOTES, TOTAL, O.EMPLOYEE_ID, E.LAST_NAME, E.PHONE
        FROM ORDERS O JOIN EMPLOYEE E
        ON O.EMPLOYEE_ID = E.EMPLOYEE_ID
        ORDER BY ORDER_ID");
    oci_execute($result);
    ?>
    <script>
        function del() {
            return confirm("Do you want to delete data?\nclick OK to proceed");
        }
    </script>
    <input type="button" onclick="location.href='adminhome.php';" value="Back">
    <table border='1'>
        <tr>
            <th>ORDER ID</th>
            <th>ORDER DATE</th>
            <th>NOTES</th>
            <th>TOTAL</th>
            <th>EMPLOYEE ID</th>
            <th>LAST NAME</th>
            <th>PHONE NUMBER</th>
            <th align="center" colspan="2">ACTION</th>
        </tr>
        <?php
        while ($row = oci_fetch_array($result)) {
        ?>
            <tr>
                <td> <?php echo $row['ORDER_ID']; ?> </td>
                <td> <?php echo $row['ORDER_DATE']; ?></td>
                <td> <?php echo $row['NOTES']; ?> </td>
                <td> <?php echo $row['TOTAL']; ?></td>
                <td> <?php echo $row['EMPLOYEE_ID']; ?> </td>
                <td> <?php echo $row['LAST_NAME']; ?> </td>
                <td> <?php echo $row['PHONE']; ?> </td>
                <td width="10%" align="center"><a class="one" href="update_tracking.php?trackingID=<?php echo $row['trackingID']; ?>">Edit</a></td>
                <td width="10%" align="center"><a class="one" onclick="return del()" href="delete_order.php?ORDER_ID=<?php echo $row['ORDER_ID']; ?>">Delete</a></td>
            </tr>
        <?php
        } ?>
    </table>


    <?php
    $result1 = oci_parse($connection, "SELECT COUNT(ORDER_ID)
        FROM ORDERS");
    oci_execute($result1);
    $row = oci_fetch_array($result1, OCI_ASSOC);
    $count = oci_num_rows($result1);
    ?>
    <p> TOTAL ORDERS : <?php echo $row['COUNT(ORDER_ID)'] ?></p>
</body>

</html>