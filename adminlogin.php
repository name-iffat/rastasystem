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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">

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
    table,
    th,
    td {
        border: 0px solid DarkCyan;
    }

    body {
        opacity: 1;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        height: 100%;
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

    .link {
        cursor: pointer;
        color: blue;
    }
    </style>
    <script src="jquery-1.7.1.min.js"></script>
</head>

<body>
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
                    <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="./adminlogin.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="masthead1">
        <div class="login-container text-center animated flipInX">
            <div>
                <h1 class="logo-badge text-black"><img class="img-fluid" src="./images/Logo2.png"></h1>
            </div>
                <p class="text-black">Please Call Our Waiter to Assist With Your Order</p>
            <div class="container-content rounded-5">
                <form class="margin-t" name="f1" action="authentication.php" onsubmit="return validation()" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control rounded-top" placeholder="Employee ID" id="empid" name="empid" required a \>
                    </div>
                    <br>
                    <input class="btn text-white button-1" name="submit" type="submit" value="LOGIN" />
                </form>
                <p class="margin-t text-black"><small> Ayam Gunting Rasta &copy; 2022</small> </p>
            </div>
        </div>
    </div>
    
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
            } else {
                x.type = "password";
            }
        }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>