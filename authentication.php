<?php    
session_start();  
    include('connection.php');  
    $empid = $_POST['empid'];  
    $fname = ['fname'];  
	$lname =['lname']; 
	$birthdate =['birthdate'];
	$address =['address'];
	$city =['city'];
	$state =['state'];
	$postalcode=['postalcode'];
	$country=['country'];
    $phone=['phone'];
    $hiredate=['hiredate'];
    $position=['position'];
    $supervisorid=['supervisorid'];

	
  
        $sql = "SELECT * FROM EMPLOYEE WHERE EMPLOYEE_ID = '$empid'";  
        $result = oci_parse($connection, $sql);  
        oci_execute($result);
        $row = oci_fetch_array($result, OCI_ASSOC);  
        $count = oci_num_rows($result);  
          
        if($count == 1){  
			$_SESSION['empid']=$empid;
			$sql1 = "SELECT * FROM `EMPLOYEE` WHERE EMPLOYEE_ID ='$empid'";
			$result2 = oci_parse($connection, $sql);
            $_SESSION['fname']=$row['FIRST_NAME'];
			$_SESSION['lname']=$row['LAST_NAME'];
			$_SESSION['birthdate']=$row['BIRTH_DATE'];
			$_SESSION['address']=$row['ADDRESS'];
			$_SESSION['city']=$row['CITY'];
			$_SESSION['state']=$row['STATE'];
            $_SESSION['postalcode']=$row['POSTAL_CODE'];
            $_SESSION['country']=$row['COUNTRY'];
            $_SESSION['phone']=$row['PHONE'];
            $_SESSION['hiredate']=$row['HIRE_DATE'];
            $_SESSION['position']=$row['POSITION'];
            $_SESSION['supervisorid']=$row['SUPERVISOR_ID'];
		
			if($_SESSION['EMPLOYEE_ID'] >= 100){  
			 		
            echo "<script language='javascript' type='text/javascript'> location.href='adminhome.php' </script>";  
			}  
			else{
				echo "<script language='javascript' type='text/javascript'> location.href='adminhome.php' </script>"; 
			}
		}
        else{  
            echo '<script >alert("invalid username or password")</script>';  
			echo "<script language='javascript' type='text/javascript'> location.href='adminlogin.php' </script>";
        }  		
?>  