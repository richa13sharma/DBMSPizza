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

    // Selects all orders and displays their subtotals.
    $queryCrossJoin = "SELECT subtotal FROM Orders CROSS JOIN customer";
    // $result = pg_query($db, $queryCrossJoin);
    // $arr = pg_fetch_all($result);
    // print_r($arr);

    // Displays which customers have placed what orders.
    $queryInnerJoin = "SELECT Orders.orderid, customer.customername
        FROM Orders
        INNER JOIN Customer ON Orders.customerid = customer.customerid";
    // $result = pg_query($db, $queryInnerJoin);
    // $arr = pg_fetch_all($result);
    // print_r($arr);

    // Displays all customer information who placed orders. 
    $queryEquiJoin = "SELECT * FROM customer NATURAL JOIN orders";
    // $result = pg_query($db, $queryEquiJoin);
    // $arr = pg_fetch_all($result);
    // print_r($arr);
    
    // Calcualtes sum avg subtotal min and max of all orders placed.
    $aggregateFunctions = "SELECT sum(subtotal), avg(subtotal), max(subtotal), min(subtotal) FROM Orders";
    // $result = pg_query($db, $aggregateFunctions);
    // $arr = pg_fetch_all($result);
    // print_r($arr);
    
    // Orders phone numbers of customers based on their names.
    $orderbyquery = "SELECT customerphone FROM Customer ORDER BY customername";
    // $result = pg_query($db, $orderbyquery);
    // $arr = pg_fetch_all($result);
    // print_r($arr);
    
    // Displays any customers who have not placed any orders.
    $selectExists = "SELECT customername FROM Customer 
                     WHERE NOT EXISTS (SELECT * FROM Orders WHERE Customer.customerid = Orders.customerid)";
    // $result = pg_query($db, $selectExists);
    // $arr = pg_fetch_all($result);
    // print_r($arr);

    // Displays all products in a particular catgory (in this example its Entree).
    $selectIn = "SELECT productname from Product
                 WHERE categoryid IN(2)";
    // $result = pg_query($db, $selectIn);
    // $arr = pg_fetch_all($result);
    // print_r($arr);

    // Displays all customers who have not placed Orders this time its using EXCEPT in SQL. 
    $selectExcept = "SELECT customername
                    FROM Customer
                    LEFT JOIN Orders
                    ON Customer.customerid = Orders.customerid
                    EXCEPT
                    SELECT  customername
                    FROM Customer
                    RIGHT JOIN Orders
                    ON Customer.customerid = Orders.customerid";
    // $result = pg_query($db, $selectExcept);
    // $arr = pg_fetch_all($result);
    // print_r($arr);

?> 