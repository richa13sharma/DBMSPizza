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

    // Change a product for a particular customer.
    $updateOrder = "UPDATE orderdetails SET productid = '$p_id' WHERE orderid = '$order_id' ";
    // Change the password for the particular customer.
    $updatePass = "UPDATE customer SET customerpassword = '$newpass' WHERE customerid = '$cust_id' ";
    // Select all products which are vegetarian.
    $readVeg = "SELECT * FROM Product WHERE productVegetarian = true"; 
    // Select CustomerPhone whose name starts with A
    $readName = "SELECT customerPhone FROM Customer WHERE customerName LIKE 'A%' ";
    // Select CustomerId whose subtotal is greater than 1000 for Offers.
    $ordersubtotal = "SELECT customerId FROM Order WHERE subTotal >= 1000";
    // If Number of items is greater than 2 then the order is considered.  
    $itemCount = "SELECT customerId FROM Order WHERE itemCount > 2";
    // Delete orders whose subtotal is greater than 150. 
    $deleteSubTotal = "DELETE FROM Order WHERE subTotal <= 150"; 


?>