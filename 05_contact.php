<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Luigi's</title>
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

</head>
<body>

<header>
        <div class="container">
                <a class="logo" href="#"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="right-area">
                        <h6><a class="plr-20 color-white btn-fill-primary" href="tel: +91 80 4953 7324">ORDER: +91 80 4953 7324</a></h6>
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="02_about_us.html">ABOUT US</a></li>
                        <li><a href="03_menu.html">SERVICES</a></li>
                        <li><a href="04_blog.html">NEWS</a></li>
                        <li><a href="05_contact.php">CONTACT</a></li>
                        <li><a href="cartcopy.php">CART</a></li>
                        
                        <li><a href="signup.php">LOGOUT</a></li>
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>


<section class="bg-6 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b>SAY HELLO</b></h5>
                                <h3 class="mt-30 mb-15">Contact</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="images/heading_logo.png" alt="">
                        <h2>Say hello</h2>
                        <h5 class="mt-10 mb-30">Say hello, send us a message</h5>
                        <p class="mx-w-700x mlr-auto">Proin dictum viverra varius. Etiam vulputate libero dui, at pretium
                                elit elementum quis. Enean porttitor eros non ultrices convallis.
                                Vivamus quis dolor ut arcu lobortis finibus a vitae leo. Sed eget tempus sem.
                                Nullam sed lacus sed metus tincidunt lobortis lobortis at nibh. Morbi euismod, arcu in gravida rhoncus</p>
                </div>

                <form class="form-style-1 placeholder-1" method="POST" action="05_contact.php" >
                        <div class="row">
                                <div class="col-md-6"> <input class="mb-20" type="text" name ="name" placeholder="Name">  </div>
                                <div class="col-md-6"> <input class="mb-20" type="text" name="email" placeholder="E-mail">  </div>
                                <div class="col-md-12"><input class="mb-20" type="text"name="subject" placeholder="Subject">  </div>
                                <div class="col-md-12">
                                        <textarea class="h-200x ptb-20" name="message" placeholder="Message"></textarea></div>
                        </div><!-- row -->
                        <h6 class="center-text mtb-30"><button type="submit" class="btn-primaryc plr-25" name="send_message"><b>SEND MESSAGE</b></button></h6>
                </form>
        </div><!-- container -->
</section>


<div class="map-area h-700x mb--30">
        <div id="map" style="height:100%;"></div>
</div><!-- map-area -->

<footer class="pb-50  pt-70 pos-relative">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
                <a href="index.html"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="pt-30">
                        <p class="underline-secondary"><b>Address:</b></p>
                        <p>Yeshwantpur, Rajajinagar and Indiranagar, Bangalore </p>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Phone:</b></p>
                        <a href="tel:+91 80 4953 7324 ">+91 80 4953 7324 </a>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Email:</b></p>
                        <a href="mailto:info@speedza.com"> info@speedza.com</a>
                </div>

                <ul class="icon mt-30">
                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
                </ul>

</footer>

<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-oEyU88bRR6xcbV1gI_Cahc8ugKC_JPE&callback=initMap"></script>

</body>
</html>

 <?php
 $host = "host = localhost";
 $port = "port = 5432";
 $dbname = "dbname = speedzadb";
 $credentials = "user = postgres password=enteryourpass";

 $db = pg_connect("$host $port $dbname $credentials");
        if(isset($_POST['send_message'])){
                $name = pg_escape_string($db, $_POST['name']);
                $email = pg_escape_string($db, $_POST['email']);
                $subject = pg_escape_string($db, $_POST['subject']);
                $message = pg_escape_string($db, $_POST['message']);

                $insert = "INSERT INTO Messages (customername, customeremail, subjectofmessage, customermessage)
                        VALUES ('$name', '$email', '$subject', '$message')";
                pg_query($db, $insert);
        }

 
 ?>