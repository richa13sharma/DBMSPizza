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
    
    $username = "";
    $email = "";
    $errors = array();

    if(isset($_POST['reg_user'])){
        $name = pg_escape_string($db, $POST(['name']));
        $username = pg_escape_string($db, $_POST['username']);
        $email = pg_esacape_string($db, $_POST['email']);
        $phone = pg_escape_String($db, $_POST['phone']
        $password1 = pg_esacape_string($db, $_POST['password_1']);
        $password2 = pg_esacape_string($db, $_POST['password_2']);
        if (empty($username)) { array_push($errors, "Username is required");
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($password_1)) { array_push($errors, "Password is required"); }
        if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = pg_query($db, $user_check_query);
    $user = pg_fetch_assoc($result);
  
    if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0){
      $password = md5($password);

      $insertUser = "INSERT INTO Customer (customerName, customerEmail, customerPhone, customerPassword)
                    VALUES ('$name', '$email', '$phone', '$password')";
      pg_query($db, $insertUser);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: homepage.html');
  }

  if (isset($_POST['login_user'])) {
    $username = pg_escape_string($db, $_POST['username']);
    $password = pg_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {  
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = pg_query($db, $query);
        if (pg_num_rows($results) >= 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: homepage.html');
        }
        else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

?>