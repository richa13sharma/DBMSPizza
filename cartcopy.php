<?php

$host = "host = localhost";
$port = "port = 5432";
$dbname = "dbname = speedzadb";
$credentials = "user = postgres password=enteryourpass";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db)
    echo "Error Error \n";
$customerid = $_COOKIE['customerid'];
$result = pg_query($db, "SELECT * FROM cart, product WHERE customerid = $customerid AND cart.productid = product.productid");
$num_rows = pg_num_rows($result);
$subtotal = 0;
echo"
  
<header>
        <div class='container'>
                <a class='logo' href='#'><img src='images/logo-white.png' alt='Logo'></a>

                <!-- <div class='right-area'>
                        <h6><a class='plr-20 color-white btn-fill-primary' href='tel: +91 80 4953 7324'>ORDER: +91 80 4953 7324</a></h6>
                </div>right-area -->

                <a class='menu-nav-icon' data-menu='#main-menu' href='#'><i class='ion-navicon'></i></a>

                <ul class='main-menu font-mountainsre' id='main-menu'>
                        <li><a href='indexcopy.php'>HOME</a></li>
                        <li><a href='02_about_us.html'>ABOUT US</a></li>
                        <li><a href='03_menu.html'>SERVICES</a></li>
                        <li><a href='04_blog.html'>NEWS</a></li>
                        <li><a href='05_contact.php'>CONTACT</a></li>
                        <li><a href='cartcopy.php'>CART</a></li>
                        
                        <li><a href='signup.php'>LOGOUT</a></li>
                </ul>

                <div class='clearfix'></div>
        </div><!-- container -->
</header>
";

echo "
<h3 style = 'padding :100px'>Shopping Cart</h1>

    <div class='shopping-cart'>
    
      <div class='column-labels'>
        <label class='product-image'>Image</label>
        <label class='product-details'>Product</label>
        <label class='product-price'>Price</label>
        <label class='product-quantity'>Quantity</label>
        <label class='product-removal'>Remove</label>
        <label class='product-line-price'>Total</label>
      </div>
";


for($i=1; $i<=$num_rows ; $i++)
{
  for($j=1; $j<=3; $j++)
  {
      while($row = pg_fetch_array($result))
      {
        $pid=$row['productid'];
        echo"    
<div class='product'>
<div class='product-image'>
  <img src='https://s.cdpn.io/3/dingo-dog-bones.jpg'>
</div>
<div class='product-details'>
  <div class='product-title'>".$row['productname']."</div>
  <p class='product-description'>".$row['productdescription']."</p>
</div>
<div class='product-price'>".$row['productprice']."</div>
<div class='product-quantity'>"
.$row['qty']
."
</div>
<div class='product-removal' >
  <a class='remove-product' href = 'update.php?pid=".$pid."'>
    Remove
  </a>
</div>
<div class='product-line-price'>".$row['productprice']*$row['qty']."</div>
</div>
";
$subtotal += $row['productprice']*$row['qty'];
      }
    }

  }
  echo "
  
<div class='totals'>
<div class='totals-item'>
  <label>Subtotal</label>
  <div class='totals-value' id='cart-subtotal'>".$subtotal."</div>
</div>
<div class='totals-item'>
  <label>Tax (5%)</label>
  <div class='totals-value' id='cart-tax'>".$subtotal*0.05."</div>
</div>
<div class='totals-item totals-item-total'>
  <label>Grand Total</label>
  <div class='totals-value' id='cart-total'>".$subtotal*1.05."</div>
</div>
</div>";
setcookie('subtotal', $subtotal*1.05, time()+86400, "/");
if($subtotal*1.05 <= 0)
{
  function set_url( $url )
  {
      echo("<script>history.replaceState({},'','$url');</script>");
  }
  // set_url("http://localhost/DBMSPizza/noitems.html");
  header("Refresh:0; url=noitems.html");
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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet"> -->
        <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="fonts/ionicons.css" rel="stylesheet">
        <link href="common/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="cartcss.css">
       

</head> 
<body>


    <!-- <script src = "cart.js"></script>  -->
    <a class='checkout' href = "checkout.php">Checkout</a>
    </div>
          

</body>
</html>