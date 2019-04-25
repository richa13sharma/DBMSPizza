<?php
    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = speedzadb";
    $credentials = "user = postgres password=enteryourpass";

    $db = pg_connect("$host $port $dbname $credentials");
    if ($db)
    {
        $selectExists = "SELECT customername FROM Customer 
                     WHERE NOT EXISTS (SELECT * FROM Orders WHERE Customer.customerid = Orders.customerid)";
    $result = pg_query($db, $selectExists);
    $arr = pg_fetch_all($result);
    print_r($arr);
    }
    else{
        echo "Error Error";
    }
?>