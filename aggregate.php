<?php
    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = speedzadb";
    $credentials = "user = postgres password=enteryourpass";

    $db = pg_connect("$host $port $dbname $credentials");
    if ($db)
    {
        $aggregateFunctions = "SELECT sum(subtotal), avg(subtotal), max(subtotal), min(subtotal) FROM Orders";
        $result = pg_query($db, $aggregateFunctions);
        $arr = pg_fetch_all($result);
        print_r($arr);
    }
    else
        echo "Error Error";
?>