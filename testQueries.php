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
    
    // $sql = "CREATE DATABASE speedzadb";  
    
    // $return = pg_query($db, $sql);
    // if(!$return)
    //     // echo pg_last_error($db);
    //     echo "\n";
    // else
    //     echo "Database created successfully.\n";
    
    // $tablePizza = "CREATE TABLE TypesOfPizza(
    //         id SERIAL PRIMARY KEY,
    //         nameOfPizza VARCHAR(20) NOT NULL,
    //         cost REAL NOT NULL,
    //         ingredients VARCHAR(100) NOT NULL,
    //         vegetarian BOOLEAN NOT NULL)
    //     ";
    
    // $ret = pg_query($db, $tablePizza);
    // if (!$ret)
    //     echo pg_last_error($db)."\n";
    // else
    //     echo "table created successfully.\n";

    $sql = "INSERT INTO typesofpizza (id, nameofpizza, cost, ingredients, vegetarian)
            VALUES (1001, 'Pepperoni', '550', 'salami, pork, beef, paprika', 'False'),
                   (1002, 'Margherita', '450', 'Cheese', 'True'),
                   (1003, 'Veggie Paradise', '500', 'onion, tomato, babycorn, olives', 'True')";
    $insertpizza = pg_query($db, $sql);
    if(!$insertpizza)
        echo(preg_last_error($db)."\n");
    else
        echo ("Insert Successful.\n");
?>