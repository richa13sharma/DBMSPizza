<?php
    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = speedzadb";
    $credentials = "user = postgres password=enteryourpass";

    $db = pg_connect("$host $port $dbname $credentials");
    if (!$db)
        echo "Error Error \n";
    else
        echo "Connection successful\n";

    // $droptable = "DROP TABLE typesofpizza";
    // $drop = pg_query($db, $droptable);
    // if(!$drop)
    //     echo ("error\n");
   // else
    //     echo ("success\n");

    
    // $tableproduct_category = "CREATE TABLE product_category (
    //     productId SERIAL,
    //     categoryId SERIAL
    // )";
    $tableCategory = "CREATE TABLE Category (
        categoryId SERIAL PRIMARY KEY,
        categoryName VARCHAR (30)
    )";
       $tableProduct = "CREATE TABLE Product (
        productId SERIAL PRIMARY KEY,
        productPrice REAL NOT NULL,
        productDescription VARCHAR (100),
        productName VARCHAR (50) NOT NULL,
        productVegetarian BOOLEAN NOT NULL,
        categoryId SERIAL   REFERENCES Category(categoryId)
    )";
    $tableProductCategory = "CREATE TABLE Product_Category (
        productId SERIAL REFERENCES Product(productId),
        categoryId SERIAL REFERENCES Category(categoryId)
    )";
    $tableCustomer = "CREATE TABLE Customer (
        customerId SERIAL PRIMARY KEY,
        customerName VARCHAR (50) NOT NULL,
        customerEmail VARCHAR (50) NOT NULL UNIQUE,
        customerPhone BIGINT NOT NULL UNIQUE,
        customerPassword VARCHAR (16) NOT NULL
    )";
    $tableOrder = "CREATE TABLE Orders (
        orderId SERIAL PRIMARY KEY,
        customerId SERIAL REFERENCES Customer(customerId),
        subtotal REAL NOT NULL,
        itemCount INT NOT NULL,
    )";
    $tableMessage = "CREATE TABLE Messages (
        messageId SERIAL PRIMARY KEY,
        customerid INT,
        customername VARCHAR(100),
        customeremail VARCHAR(100),
        subjectofmessage VARCHAR(100),
        customermessage VARCHAR(400)
    )";
    // $tableOrderDetails = "CREATE TABLE OrderDetails (
    //     productId SERIAL REFERENCES Product(productId),
    //     orderId SERIAL REFERENCES Orders(orderId)
    // )";
    // $tableCart = "CREATE TABLE Cart (
    //     productId SERIAL REFERENCES product(productid),
    //     productQty INT
    // )";

    $tableShoppingCart = "CREATE TABLE Cart (
        customerId SERIAL REFERENCES Customer(customerId),
        productId SERIAL   REFERENCES Product(productId),
        qty INT NOT NULL
    )";
    $tablecatquery = pg_query($db, $tableCategory);
    if(!$tablecatquery)
        echo ("error\n");
    else
        echo ("success tablecat\n");
    
    $tableprodquery = pg_query($db, $tableProduct);
    if(!$tableprodquery)
        echo ("error\n");
    else
        echo ("success tableprod\n");

    $tableprodcatquery = pg_query($db, $tableProductCategory);
    if(!$tableprodcatquery)
        echo ("error\n");
    else
        echo ("success tableprodcat\n");

    $tablecustquery = pg_query($db, $tableCustomer);
    if(!$tablecustquery)
        echo ("error\n");
    else
        echo ("success tablecust\n");
    
    $tableorderquery = pg_query($db, $tableOrder);
    if(!$tableorderquery)
        echo ("error\n");
    else
        echo ("success tableorder\n");

    $tableorderdetsquery = pg_query($db, $tableOrderDetails);
    if(!$tableorderdetsquery)
        echo ("error\n");
    else
        echo ("success tableorderdets\n");

    $tablecartsquery = pg_query($db, $tableShoppingCart);
    if(!$tablecartsquery)
        echo ("error\n");
    else
        echo ("success tablecart\n");
        $tablemessage = pg_query($db, $tableMessage);
    if(!$tableMessage)
        echo ("error\n");
    else
        echo ("success tablemessage\n");