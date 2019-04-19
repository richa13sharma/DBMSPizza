<?php

$host = "host = localhost";
$port = "port = 5432";
$dbname = "dbname = speedzadb";
$credentials = "user = postgres password=enteryourpass";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db)
    echo "Error Error \n";

$result = pg_query($db, "SELECT * FROM cart,product WHERE customerid = 1 AND cart.productid = product.productid");
$num_rows = pg_num_rows($result);
$subtotal = 0;

echo "
<h1>Shopping Cart</h1>

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
  <p class='product-description'>The best dog bones of all time. Holy crap. Your dog will be begging for these things! I got curious once and ate one myself. I'm a fan.</p>
</div>
<div class='product-price'>".$row['productprice']."</div>
<div class='product-quantity'>"
.$row['qty']
."
</div>
<div class='product-removal' >
  <a class='remove-product' href = 'update.php?pid=2'>
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
</div>
<button class='checkout'>Checkout</button>
    
    </div>";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Speedza</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/> -->

        <!-- Stylesheets -->
        <!-- <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <link href="plugin-frameworks/swiper.css" rel="stylesheet"> -->
        <!-- <link href="fonts/ionicons.css" rel="stylesheet"> -->
        <!-- <link href="common/styles.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="cartcss.css">
       

</head> 
<body>
    <script src = "cart.js"></script> 
    
          
          

</body>
</html>