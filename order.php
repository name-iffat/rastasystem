<?php
include('connection.php');
session_start();

if (isset($_POST['submit'])) {
    $empid = $_SESSION['empid'];
    $notes = $_POST['notes'];
    $totalall = $_POST['totalall'];
    $quantityall = $_POST['quantityall'];
    $sql = oci_parse($connection, "INSERT INTO ORDERS(ORDER_ID, ORDER_DATE,NOTES,TOTAL,EMPLOYEE_ID) VALUES  (sequence_test.NEXTVAL, CURRENT_DATE,'$notes','$totalall','$empid')");
    $sql3 = oci_parse($connection, "INSERT INTO PAYMENT(PAYMENT_ID, PAYMENT_DATE,ORDER_ID,PAYMENT_STATUS) VALUES  (sequence_test.CURRVAL, CURRENT_DATE,sequence_test.CURRVAL,'UNPAID')");
    $result = oci_execute($sql);
    oci_execute($sql3);

    for ($x = 0; $x < 12; $x++) {
        $menus[$x] = $_POST['m' . ($x + 1)];
        $qmenus[$x] = $_POST['q' . ($x + 1)];
        $pmenus[$x] = $_POST['p' . ($x + 1)];
        if ($qmenus[$x] > 0) {
            $sql2 = oci_parse($connection, "INSERT INTO ORDER_DETAILS(ORDER_ID,MENU_ID, QUANTITY, SUBTOTAL) VALUES  (sequence_test.CURRVAL,'$menus[$x]', '$qmenus[$x]','$pmenus[$x]')");
            oci_execute($sql2);
        }
    }

    if ($result) {
        echo "<script>alert('OrderSuccess!')</script>";
        echo "<script>window.open('order.php','_self')</script>";
    } else {
        echo "<script>alert('Error!')</script>";
        echo "<script>window.open('order.php','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>AYAM RASTA WEB PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
  </head>
  <body>
    <main>

      <container>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

            <div class="container px-4 px-lg-5">
                <a class="navbar-brand"><img class="img-fluid" src="./images/Logo2.png"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="./index.php #about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="./menu.php">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="./order.php">Order</a></li>

                        <li class="nav-item"><a class="nav-link" href="./adminlogin.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="masthead1">

        <container>
            <div class="table-bg container mt-5 rounded-3">
            <input type="button" class="button mt-3" onclick="location.href='adminhome.php';" value="Back">
                <form action="order.php" method="POST" name="tblform" >

                    <table width="80%"  class="table" >
                    <tr>
                        <th>Employee ID:</th>
                        <th>
                            <?php echo $_SESSION['empid']; ?>
                            <!-- <select id="empid" name="empid">
                            <option value="101">101</option>
                            <option value="102">102</option>
                            <option value="103">103</option>
                            <option value="104">104</option>
                            </select> -->
                        </th>
                    </tr>
                    <tr>
                    <th>Menu</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th> 
                    </tr>
                    <tr>
                    <td><input class="form-check-input" type="checkbox" id="menu1" value="9" onclick="calculatePrice()">Ayam Gunting</td>

                    <input type="hidden" name="m1" value="1" id="cat1" />

                    <td>Ala Carte</td>
                    <p id="demo"></p>
                    <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" class="qty" id="q1"></td>
                    <td><input readonly value="0" id="p1" disabled/></td>
                    </tr>   
                    <tr>
                    <td><input class="form-check-input" type="checkbox" id="menu2" name="menu2" value="13" onclick="calculatePrice()">Sotong Gorilla</td>

                    <input type="hidden" name="m2" value="2" id="cat2" />

                    <td>Ala Carte</td>
                    <td><input  type="text" value="0" onChange="calculatePrice();calculateQty()" id="q2"></td>  
                    <td><input readonly value="0"  id="p2" disabled></td>  
                    </tr> 
                    <tr>
                    <td><input class="form-check-input" type="checkbox" id="menu3" name="menu3" value="4" onclick="calculatePrice()">Sosej Cheese</td>

                    <input type="hidden" name="m3" value="3" id="cat2" />

                    <td>Ala Carte</td>
                    <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q3"></td>
                    <td><input readonly value="0"" id="p3" disabled></td> 
                    </tr> 
                    <tr>
                    <td><input class="form-check-input" type="checkbox" id="menu4" name="menu4" value="1" onclick="calculatePrice()">Add-On Chezzy</td>

                    <input type="hidden" name="m4" value="4" id="cat2" />

                    <td>Add-On</td>
                    <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q4"></td>
                    <td><input readonly value="0"  id="p4" disabled></td> 
                    </tr>
                    <tr>

                        <td><input class="form-check-input" type="checkbox" id="menu5" name="menu5" value="12" onclick="calculatePrice()">Ayam Gunting + Sosej Cheese</td>
                        <input type="hidden" name="m5" value="5" id="cat2" />

                        <td>Combo Set</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q5"></td>
                        <td><input readonly value="0"  id="p5" disabled></td> 
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="menu6" name="menu6" value="16" onclick="calculatePrice()">Sotong Gorilla + Sosej Cheese</td>

                        <input type="hidden" name="m6" value="6" id="cat2" />

                        <td>Combo Set</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q6"></td>
                        <td><input readonly value="0" id="p6" disabled></td> 
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="menu7" name="menu7" value="7" onclick="calculatePrice()">Sosej Cheese (2 pcs)</td>

                        <input type="hidden" name="m7" value="7" id="cat2" />

                        <td>Combo Set</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q7"></td>
                        <td><input readonly value="0"  id="p7" disabled></td> 
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="menu8" name="menu8" value="10" onclick="calculatePrice()">Ayam Gunting + Air</td>

                        <input type="hidden" name="m8" value="8" id="cat2" />

                        <td>Rasta Combo</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q8"></td>
                        <td><input readonly value="0"  id="p8" disabled></td> 
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="menu9" name="menu9" value="14" onclick="calculatePrice()">Sotong Gorilla + Air</td>

                        <input type="hidden" name="m9" value="9" id="cat2" />

                        <td>Rasta Combo</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q9"></td>
                        <td><input readonly value="0"  id="p9" disabled></td> 
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="menu10" name="menu10" value="5" onclick="calculatePrice()">Sosej Cheese + Air</td>

                        <input type="hidden" name="m10" value="10" id="cat2" />

                        <td>Rasta Combo</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q10"></td>
                        <td><input readonly value="0"  id="p10" disabled></td> 
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="menu11" name="menu11" value="2" onclick="calculatePrice()">Teh O Ais</td>

                        <input type="hidden" name="m11" value="11" id="cat2" />

                        <td>Minuman</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q11"></td>
                        <td><input readonly value="0"  id="p11" disabled></td> 
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="menu12" name="menu12" value="2" onclick="calculatePrice()">Sirap</td>

                        <input type="hidden" name="m12" value="12" id="cat2" />

                        <td>Minuman</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" id="q12"></td>
                        <td><input readonly value="0"  id="p12" disabled></td> 
                    </tr>
                    <tr>
                    <td></td> 
                    <td>Total</td>
                    <td><input type="number" name="quantityall" readonly value="0" id="qtyAll" disabled/></td>
                    <td><input type="number" name="totalall" readonly value="0" id="totAll" disabled/></td>
                    </table>

                    <div class="text-center"><h1>Notes</h1></div>
                    <div class ="notesbox">
                    <textarea name="notes" class="form-control text-center" id="notes"></textarea>
                    </div text>
                    <br>
                    <div class="buttonContainer text-center">

                        <input type="reset" class="button" id="buttonClear" value="Clear">
                        <input type="submit" class="button" id="buttonSubmit" value="Submit Order" onclick=createBill()>
                    </div>
                    </form>
            </div>
        </div>
        
      </container>
    </main>
      <script>
        function calculateQty(tblform) {
            var q1 = parseInt(document.getElementById("q1").value);
            var q2 = parseInt(document.getElementById("q2").value);
            var q3 = parseInt(document.getElementById("q3").value);
            var q4 = parseInt(document.getElementById("q4").value);
            var q5 = parseInt(document.getElementById("q5").value);
            var q6 = parseInt(document.getElementById("q6").value);
            var q7 = parseInt(document.getElementById("q7").value);
            var q8 = parseInt(document.getElementById("q8").value);
            var q9 = parseInt(document.getElementById("q9").value);
            var q10 = parseInt(document.getElementById("q10").value);
            var q11 = parseInt(document.getElementById("q11").value);
            var q12 = parseInt(document.getElementById("q12").value);
            var qtyall = 0;
            qtyall = q1 + q2 + q3 + q4 + q5 + q6 + q7 + q8 + q9 + q10 + q11 + q12;
            document.getElementById("qtyAll").value = qtyall;
        }

        function calculatePrice(tblform){ 
            var m1 = document.getElementById("menu1");
            var m2 = document.getElementById("menu2");
            var m3 = document.getElementById("menu3");
            var m4 = document.getElementById("menu4");
            var m5 = document.getElementById("menu5");
            var m6 = document.getElementById("menu6");
            var m7 = document.getElementById("menu7");
            var m8 = document.getElementById("menu8");
            var m9 = document.getElementById("menu9");
            var m10 = document.getElementById("menu10");
            var m11 = document.getElementById("menu11");
            var m12 = document.getElementById("menu12");
            if(m1.checked == true){
                var p1 = (m1).value;
            }
            else{
                var p1 = 0;
            }
            if(m2.checked == true){
                var  p2 = (m2).value;
            }
            else{
                var p2 = 0;
            }
            if(m3.checked == true){
                var  p3 = (m3).value;
            }
            else{
                var p3 = 0;
            }
            if(m4.checked == true){
                var  p4 = (m4).value;
            }
            else{
                var p4 = 0;
            }
            if(m5.checked == true){
                var  p5 = (m5).value;
            }
            else{
                var p5 = 0;
            }
            if(m6.checked == true){
                var  p6 = (m6).value;
            }
            else{
                var p6 = 0;
            }
            if(m7.checked == true){
                var  p7 = (m7).value;
            }
            else{
                var p7 = 0;
            }
            if(m8.checked == true){
                var  p8 = (m8).value;
            }
            else{
                var p8 = 0;
            }
            if(m9.checked == true){
                var  p9 = (m9).value;
            }
            else{
                var p9 = 0;
            }
            if(m10.checked == true){
                var  p10 = (m10).value;
            }
            else{
                var p10 = 0;
            }
            if(m11.checked == true){
                var  p11 = (m11).value;
            }
            else{
                var p11 = 0;
            }
            if(m12.checked == true){
                var  p12 = (m12).value;
            }
            else{
                var p12 = 0;
            }
            var q1 = document.getElementById("q1").value;
            var q2 = document.getElementById("q2").value;
            var q3 = document.getElementById("q3").value;
            var q4 = document.getElementById("q4").value;
            var q5 = document.getElementById("q5").value;
            var q6 = document.getElementById("q6").value;
            var q7 = document.getElementById("q7").value;
            var q8 = document.getElementById("q8").value;
            var q9 = document.getElementById("q9").value;
            var q10 = document.getElementById("q10").value;
            var q11 = document.getElementById("q11").value;
            var q12 = document.getElementById("q12").value;
            /* document.getElementById("demo").innerHTML = q2; */
            p1 = (p1)*q1;
            p2 = (p2)*q2;
            p3 = (p3)*q3;
            p4 = (p4)*q4;
            p5 = (p5)*q5;
            p6 = (p6)*q6;
            p7 = (p7)*q7;
            p8 = (p8)*q8;
            p9 = (p9)*q9;
            p10 = (p10)*q10;  
            p11 = (p11)*q11;
            p12 = (p12)*q12;
            var totall = 0;
            totall = p1+p2+p3+p4+p5+p6+p7+p8+p9+p10+p11+p12;
            document.getElementById("p1").value=p1;
            document.getElementById("p2").value=p2;
            document.getElementById("p3").value=p3;
            document.getElementById("p4").value=p4;
            document.getElementById("p5").value=p5;
            document.getElementById("p6").value=p6;
            document.getElementById("p7").value=p7;
            document.getElementById("p8").value=p8;
            document.getElementById("p9").value=p9;
            document.getElementById("p10").value=p10;
            document.getElementById("p11").value=p11;
            document.getElementById("p12").value=p12;
            document.getElementById("totAll").value=totall;
        }  
    </script>
    </main>
  </body>
</html>