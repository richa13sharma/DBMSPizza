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
    
    $category = "INSERT INTO Category (categoryName)
            VALUES ('Appetizer'),
                   ('Entree'),
                   ('Side Item'),
                   ('Beverage'),
                   ('Salad')";
    
    // $catInsert = pg_query($db, $category);

    $prod = "INSERT INTO Product (productprice, productdescription, productname, productvegetarian, categoryid)
            VALUES (499, 'Mexican herbs sprinkled on Veggies', 'Mexican  Wave', 'true', 2),
                   (399, 'Cheese Burst Max', 'Margherita', 'true', 2),
                   (299, 'Classic Onion and Cheese Pizza', 'Onion&Cheese', 'true', 2),
                   (59, 'DrinkCola', 'Coca-Cola', 'true', 4),
                   (835, 'Supreme Combination of all Veggies and Grilled Chicken', 'Non Veg Supreme', 'false', 2),
                   (149, 'Get the taste of a Burger and a Pizza in One', 'Burger Pizza Classic Veg', 'true', 3),
                   (199, 'Get the taste of a Burger and a Pizza in One - Supreme', 'Burger Pizza Supreme Non Veg', 'false', 3),
                   (95, 'Breadsticks With Cheesy Dips', 'Garlic Breadsticks', 'true', 3),
                   (109, 'Go Healthy with a Fresh Green Salad', 'Vegetable Salad', 'true', 5)";

    // $prodInsert = pg_query($db, $prod);

    $custo = "INSERT INTO Customer (customername, customeremail, customerphone, customerpassword)
            VALUES ('Arush', 'arush123@gmail.com', 9945894355, md5('thisispasssword')),
                    ('Balaji', 'balajirox@gmail.com', 9845012345, md5('thisisnotpassword')),
                    ('Chitra', 'chitraraj@gmail.com', 9740234589, md5('ab123'))";

    // $custoInsert = pg_query($db, $custo);

    $alter = "ALTER TABLE Customer ALTER COLUMN customerpassword TYPE VARCHAR(40)";
    // $alterIn = pg_query($db, $alter);

    $orderins = "INSERT INTO Orders (customerid, subtotal, itemcount) 
            VALUES (1, 344, 3),
                   (2, 433, 3)";
//     $order = pg_query($db, $orderins);

    $trigger = "CREATE TRIGGER `AfterProdInsert` BEFORE INSERT ON `Product` FOR EACH ROW 
    BEGIN
        INSERT INTO product_category
        SET productid  = 'new.productid',
        categoryid       =  'new.categoryid'
    END"
?>