<?php
$host = "host = localhost";
$port = "port = 5432";
$dbname = "dbname = speedzadb";
$credentials = "user = postgres password=enteryourpass";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db)
    echo "Error Error \n";

$customerid = $_COOKIE['customerid'];
$subtotal = $_COOKIE['subtotal'];
$insertorder = "INSERT INTO orders (customerid, subtotal, itemcount) 
                VALUES('$customerid', '$subtotal', (SELECT SUM(qty) FROM cart WHERE customerid='$customerid'))";
$res = pg_query($db, $insertorder);
$removecart = "DELETE FROM cart WHERE customerid = '$customerid'";
$res3 = pg_query($db, $removecart);

header("Refresh:0; url=http://localhost/DBMSPizza/thankyou.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Speedza</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="fonts/ionicons.css" rel="stylesheet">
        <link href="common/styles.css" rel="stylesheet">
        <script src = "addtocart.js"></script>

</head>
<body>
<header>
        <div class="container">
                <a class="logo" href="#"><img src="images/logo-white.png" alt="Logo"></a>

                <!-- <div class="right-area">
                        <h6><a class="plr-20 color-white btn-fill-primary" href="tel: +91 80 4953 7324">ORDER: +91 80 4953 7324</a></h6>
                </div>right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                        <li><a href="indexcopy.php">HOME</a></li>
                        <li><a href="02_about_us.html">ABOUT US</a></li>
                        <li><a href="03_menu.html">SERVICES</a></li>
                        <li><a href="04_blog.html">NEWS</a></li>
                        <li><a href="05_contact.php">CONTACT</a></li>
                        
                        <li><a href="signup.php">LOGOUT</a></li>
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->

        <form class="form-style-1 placeholder-1" method="POST" action="checkout.php" >
                        <div class="row">
                                <div class="col-md-6"> <input class="mb-20" type="text" name ="name" placeholder="Name">  </div>
                                <div class="col-md-6"> <input class="mb-20" type="text" name="email" placeholder="E-mail">  </div>
                                <div class="col-md-12"><input class="mb-20" type="text"name="subject" placeholder="Address">  </div>
                        </div><!-- row -->
                        <h6 class="center-text mtb-30"><button type="submit" class="btn-primaryc plr-25" name="send_message"><b>Submit</b></button></h6>
                </form>
</header>
</body>
</html>