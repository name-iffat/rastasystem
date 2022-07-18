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
      $birthdate=$_POST['birthdate'];
      $sql= oci_parse($connection, "INSERT INTO EMPLOYEE(EMPLOYEE_ID, FIRST_NAME, LAST_NAME, BIRTH_DATE, ADDRESS, CITY, STATE, POSTAL_CODE, COUNTRY, PHONE, HIRE_DATE, POSITION, SUPERVISOR_ID) VALUES  ('$empid','$fname','$lname',TO_DATE('$birthdate','DD/MM/YYYY'),'$address','$city','$state','$postalcode','$country','$phone', CURRENT_DATE,'$position','$supervisorid')");
      $result=oci_execute($sql);
      if($result){
        echo "<script>alert('Successful!')</script>";
        echo "<script>window.open('registrationform.php','_self')</script>";
      }
      else{
        echo "<script>alert('Error!')</script>";
        echo "<script>window.open('registrationform.php','_self')</script>";
      }
    }
    ?>
<html>

<head>
    <script src="jquery-1.7.1.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
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
            <input type="button" class="button" onclick="location.href='adminhome.php';" value="Back">
            <form action="registrationform.php" method="POST" autocomplete="off">
                <div class="row">
                    <div class="column2 mt-3">
                        <label>EMPLOYEE ID<br></label>
                        <input type="text" name="empid" class="form-control" required placeholder="EMPLOYEE ID" required="">
                    </div>
                    <div class="column2">
                        <label>FIRST NAME<br></label>
                        <input type="text" name="fname" class="form-control" required placeholder="FIRST NAME" required="">
                    </div>
                    <div class="column2">
                        <label>LAST NAME<br></label>
                        <input type="text" name="lname" class="form-control" required placeholder="LAST NAME" required="">
                    </div>
                    <div class="column2">
                        <label>ADDRESS<br></label>
                        <input type="text" name="address" class="form-control" required placeholder="ADDRESS" required="">
                    </div>
                    <div class="column2">
                        <label>CITY<br></label>
                        <input type="text" name="city" class="form-control" required placeholder="CITY" required="">
                    </div>
                    <div class="column2">
                        <label>STATE<br></label>
                        <input type="text" name="state" class="form-control" required placeholder="STATE" required="">
                    </div>
                    <div class="column2">
                        <label>POSTAL CODE<br></label>
                        <input type="text" name="postalcode" class="form-control" required placeholder="POSTAL CODE" required="">
                    </div>
                    <div class="column2">
                        <label>COUNTRY<br></label>
                        <select name="country" placeholder="COUNTRY" class="form-control" required="">
                            <option></option>
                            <option>Malaysia</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="column2">
                        <label>PHONE<br></label>
                        <input type="text" name="phone" class="form-control" required placeholder="PHONE" required="">
                    </div>
                    <div class="column2">
                        <label>BIRTH DATE<br></label>
                        <input type="text" name="birthdate" class="form-control" required placeholder="DD/MM/YYYY" required="">
                    </div>
                    <div class="column2">
                        <label>POSITION<br></label>
                        <select name="position" placeholder="POSITION" class="form-control" required="">
                            <option></option>
                            <option>Manager</option>
                            <option>Chef</option>
                            <option>Cashier</option>
                            <option>Waiter</option>
                        </select>
                    </div>
                    <div class="column2">
                        <label>SUPERVISOR ID<br></label>
                        <select name="supervisorid" class="form-control" placeholder="SUPERVISOR ID" required="">
                            <option></option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class="column mt-3 text-center">
                        <button class=" button buttonsubmit" name="submit" type="submit" value="s">
                            SUBMIT
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>