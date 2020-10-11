<?php
session_start();
if (isset($_SESSION['username'])){
	header('location:home/');
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ask More</title>
			<link rel="stylesheet" type="text/css" href="css/text.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/js/bootstrap.js">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
		<meta name="viewport" content= "width=device-width, initial-scale=1.0"> 
		<style type="text/css">
			#bg{
				background:url('icons/img1.jpg');
				background-size: cover;
			}
			#b-radius{
				border-radius: 5px;
			}
			body{
				background:url('icons/bg.png');
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
	if ($_GET['t']='invalidInfo'){
echo "<div class='alert alert-danger alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>Error!</strong> Invalid Username Or Password
  </div>";
	}
	}
else if(isset($_GET['s'])){
 if ($_GET['s']='success'){
		echo "<div class='alert alert-success alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> You've Been Registered Succesfully
  </div>";
}
}
		?>
			<h1 class="text-success text p-4">Sign In </h1>
			<form method="POST" action="process.php">
			<div class="form-group p-1">
				<label for="fname" class="text text-success">User Name</label><br>
				<input class="form-control" type="text" name="uname" id="no-outline" required>
			</div>
			<div class="form-group p-1">
				<label for="fname" class="text text-success">Password</label><br>
				<input class="form-control" type="Password" name="pass" id="no-outline" required>
			</div>
			<button class="btn btn-success mb-2" type="submit" name="login">Log In</button><br>
			<small class="text">Not a member yet? <a class="text-success text" href="register/">Sign Up</a></small>
			</form>
			</div>
			
		</div>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>