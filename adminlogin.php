<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Admin Login</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=arial">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courier+Prime">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Concert+One">

<script type = "text/javascript" >
function preventBack() { window.history.forward(); }
setTimeout("preventBack()", 0);
window.onunload = function () { null };
</script>

 <style type="text/css">
  table,th,td 
    {
      border: 0px solid DarkCyan;
    }
    body 
  {
    opacity: 1;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    margin:0;
    padding:0;
    height:100%;
  }
  @media screen and (max-width: 500px) 
  {
    .header a 
      {
        float: none;
        display: block;
        text-align: left;
      }
  }
  .tb
    {
      font-family:"poppins";
    }
	.link
	{
	cursor: pointer;
	color:blue;
	}
</style>
  <script src="jquery-1.7.1.min.js"></script>
</head>
<body>
  <p align="center">&nbsp;</p>
  <table width="455" border="0" align="center">
  </table>
  <div class="tb">
  <form name="f1" action="authentication.php" onsubmit="return validation()" method="POST">
    <table width="470" height="246" border="1" align="center">
	<tr>
	<td align="center" colspan="2" style="font-size:38px;">Proceed as</td>

</tr>
      <tr>
      <tr border="0">
      </tr>
	  <tr>
		<th style="font-size:25px;">Admin</th>
	</tr>

      <table width="292" height="77" border="0" align="center">
        <tr>
          <td width="80">
            <div align="left"style="font-size:25px;">EmployeeID</div>
          </td>
          <td width="22">
            <div align="left">:</div>
          </td>
          <td width="176">
            <div align="left">
              <input id="empid" type="text" name="empid" required a/>
            </div>
          </td>
        </tr>
        <tr>
          <p align="center"style="font-size:25px;">Log In </p>
          <td>
            <div align="left" style="font-size:25px;">Password </div>
          </td>
          <td>
            <div align="left"><strong>:</strong></div>
          </td>
          <td>
            <div align="left">
              <input id="ps" type="password" name="ps"  required/>
            </div>
          </td>
        </tr>
      </table>
      <table width="294" border="0" align="center">
      <tr>
          <td>
            <div align="right">
            <input type="checkbox" onclick="myFunction()">Show Password
            </div>
          </td>
        </tr>
      </table>
      <table width="223" border="0" align="center">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td  align="center">
            <input class="button-1" name="submit" type="submit" value="LOGIN" />
          </td>
        </tr>
		<table width="294" border="0" align="center">
        <tr><br><br><br>
		</table>
      </table>
      <p>&nbsp;</p>
      </th>
      </tr>
	
    </table>

  </form>
  <script>
    function validation() {
      var id = document.f1.user.value;
      var ps = document.f1.pass.value;
      if (id.length == "" && ps.length == "") {
        alert("Employee ID and Password fields are empty");
        return false;
      } else {
        if (id.length == "") {
          alert("Employee ID is empty");
          return false;
        }
        if (ps.length == "") {
          alert("Password field is empty");
          return false;
        }
      }
    }
    function myFunction() {
    var x = document.getElementById("ps");
    if (x.type === "password") {
        x.type = "text";
    } 
    else {
        x.type = "password";
    }
    }
  </script></div>
  <br><br><br><br><br><br><br><br><br><br>
  </body>
</html>