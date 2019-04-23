

<?php include('serverPostgres.php');
if (isset($_COOKIE['customerid']))
	unset($_COOKIE['customerid']);
if (isset($_COOKE['orderid']))
 unset($_COOKIE['orderid']);
if (isset($_COOKE['subtotal']))
 unset($_COOKIE['subtotal']);
 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up!</title>
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <link rel="stylesheet" type="text/css" href="All.css">

</head>
<body>

	
	<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="signup">
    <img class="w3-image w3-opacity-max " src="bg_3.jpg " alt="Pizza Catering" width="1850" height="1000">
    <div class="w3-display-topmiddle w3-padding-large ">
  <div class="header">
  	<h2>Sign up</h2>
  </div>
  <form method="post" action="signup.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label><h4>Name</h4></label>
  	  <input type="text" name="name1">
		</div>
		<div class="input-group">
  	  <label><h4>Phone</h4></label>
  	  <input type="text" name="phone">
		</div>
  	<div class="input-group">
  	  <label><h4>Email</h4></label>
			<input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label><h4>Password</h4></label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label><h4>Confirm password</h4></label>
		<input type="password" name="password_2">
	  </div>
	  <br>
  	<div class="input-group">
			<button type="submit" class="btn" name="reg_user"><h4>Sign Up!</h4></button>
		</div>
  	<p>
		<h4>
  		Already a member? </h4><a href="login.php">Sign in</a>
  	</p>
  </form>
</div>
</header>
</body>
</html>