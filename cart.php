<!DOCTYPE <!DOCTYPE html>
<html>
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
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="02_about_us.html">ABOUT US</a></li>
                        <li><a href="03_menu.html">SERVICES</a></li>
                        <li><a href="04_blog.html">NEWS</a></li>
                        <li><a href="05_contact.html">CONTACT</a></li>
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>
                <div class="row">
                        <div class="col-md-6">
                                <p class="mb-30">Maecenas fermentum tortor id fringilla molestie. In hac habitasse
                                        platea dictumst. Morbi maximus
                                        lobortis ipsum, ut blandit augue ullamcorper vitae.
                                        Nulla dignissim leo felis, eget cursus elit aliquet ut. Curabitur vel convallis
                                        massa. Morbi tellus
                                        tortor, luctus et lacinia non, tincidunt in lacus.
                                        Vivamus sed ligula imperdiet, feugiat magna vitae, blandit ex. Vestibulum id
                                        dapibus dolor, ac
                                        cursus nulla. </p>
                        </div><!-- col-md-6 -->

                        <div class="col-md-6">
                                <p class="mb-30">Maecenas fermentum tortor id fringilla molestie. In hac habitasse platea
                                        dictumst.Morbi maximus lobortis ipsum, ut blandit augue ullamcorper vitae.
                                        Nulla dignissim leo felis, eget cursus elit aliquet ut. Curabitur vel
                                        convallismassa. Morbi tellus tortor, luctus et lacinia non, tincidunt in lacus.
                                        Vivamus sed ligula imperdiet, feugiat magna vitae, blandit ex. Vestibulumidda
                                        pibus dolor, accursus nulla. </p>
                        </div><!-- col-md-6 -->
                </div><!-- row -->
        </div><!-- container -->
</section>
<!--above section needs to be deleted-->
<table>
<?php

    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = speedzadb";
    $credentials = "user = postgres password=gvonly";
    
    $db = pg_connect("$host $port $dbname $credentials");
    if (!$db)
        echo "Error Error \n";
    else
        echo "connection success\n";
    $result = pg_query($db, "SELECT * FROM cart WHERE customerid = 1");
    $num_rows = pg_num_rows($result);
    $rows =  $num_rows/3;

for($i=1; $i<=$rows ; $i++)
{
    echo "<tr>";
    for($j=1; $j<=3; $j++)
    {
        while($row = pg_fetch_array($result))
        {
            echo
            ("<td width='180px' height='200px'>"
             ."<div>"
             .$row['productid']
             ."</div>"
             ."<div>"
             .$row['qty']
             ."</div>"
             ."</td>"
            );
        }
    }
    echo "</tr>";
}
?>
</table>    
</body>
</html>