<?php
    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = speedzadb";
    $credentials = "user = postgres password=enteryourpass";

    $db = pg_connect("$host $port $dbname $credentials");
    if (!$db)
        echo "Error Error \n";
    else
        echo "Connection successful \n";
    

    // Complex SQL Queries for retrieving data based on user requests.

    $queryCrossJoin = "SELECT subtotal FROM Orders CROSS JOIN customer";

    // $result = pg_query($db, $queryCrossJoin);
    // $arr = pg_fetch_all($result);
    // print_r($arr);

    $queryInnerJoin = "SELECT Orders.orderid, customer.customername
        FROM Orders
        INNER JOIN Customer ON Orders.customerid = customer.customerid";
    $result = pg_query($db, $queryInnerJoin);
    $arr = pg_fetch_all($result);
    print_r($arr);

    $queryEquiJoin = "SELECT * FROM customer NATURAL JOIN orders";
    // $result = pg_query($db, $queryEquiJoin);
    // $arr = pg_fetch_all($result);
    // print_r($arr);
    
    $aggregateFunctions = "SELECT sum(subtotal), avg(subtotal), max(subtotal), min(subtotal) FROM Orders";
    // $result = pg_query($db, $aggregateFunctions);
    // $arr = pg_fetch_all($result);
    // print_r($arr);
    
    $orderbyquery = "SELECT customerphone FROM Customer ORDER BY customername";
    // $result = pg_query($db, $orderbyquery);
    // $arr = pg_fetch_all($result);
    // print_r($arr);
    
    

    $groupbyquery = "SELECT * FROM Product GROUP BY productvegetarian HAVING productprice < 399";
    //Groups pizzas by veg/non-veg for pizzas above the price of 399
    // $result = pg_query($db, $orderbyquery);
    // $arr = pg_fetch_all($result);
    // print_r($arr);

    $nestedquery = "SELECT customername FROM (SELECT * FROM customer WHERE customeremail "%gmail.com")";
    //Selects customers who's email ends with gmail.com
    $correlatedquery = "SELECT productdescription FROM product WHERE productprice > (SELECT AVG(productprice) FROM product)";
    //selects product descriptions of products whose price is above the average price of all the products
    
    
?> 