<?php
    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = speedzadb";
    $credentials = "user = postgres password=enteryourpass";

    $db = pg_connect("$host $port $dbname $credentials");

    $db = pg_connect("$host $port $dbname $credentials");
    if (!$db)
        echo "Error Error \n";

    $id = $_COOKIE['customerid'];

    $query= "DELETE FROM cart
        WHERE customerid = $id";

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
</header>
<br><br><br><br><br>
 <h2 align = "center"> THANKS FOR BUYING PIZZA :) </h2>
                    
                    <br>
                    <br>
               <h3 align ="center"> <a href = "indexcopy.php" >Go back to homepage?</a> </h3>

                        



<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>

</body>
</html>



