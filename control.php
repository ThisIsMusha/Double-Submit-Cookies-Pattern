<?php

session_start();

require_once 'token.php';

 $display_msg = "";

  if(isset($_POST['fname'], $_POST['lname'], $_POST['csrf_token'])){

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $csrf_token = $_POST['csrf_token'];

      if(!empty($fname) && !empty($lname) && !empty($csrf_token))
	  {
        if(Token::check_token($csrf_token))
		{
          $msg = "Updated Successfully! " ;
          $display_msg = "<p class=\"text-success\"><strong>".$msg."</strong></p>";
        }
        else{
          $msg = "Error Invalid Token";
          $display_msg = "<p class=\"text-danger\"><strong>".$msg."</strong></p>";
        }
      }
      else{
        echo "<script>alert('Check your details');</script>";
      }
  }




?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
		<div class="heading text-center mb-5 text-uppercase text-white">Welcome <?php $_SESSION['logeduser'] ?> </div>
		<div class="container row d-flex flex-row justify-content-center mb-5 ">
			<div class="admin-form shadow p-2">
			<?php
				if (session_id() == '' || !isset($_SESSION['logeduser'])) { 
					header('Location: ./index.php');
			?>
			<?php
			} 
			else {
				echo "Hi, " . $_SESSION['logeduser'] . "";
			?>
			
				<form class="form" action="" method="POST">
					<div class="form-group">
						<label for="fname"><h4>First Name<h4></label>
                        <input type="text" name="fname" class="form-control">
					</div>
					<div class="form-group">
						<label for="lname"><h4>Last Name<h4></label>
                        <input type="text" name="lname" class="form-control">
					</div>
				
					<div id="div1">
						<input id="login-username" type="hidden" class="form-control" name="csrf_token" value="<?php  echo $_SESSION["token"];  ?>"> 
					</div>
                    <div class="form-group">
                        <button class="login" value="Update"> Update </button>
                    </div>
					
				</form>
				
				<div>
					<?php
					echo $display_msg;
					}
					?>
				</div>
					
				<script type="text/javascript" src="./script.js"></script>
				<a href="logout.php" class="btn btn-danger mb-2">Logout</a>
			</div>
		</div>
	
	</div>	

</header>




</body>
</html>