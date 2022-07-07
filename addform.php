<?php
    include('connection.php'); 

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
      $sql= oci_parse($connection, "INSERT INTO EMPLOYEE(EMPLOYEE_ID, FIRST_NAME, LAST_NAME, ADDRESS, CITY, STATE, POSTAL_CODE, COUNTRY, PHONE, HIRE_DATE, POSITION, SUPERVISOR_ID) VALUES  ('$empid','$fname','$lname','$address','$city','$state','$postalcode','$country','$phone', CURRENT_DATE,'$position','$supervisorid')");
      $result=oci_execute($sql);
      if($result){
        echo "<script>alert('Successful!')</script>";
        echo "<script>window.open('addform.php','_self')</script>";
      }
      else{
        echo "<script>alert('Error!')</script>";
        //echo "<script>window.open('addform.php','_self')</script>";
      }
    }
    ?>
<html>

<head>
    <script src="jquery-1.7.1.min.js">
    </script>
</head>

<body>
    <form action="addform.php" method="POST" autocomplete="off">
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
                        </div>-->
            <div class="column">
                <button class="buttonsubmit" name="submit" type="submit" value="s">
                    SUBMIT
                </button>
            </div>
        </div>
    </form>
    <br><br>
</body>

</html>