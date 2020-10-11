<?php 
include('../initialize.php');
session_start();
$uname=$_SESSION['username'];
$query="SELECT * FROM usertbl WHERE username ='$uname'";
$result=$con->query($query);
while ($value=$result->fetch_assoc()) {




?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="../bootstrap-4.5.0-dist/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/text.css">
	<title>Edit Account</title>
</head>
<body class="bg-success">


<div style="width:600px;" class="container p-5 bg-white rounded my-5">
<h3 class="text-success ">Edit Account</h3>
<hr class="p-2">
<form method="POST" action="../process.php">
	<div style="margin-left:35%;" class="mt-3 p-3">
		<img src="../<?php echo $value['pic']; ?>" style="width:100px;height:100px;border-radius:100px;"><br><br>
		<input class="text-success" type="file" name="image">
	</div>
	<div class="form-group row">
		<div class="col">
			<label for='edit_fname' class="text-success">First Name :</label>
		<input class="form-control" type="text" name="edit_fname" value=<?php echo $value['fname']; ?>>
		</div>
		<div class="col">
			<label for='edit_lname' class="text-success">Last Name :</label>
		<input class="form-control" type="text" name="edit_lname" value=<?php echo $value['lname']; ?>>
		</div>
	</div>
	<div class="form-group">
		<label for="edit_uname" class="text-success">Username :</label><br>
		<input class="form-control" type="text" name="edit_uname" value=<?php echo $value['username']; ?> >
	</div>
	<div class="form-group">
		<label for="dob" class="text-success">Date Of Birth :</label><br>
		<input class="form-control" type="date"  name="edit_dob" value=<?php echo date('Y-m-d',strtotime( $value['dob'])); ?>>
	</div>
	<div class="form-group">
		<label for="uname" class="text-success">Password:</label><br>
		<input class="form-control" type="text" name="edit_uname" value=<?php echo $value['pass'];} ?>>
	</div>
	<div class="my-2">
	<button type="submit" name="edit" class="btn btn-success">Update</button>
</div>
</form>
</div>
</body>
</html>