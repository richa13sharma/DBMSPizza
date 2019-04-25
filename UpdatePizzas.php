<?php

$host = "host = localhost";
$port = "port = 5432";
$dbname = "dbname = speedzadb";
$credentials = "user = postgres password=enteryourpass";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db)
    echo "Error Error \n";
    // print_r($_POST['veg']);
    if(isset($_POST['name'])){
        $id = pg_escape_string($db, $_POST['id']);
        $name = pg_escape_string($db, $_POST['name']);
        $cost = pg_escape_string($db, $_POST['cost']);
        $veg = pg_escape_string($db, $_POST['veg']);
        $desc = pg_escape_string($db, $_POST['message']);
        $category = pg_escape_string($db, $_POST['category']);

        $update = "UPDATE Product
                    SET productname = '$name', productprice = '$cost', productdescription = '$desc', productvegetarian = '$veg', categoryid = '$category'
                    WHERE productid = '$id' ";
        pg_query($db, $update);
}


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
                        <li><a href="NewPizzas.php">NEW PRODUCT</a></li>
                        <li><a href="DelPizzas.php">DELETE PRODUCT</a></li>
                        <li><a href="UpdatePizzas.php">UPDATE PRODUCT</a></li>


                <div class="clearfix"></div>
        </div><!-- container -->
</header>
<br><br><br><br><br>
<body>
    <form action = "UpdatePizzas.php" method = "POST" class = "form-style-1 placeholder-1">
    <div class="row">
                                <div class="col-md-12"> <input class="mb-20" type="text" name ="id" placeholder="ID of the Pizza">  </div>
                                <br>
                                <div class="col-md-12"> <input class="mb-20" type="text" name ="name" placeholder="Name of the Pizza">  </div>
                                <br>
                                <div class="col-md-12"> <input class="mb-20" type="number" name="cost" placeholder="Cost">  </div>
                                <br>
                                <div class="col-md-12">
                                Vegetarian?: 
                                <select class = 'mb-20' name = "veg">
                                    <option value = "true">Yes</option>
                                    <option value = "false">No</option>
                                </select>
                                </div>
                                <br>
                                <div class="col-md-12"> <input class="mb-20" type="number" name="category" placeholder="Category">  </div>
                                <br>
                                <div class="col-md-12">
                                        <textarea class="h-200x ptb-20" name="message" placeholder="Description"></textarea></div>
                                
                        </div>
                        <h6 class="center-text mtb-30"><button type="submit" class="btn-primaryc plr-25" name="send_message"><b>SEND ITEM</b></button></h6>
                
    </form>
</body>
</html>