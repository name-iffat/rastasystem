<?php
    include('connection.php'); 
    if (isset($_POST['submit'])) 
    {
      $empid=$_POST['empid'];
      $notes=$_POST['notes'];
      $totalall=$_POST['totalall'];
      $quantityall=$_POST['quantityall'];
      $sql= oci_parse($connection, "INSERT INTO ORDERS(ORDER_ID, ORDER_DATE,NOTES,TOTAL,EMPLOYEE_ID) VALUES  (sequence_test.NEXTVAL, CURRENT_DATE,'$notes','$totalall','$empid')");
      $sql3= oci_parse($connection, "INSERT INTO PAYMENT(PAYMENT_ID, PAYMENT_DATE,ORDER_ID,PAYMENT_STATUS) VALUES  (sequence_test.CURRVAL, CURRENT_DATE,sequence_test.CURRVAL,'UNPAID')");
      $result=oci_execute($sql);
      oci_execute($sql3);
      for($x=0; $x < 12; $x++){
        $menus[$x] = $_POST['m'.($x + 1)];
        $qmenus[$x] = $_POST['q'.($x + 1)];
        $pmenus[$x] = $_POST['p'.($x + 1)];
        if($qmenus[$x] > 0){
            $sql2 = oci_parse($connection, "INSERT INTO ORDER_DETAILS(ORDER_ID,MENU_ID, QUANTITY, SUBTOTAL) VALUES  (sequence_test.CURRVAL,'$menus[$x]', '$qmenus[$x]','$pmenus[$x]')");
            oci_execute($sql2);
        }
      }

      if($result){
        echo "<script>alert('OrderSuccess!')</script>";
        echo "<script>window.open('order.php','_self')</script>"; 
      }
      else{
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap');
    html{
    font-family: "Anton", sans-serif;
    font-size: 12px;
    box-sizing: border-box;
    scroll-behavior: smooth;
    color: #ff0000e7;         /* Text Color for about us description */
    background: rgb(169, 209, 99); /* whole page background */
    }
    a{
    color: rgb(101, 255, 255);
    text-decoration: none;

    /* color for footer section */
    }
    a:hover{
    color: rgba(14, 18, 249, 0.89);
    /* color for footer section when mouse interact */
    }

p{
    font-size: 1.4rem;
}

img{
    width: 100%;
    max-width: 100%;
}

.topnav{
    background-color: rgb(208, 255, 0);
    overflow: hidden;
}

.topnav a{
    float: left;
    color: #ff0000;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover{
    background-color: rgb(255, 0, 0);
    color: rgb(238, 255, 0);
}

.container{
    width: 100%;
    max-width: 90rem;
    margin: 0 auto;
}

nav{
    width: 110%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid rgba(226, 175, 175, 0.2);
}

.nav-pic{
    width: 7rem;
}

.nav-pic a img{
    border-radius: 50%;
}

h2{
    text-align: center;
    color: #2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
}

.tab {
    overflow: hidden;
  }
  
  /* Style the menu buttons inside the tab */
  .tab button {
    background-color:#00ff08;
    float: center;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }
  
  /* Change background color of  buttons on hover */
  .tab button:hover {
    background-color: rgb(255, 0, 0);
  }
  
  /* Create an active/current tablink class */
  .tab button.active {
    background-color: rgb(255, 0, 0);
  }
  
  /* Style the tab content */
  .tabcontent {
    display: none;
    border-top: none;
  }
table{
    width: 90%;
    height: 90%;
    font-family: "Yanone Kaffeesatz", sans-serif;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

th{
    background-color: rgb(12, 73, 55);
    font-weight: bold;
    font-size: 2.5rem;
    border: 1px solid rgb(18, 4, 68);
    border-radius: 2rem;
}

td{
    background-color: rgb(12, 50, 82);
    font-size: 2rem;
    border: 1px solid rgb(18, 4, 68);
    border-radius: 2rem;
}

.buttonContainer{
    text-align: center;
}

.button{
    display: inline-block;
    padding: 15px 25px;
    font-size: 15px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    background-color: #51ff00;
    border: none;
    border-radius: 15px;
    box-shadow: 0 9px rgb(255, 238, 0);
  }

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #00ff08;
  box-shadow: 0 5px rgb(255, 0, 0);
  transform: translateY(4px);
}

footer{
    width: 100%;
    max-width: 70rem;
    margin: auto;
    padding: 2.5rem;
    color: #8a8a8a;
    text-align: center;
    font-size: 1.2rem;
    display: flex;
    justify-content: space-evenly;
    flex-direction: column;
}

footer a{
    color: rgba(3, 155, 155);
    margin: 0 0.2rem;
}

.td{
    width:20%
}
.notesbox {
  text-align: center;
  border-style: solid black 5px;
}
.center {
  text-align: center;
}
    </style>
  </head>
  <body>
    <main>
      <container>
        <div class="container">
          <nav>
              <div class="nav-pic">
                  <a href="index.php">
                      <img src="images/topleftpic.png" alt="" />
                    </a>
                </div>
                <div class="topnav">
                    <a href="index.php">Home</a>
                    <a href="index.php">Our Menu</a>
                    <a href="index.php">About Us</a>
                    <a href="index.php">Contact Me</a>
                </div>
            </nav>
        </div>
        <container>
            <div>
                <form action="order.php" method="POST" name="tblform" >
                    <table width="80%"  class="table" >
                    <tr>
                    <th>Employee ID:</th>
                    <th><select id="empid" name="empid">
                            <option value="101">101</option>
                            <option value="102">102</option>
                            <option value="103">103</option>
                            <option value="104">104</option>
                        </select></th>
                    </tr>
                    <tr>
                    <th>Menu</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th> 
                    </tr>
                    <tr>
                    <td><input type="checkbox" id="menu1" value="9" onclick="calculatePrice()">Ayam Gunting</td>
                    <input type="hidden" name="m1" value="1" id="cat1" />
                    <td>Ala Carte</td>
                    <p id="demo"></p>
                    <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" class="qty" name="q1" id="q1"></td>
                    <td><input readonly value="0" name="p1" id="p1" /></td>
                    </tr>   
                    <tr>
                    <td><input type="checkbox" id="menu2" name="menu2" value="13" onclick="calculatePrice()">Sotong Gorilla</td>
                    <input type="hidden" name="m2" value="2" id="cat2" />
                    <td>Ala Carte</td>
                    <td><input  type="text" value="0" onChange="calculatePrice();calculateQty()" name="q2" id="q2"></td>  
                    <td><input readonly value="0" name="p2"  id="p2"></td>  
                    </tr> 
                    <tr>
                    <td><input type="checkbox" id="menu3" name="menu3" value="4" onclick="calculatePrice()">Sosej Cheese</td>
                    <input type="hidden" name="m3" value="3" id="cat2" />
                    <td>Ala Carte</td>
                    <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q3" id="q3"></td>
                    <td><input readonly value="0"" name="p3" id="p3"></td> 
                    </tr> 
                    <tr>
                    <td><input type="checkbox" id="menu4" name="menu4" value="1" onclick="calculatePrice()">Add-On Chezzy</td>
                    <input type="hidden" name="m4" value="4" id="cat2" />
                    <td>Add-On</td>
                    <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q4" id="q4"></td>
                    <td><input readonly value="0" name="p4"  id="p4"></td> 
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="menu5" name="menu5" value="12" onclick="calculatePrice()">Ayam Gunting + Sosej Cheese</td>
                        <input type="hidden" name="m5" value="5" id="cat2" />
                        <td>Combo Set</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q5" id="q5"></td>
                        <td><input readonly value="0" name="p5" id="p5"></td> 
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="menu6" name="menu6" value="16" onclick="calculatePrice()">Sotong Gorilla + Sosej Cheese</td>
                        <input type="hidden" name="m6" value="6" id="cat2" />
                        <td>Combo Set</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q6" id="q6"></td>
                        <td><input readonly value="0" name="p6" id="p6"></td> 
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="menu7" name="menu7" value="7" onclick="calculatePrice()">Sosej Cheese (2 pcs)</td>
                        <input type="hidden" name="m7" value="7" id="cat2" />
                        <td>Combo Set</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q7" id="q7"></td>
                        <td><input readonly value="0" name="p7" id="p7"></td> 
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="menu8" name="menu8" value="10" onclick="calculatePrice()">Ayam Gunting + Air</td>
                        <input type="hidden" name="m8" value="8" id="cat2" />
                        <td>Rasta Combo</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q8" id="q8"></td>
                        <td><input readonly value="0" name="p8" id="p8"></td> 
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="menu9" name="menu9" value="14" onclick="calculatePrice()">Sotong Gorilla + Air</td>
                        <input type="hidden" name="m9" value="9" id="cat2" />
                        <td>Rasta Combo</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q9" id="q9"></td>
                        <td><input readonly value="0" name="p9" id="p9"></td> 
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="menu10" name="menu10" value="5" onclick="calculatePrice()">Sosej Cheese + Air</td>
                        <input type="hidden" name="m10" value="10" id="cat2" />
                        <td>Rasta Combo</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q10" id="q10"></td>
                        <td><input readonly value="0" name="p10" id="p10"></td> 
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="menu11" name="menu11" value="2" onclick="calculatePrice()">Teh O Ais</td>
                        <input type="hidden" name="m11" value="11" id="cat2" />
                        <td>Minuman</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q11" id="q11"></td>
                        <td><input readonly value="0" name="p11" id="p11"></td> 
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="menu12" name="menu12" value="2" onclick="calculatePrice()">Sirap</td>
                        <input type="hidden" name="m12" value="12" id="cat2" />
                        <td>Minuman</td>
                        <td><input type="text" value="0" onChange="calculatePrice();calculateQty()" name="q12" id="q12"></td>
                        <td><input readonly value="0" name="p12" id="p12"></td> 
                    </tr>
                    <tr>
                    <td></td> 
                    <td>Total</td>
                    <td><input type="number" name="quantityall" readonly value="0" id="qtyAll"/></td>
                    <td><input type="number" name="totalall" readonly value="0" id="totAll"/></td>
                    </table>
                    <div class="center"><h1>Notes</h1></div>
                    <div class ="notesbox">
                    <textarea name="notes" id="notes" style="width:50%;height:90px;background-color:green;border:none;padding:2%;font:22px/30px sans-serif;">
                    </textarea>
                    </div text>
                    <br>
                    <div class="buttonContainer">
                        <input type="reset" class="button" id="buttonClear" value="Clear">
                        <input type="submit" name="submit" class="button" id="buttonSubmit" value="Submit Order" onclick=createBill()>
                    </div>
                    </form>
            </div>
      </container>
    </main>
      <footer>
        <div class="footer-nav">
          <a href="index.php" class="footer-nav-link">Home</a>
          <a href="index.php" class="footer-nav-link">Menu</a>
          <a href="index.php" class="footer-nav-link">About Us</a>
          <a href="index.php" class="footer-nav-link">Contact</a>
        </div>
        <div class="footer-social">
          <a href="https://www.instagram.com/dummy" target="_blank">
            <i class="fab fa-instagram" aria-hidden="true"></i>
          </a>
          <a href="https://www.linkedin.com/in/dummy" target="_blank">
            <i class="fab fa-linkedin" aria-hidden="true"></i>
          </a>
          <a href="https://www.youtube.com/channel/dummy" target="_blank">
            <i class="fab fa-youtube" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
      <script>
        function calculateQty(tblform){
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
            qtyall = q1+q2+q3+q4+q5+q6+q7+q8+q9+q10+q11+q12;
            document.getElementById("qtyAll").value=qtyall;
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