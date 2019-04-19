<?php

$host = "host = localhost";
$port = "port = 5432";
$dbname = "dbname = speedzadb";
$credentials = "user = postgres password=enteryourpass";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db)
    echo "Error Error \n";
$id = $_GET['pid'];
// echo $id;
//add to cart here
$query = "UPDATE cart SET qty = qty-1 WHERE $id = productid AND customerid = '1'";
$qtycontent = "DELETE FROM cart WHERE qty <= 0";
$prodInsert = pg_query($db, $query);
$prodDelete = pg_query($db, $qtycontent);
//clear url to .php only
function set_url( $url )
{
    echo("<script>history.replaceState({},'','$url');</script>");
}
// set_url("http://localhost/DBMSPizza/cartcopy.php");
header("Refresh:0; url=http://localhost/DBMSPizza/cartcopy.php");

?>