<!DOCTYPE html>
<html>
	<head>
		<title>Ask More</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap-4.5.0-dist/css/bootstrap.css">
		<meta name="viewport" content= "width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/css" href="../css/text.css">
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
		<style type="text/css">
			#bg{
				background:url('../icons/img1.jpg');
				background-size: cover;
			}
			#b-radius{
				border-radius: 5px;
			}
			body{
				background:url('../icons/bg.png');
			}
		
      input[type=text]:focus {
        outline: none;
      }
      #height{
      	height: 500px;
      }
		</style>
	</head>
	<body>
		<div class="container container-fluid row  my-3 ml-3" id="height">
			<div id="bg" class="container col-md-6" id="b-radius">
				
			</div>
			<div class="container col-md-6 p-3 bg-white" id="b-radius">
<?php
if (isset($_GET['t'])){
if ($_GET['t']='alreadyRegistered'){
		echo "<div class='alert alert-danger alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>Error!</strong> Username Has Been Taken 
  </div>";
	}
	
	
	
}
if (isset($_GET['n'])) {

	 if ($_GET['n']='inval'){
			echo "<div class='alert alert-danger alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>Invalid Username</strong>  Username Should Be Less Than 10 Characters Or Greater Than 3 Characters
  </div>";

	}
}
		?>
			<h1 class="text-success text p-4">Sign Up </h1>
			<form method="POST" action="../process.php">
			<div class="form-group">
				<label for="fname" class="text text-success">First Name</label><br>
				<input class="form-control" type="text" name="fname" id="no-outline">
			</div>
			<div class="form-group">
				<label for="fname" class="text text-success">Last Name</label><br>
				<input class="form-control" type="text" name="lname" id="no-outline">
			</div>
			<div class="form-group">
				<label for="fname" class="text text-success">Date Of Birth</label><br>
				<input class="form-control" type="date" name="dob" id="no-outline">
			</div>
			<div class="form-group p-1">
				<label for="fname" class="text text-success">User Name</label><br>
				<input class="form-control" type="text" name="uname" id="no-outline" required>
			</div>
			<div class="form-group p-1">
				<label for="fname" class="text text-success">Password</label><br>
				<input class="form-control" type="Password" name="pass" id="no-outline" required>
			</div>
			<button class="btn btn-success" type="submit" name="register">Register</button>
			</form>
			</div>
			
		</div>
	</body>
</html>