<?php
session_start();
require_once 'token.php';

$_SESSION["logeduser"] = '';


	if(isset($_POST['username']) && isset($_POST['password']))
	
	{

 	if($_POST['username'] == "admin" && $_POST['password']=="admin")
	
	{

			$_SESSION["logeduser"] = $_POST['username'];			
			$token = Token::generate_token(session_id());
			setcookie("id", session_id());
			setcookie("token", $token);
	        header('Location: control.php');
			header('Location: ./control.php'); //redirect to main
	}
	
  else
  {
    echo "<script>alert('Check username and password');</script>";
    echo "<noscript>Check username and password</noscript>";
  }
}


 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'links.php' ?>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<header>
	<div class="container center-div shadow ">
		<div class="heading text-center mb-5 text-uppercase text-white">Double Submit Cookies Pattern</div>
		<div class="container row d-flex flex-row justify-content-center mb-5 ">
			<div class="admin-form shadow p-2">
			
				<form class="form" action="" method="POST">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" autocomplete="off">
					</div>
				
					<div class="form-group">
						<label for="password">Password</label>
						<input type="text" name="password" id="password" class="form-control" autocomplete="off">
					</div>
					
					
					<button class="login">login</button>
					
				</form>
				
			</div>
		</div>
	
	</div>	

</header>
</body>
</html>

