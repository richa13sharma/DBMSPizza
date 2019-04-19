<?php

$host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = speedzadb";
    $credentials = "user = postgres password=enteryourpass";

    $db = pg_connect("$host $port $dbname $credentials");

    $custid = "SELECT customerid FROM customer where customeremail = 'balajirox@gmail.com' ";
        $custidres = pg_query($db, $custid);
        $rowcustid = pg_fetch_array($custidres);
        echo $rowcustid[0];

    // unset($_COOKIE['$cookiename']);
    echo "value is: ".$_COOKIE['customerid'];
?>