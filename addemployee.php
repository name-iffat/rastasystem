<?php 
include('connection.php');
?>
<html>

<head>
    <title>:: e-Booking :: - Admin </title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=arial">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courier+Prime">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Concert+One">
    <script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
    </script>
    <style type="text/css">
    * {
        box-sizing: border-box;
    }

    .row {
        margin: auto;
        width: 100%;
        padding: 10px;
    }

    .column {
        float: right;
        width: 60%;
        padding: 5px;
    }

    .buttonsubmit {
        float: right;
        padding: 16px;
        width: 20%;
        opacity: 0.9;
        border-radius: 6.5px;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 15%;
        background-color: #FF9D30;
        position: fixed;
        height: 100%;
        overflow: auto;
        font-family: poppins;
        box-shadow: 0 8px 8px rgba(0, 0, 0, 0.4);
    }

    li a {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
    }

    li a.active {
        background-color: black;
        color: white;
    }

    li a:hover:not(.active) {
        background-color: black;
        color: white;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    table {
        text-align: left;
        border-collapse: collapse;
        border-spacing: 1;
        width: 70%;
        border: 1px solid black;
        background-color: white;
        position: static;
        opacity: 1;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    td {

        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        padding-right: 10px;
    }

    th {
        padding: 16px;
    }

    body {
        background-color: white;
        opacity: 1;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        height: 100%;
    }

    #att {
        animation: mymove 1s infinite;
    }

    @keyframes mymove {
        50% {
            font-weight: bold;
            color: blue;
        }
    }

    @media screen and (max-width: 500px) {
        .header a {
            float: none;
            display: block;
            text-align: left;
        }
    }

    .tb {
        font-family: "poppins";
    }

    .ridge {
        border-style: ridge;
        border-color: red;
    }

    .ridge2 {
        border-style: ridge;
        border-color: blue;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
        background-color: #FFFFD0;
        transition: 0.3s;
        align: "center";
        padding: 0px 10px 10px 10px;
        border-radius: 6px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
    }

    .container {
        padding: 10px 9px 10px 10px;
        background-color: #FFDEAD;
        font-size: 23px;
        opacity: 1;
        border-radius: 3px;
        font-weight: bold;
        text-align: left;
    }

    input[type=text],
    select {
        width: 100%;
        height: 6%;
        padding: 7px;
        margin: 3px 0;
        border-radius: 5px;
        border: 1px solid #999;
        box-sizing: border-box;
    }

    input[type="text"]:focus {
        outline: none;
        box-shadow: 0px 0px 5px #61C5FA;
        border-radius: 8px;
        border: 1px solid #5AB0DB;
    }

    input[type="text"]:hover {
        border: 1px solid black;
        border-radius: 8px;
    }

    input[type="text"]:focus:hover {
        outline: none;
        box-shadow: 0px 0px 5px #61C5FA;
        border: 1px solid #5AB0DB;
        border-radius: 8px;
    }

    .column2 {
        float: left;
        width: 33%;
        padding: 10px;

    }

    /* Clear floats after the columns */
    .row2:after {
        content: "";
        display: table;
        clear: both;
    }

    .buttonsearch {
        background-color: #F2F2F2;
        border-radius: 5px;
        display: inline-block;
        padding: 6px 8px;
        margin: 3px;
    }

    .buttondelete {
        padding: 10px 25px;
        background-color: #f44336;
        border-radius: 5px;
    }
    </style>

    <script src="jquery-1.7.1.min.js"></script>
    <ul>
        <div align="center">
        </div><br>
        <!--<li><a class="active" href="addemployee.php"> ADD EMPLOYEE </a></li>-->
        <li><a href="adminlogin.php" onClick="return logout()">LOG OUT</a></li>
    </ul>
</head>

<body>
    <br>
    <div class="tb">
        <div style="margin-left:15%;padding:10px 16px;">

            <div class="card"><br>
                <div class="container">ADD EMPLOYEE
                </div><br>
                <form action="addemployee.php" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="column2">
                            <label>EMPLOYEE ID<br></label>
                            <input type="text" name="empid" required placeholder="EMPLOYEE ID" required="">
                        </div>
                        <div class="column2">
                            <label>FIRST NAME<br></label>
                            <input type="text" name="fname" required placeholder="FIRST NAME" required="">
                        </div>
                        <div class="column2">
                            <label>LAST NAME<br></label>
                            <input type="text" name="lname" required placeholder="LAST NAME" required="">
                        </div>
                        <div class="column2">
                            <label>ADDRESS<br></label>
                            <input type="text" name="address" required placeholder="ADDRESS" required="">
                        </div>
                        <div class="column2">
                            <label>CITY<br></label>
                            <input type="text" name="city" required placeholder="CITY" required="">
                        </div>
                        <div class="column2">
                            <label>STATE<br></label>
                            <input type="text" name="state" required placeholder="STATE" required="">
                        </div>
                        <div class="column2">
                            <label>POSTAL CODE<br></label>
                            <input type="text" name="postalcode" required placeholder="POSTAL CODE" required="">
                        </div>
                        <div class="column2">
                            <label>COUNTRY<br></label>
                            <select name="country" placeholder="COUNTRY" required="">
                                <option></option>
                                <option>Malaysia</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="column2">
                            <label>PHONE<br></label>
                            <input type="text" name="phone" required placeholder="PHONE" required="">
                        </div>
                        <div class="column2">
                            <label>POSITION<br></label>
                            <select name="position" placeholder="POSITION" required="">
                                <option></option>
                                <option>Manager</option>
                                <option>Chef</option>
                                <option>Cashier</option>
                                <option>Waiter</option>
                            </select>
                        </div>
                        <div class="column2">
                            <label>SUPERVISOR ID<br></label>
                            <input type="text" name="supervisorid" required placeholder="SUPERVISOR ID">
                        </div>
                        <!--<div class="column2">
                            <label>BIRTH DATE <br></label>
                            <input type="date" name="birthdate" required placeholder="BIRTH DATE" required="">
                        </div>
                        <div class="column2">
                            <label>HIRE DATE <br></label>
                            <input type="date" name="hiredate" required placeholder="HIRE DATE" required="">
                        </div>-->
                        <div class="column">
                            <button class="buttonsubmit" name="submit" type="submit" onClick="return submit()">
                                SUBMIT
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div class="card"><br>
                <div class="container"> DELETE EMPLOYEE
                </div><br><span>
                    <div class="row">
                        <div class="column2">
                            <form name="form" method="post" action="addemployee.php" autocomplete="off">
                                <div align="left"><input type="text" name="deleteuser" required=""
                                        placeholder="EMPLOYEE ID">
                                    <button class="buttonsearch" type="submit" name="log">SEARCH</button>
                                </div>
                            </form>
                </span>
            </div>
        </div>
        <div style="overflow-x:auto;">
            <?php  
                        if(isset($_POST['deleteuser']))   {
                            $i = 1;
                            $deleteuser='';
                            $deleteuser=$_POST['deleteuser'];

                            $sql ="SELECT * FROM EMPLOYEE 
                            WHERE EMPLOYEE_ID LIKE '%".$deleteuser."%' OR USER_NAME LIKE '%".$deleteuser."%'
                            ORDER BY EMPLOYEE_ID ;";
                            $log = oci_parse($connection, $sql);                   
                            if( $logcheck = oci_num_rows($log))
                            { 
                            while($row = oci_fetch_array($log, OCI_ASSOC+OCI_RETURN_NULLS))
                            {
                            ?>
            <?php echo $i++ ?>.
            <table align="center">
                <tr>
                    <td width="25%"> EMPLOYEE ID</td>
                    <td><?php echo $row['EMPLOYEE_ID'];?></td>
                </tr>
                <tr>
                    <td width="25%"> FIRST NAME</td>
                    <td><?php echo $row['FIRST_NAME'];?></td>
                </tr>
                <tr>
                    <td width="25%"> LAST NAME</td>
                    <td><?php echo $row['LAST_NAME'];?></td>
                </tr>
                <!--<tr>
                                <td width="25%"> BIRTH DATE</td> 
                                <td><?php echo $row['BIRTH_DATE'];?></td>
                            </tr>-->
                <tr>
                    <td width="25%"> ADDRESS</td>
                    <td><?php echo $row['ADDRESS'];?></td>
                </tr>
                <tr>
                    <td width="25%"> CITY</td>
                    <td><?php echo $row['CITY'];?></td>
                </tr>
                <tr>
                    <td width="25%"> STATE</td>
                    <td><?php echo $row['STATE'];?></td>
                </tr>
                <tr>
                    <td width="25%"> POSTAL CODE</td>
                    <td><?php echo $row['POSTAL_CODE'];?></td>
                </tr>
                <tr>
                    <td width="25%"> COUNTRY</td>
                    <td><?php echo $row['COUNTRY'];?></td>
                </tr>
                <tr>
                    <td width="25%"> PHONE</td>
                    <td><?php echo $row['PHONE'];?></td>
                </tr>
                <!--<tr>
                                <td width="25%"> HIRE DATE</td> 
                                <td><?php echo $row['HIRE_DATE'];?></td>
                            </tr>  -->
                <tr>
                    <td width="25%"> POSITION</td>
                    <td><?php echo $row['POSITION'];?></td>
                </tr>
                <tr>
                    <td width="25%"> SUPERVISOR ID</td>
                    <td><?php echo $row['SUPERVISOR_ID'];?></td>
                </tr>
            </table>
            <br>
            <form method="post" action="addemployee.php" align="center">
                <input type=hidden name="deleteid" value="<?php echo $row['EMPLOYEE_ID'] ?>">
                <button class="buttondelete" type="submit" name="delete"
                    onClick="return confirmdelete()">DELETE</button>
            </form>
            <?php
                        }}
                        else { ?>
            <tr>
                <td colspan="7" align="center"><b>NO RECORD </b></td>
            </tr>
            <?php
                        } }?>
        </div> <br>
    </div>
    </div>

    </div>
    <!--div margin-left:15%;padding:10px 16px --->
    </div>
    <!--div tb -->


    <br><br>
</body>
<script>
function logout() {
    return confirm("Log Out?");
}

function submit() {
    return confirm("ADD EMPLOYEE ?");
}

function confirmdelete() {
    return confirm("DELETE EMPLOYEE?");
}
</script>

</html>

<?php 

if (isset($_POST['submit'])) 
{
  $empid=$_POST['empid'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $address=$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $postalcode=$_POST['postalcode'];
  $country=$_POST['country'];
  $phone=$_POST['phone'];
  $position=$_POST['position'];
  $supervisorid=$_POST['supervisorid'];
  //$birthdate=$_POST['birthdate'];
  //$hiredate=$_POST['hiredate'];
  $sql1="SELECT * FROM EMPLOYEE WHERE EMPLOYEE_ID='$empid'";
  $empidcheck=oci_parse($connection,$sql);
  oci_execute($empidcheck);
      if(oci_num_rows($empidcheck) > 0)
      {
        echo "<script>alert('Employee ID already exist. Please Try Another One.')</script>";
      }
      else
      {

  $sql2="INSERT INTO EMPLOYEE(EMPLOYEE_ID, FIRST_NAME, LAST_NAME, ADDRESS, CITY, STATE, POSTAL_CODE, COUNTRY, PHONE, POSITION, SUPERVISOR_ID) VALUES  ('$empid','$fname','$lname','$address','$city','$state','$postalcode','$country','$phone','$position','$supervisorid')";
  $addemployee=oci_parse($connection,$sql2);
  oci_execute($addemployee);
  if($addemployee)
  {
    echo "<script>alert('Successful!')</script>";
    echo "<script>window.open('addemployee.php','_self')</script>";
    }
  else
    {
      echo "<script>alert('Error!')</script>";
      echo "<script>window.open('addemployee.php','_self')</script>";
    }
}
}
if (isset($_POST['delete'])) 
{
  $empid=$_POST['deleteid'];
  $sql="DELETE FROM EMPLOYEE WHERE EMPLOYEE_ID='$empid';";
  $delete=oci_parse($connection,$sql);
  oci_execute($delete);
  if($delete)
  {
    echo "<script>alert('Successful!')</script>";
    echo "<script>window.open('adduser.php','_self')</script>";
    }
  else
    {
      echo "<script>alert('Error!')</script>";
      echo "<script>window.open('adduser.php','_self')</script>";
    }
}

?>