<?php
include('../initialize.php');
include('../time_convert.php');
session_start();
if ($_SESSION['mainpage']!=="True") {
	 header('location:../error/index.php');
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Homepage</title>
 
	<link rel="stylesheet" type="text/css" href="../css/text.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.5.0-dist/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		#profileimg{
			border-radius: 100px;
		}
		#username{
			color:white;
			font-weight: none;
		}
		#width{
			width:90px;
			height: 70px;
		}
		.bg-custom-1 {
  background-color: #85144b;
}

.bg-custom-2 {
background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
}
		#logout{
			float: right;
			color:white;
			padding: 10px;
			font-size: 25px;
		}
		#Navwidth{
			width: 500px;
		}
	
	</style>
</head>
<body>

 
<nav class="mb-3 navbar sticky-top navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="index.php">Ask More</a>
   <form method="GET" action="index.php" class="form-inline mr-sm-5 my-lg-0">
      <input id="Navwidth" class="form-control ml-lg-5 mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button type="submit" class="btn text-white btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto ml-5">

    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
    	<li class="nav-item dropdown">
    		<button class="btn btn-info text-white mt-3" data-toggle="modal" data-target="#exampleModalLong">Ask A Question</button>
    	</li>
      <li class="nav-item dropdown">
        <a class="nav-link" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
         <?php
          $name=$_SESSION['username'];
          $sql="SELECT username,pic from usertbl WHERE username='$name'";
          $result=$con->query($sql);
          while ($row=$result->fetch_assoc()) {
	      echo '<div class="btn row">
          <img id="profileimg" src="../'.$row['pic'].'" width="40" height="40" />
           <small id="username">'.stripslashes($row['username']).'</small></div>'
          
     ;
	}	
?>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="edit.php">Edit Account</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
   
    </ul>
  </div>
</nav>
<?php 
if (isset($_GET['s'])) {
  echo "<div class='alert alert-success alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>Success!</strong> Question Has Been Uploaded Successfully
  </div>";
}
else if (isset($_GET['t'])){
	echo "<div class='alert alert-danger alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>Error</strong>  Please Try To Explain Your Problem Well
  </div>";
}
?>


<?php 
if (isset($_GET['search'])) {
  $search =$_GET['search'];
  $search="SELECT * FROM questiontbl WHERE title LIKE '%$search%'";
  $search_results= $con->query($search);
  while ($row=$search_results->fetch_assoc()) {
      $sum_qry="SELECT COUNT(*) FROM commentstbl WHERE question_id=".$row['id']."";
      $sum=$con->query($sum_qry);
      
      while ($answers=$sum->fetch_assoc()){

echo"

    <div class='container-fluid bg-light rounded mb-3 p-4 row'>
      
      <div style='background-color: #2ECC71; height:100px; width: auto;' class='btn  text-white'>
        <span class='text' style='font-size: 25px;'>".$answers["COUNT(*)"]."</span>
        <p>Answers</p>
      </div>
      <div style='height:100px; width: auto;' class='btn ml-2 mr-5 text-secondary'>
        <span class='text' style='font-size: 25px;'>".$row['views']."</span>
        <p>Views</p>
      </div>
      <div>
        <h6 class='text mt-4'><a style='color:black;' href='question.php?id=".bin2hex(base64_encode($row['id']))."'>".stripslashes($row['title'])."</a></h6>
        <div class='row'><h6  class='pt-3'>Tag : </h6>
         <small class='text mt-3 ml-2' style='background-color:#78e08f; width:auto; padding: 5px; height:auto; color:#009432; border-radius:20px;'>".$row['tag1']."</small>
        </div>
      </div>
      <div id='leftee' class='ml-5 mb-2'>
          <img src='../".$row['u_pic']."' height='35' width='35' style='border-radius:100px;'><small class='ml-2'>".stripslashes($row['u_name'])."<span style='color:#f6e58d;'> &#x25cf;</span><span class='text text-secondary'>". time_elapsed_string($row['upload_time'])."</span></small>
        </div>
    </div>


  
    ";}}}
else{
?> 

<?php

  $sql="SELECT id,title,description,tag1,views,upvote,upload_time,u_pic,u_name FROM questiontbl ORDER BY upload_time DESC";
  $result=$con->query($sql);
  while ($row=$result->fetch_assoc()) {
      $sum_qry="SELECT COUNT(*) FROM commentstbl WHERE question_id=".$row['id']."";
      $sum=$con->query($sum_qry);
      while ($answers=$sum->fetch_assoc()){
     
    echo"

    <div class='container-fluid  bg-light rounded mb-3 p-4 row'>
      
      <div style='background-color: #2ECC71; height:100px; width: auto;' class='btn  text-white'>
        <span class='text' style='font-size: 25px;'>".$answers["COUNT(*)"]."</span>
        <p>Answers</p>
      </div>
      <div style='height:100px; width: auto;' class='btn ml-2 mr-5 text-secondary'>
        <span class='text' style='font-size: 25px;'>".$row['views']."</span>
        <p>Views</p>
      </div>
      <div class='col-md-5'>
        <h6 class='text mt-4'><a style='color:black;' href='question.php?id=".bin2hex(base64_encode($row['id']))."'>".stripslashes($row['title'])."</a></h6>
        <div class='row'><h6  class='pt-3'>Tag : </h6>
          <small class='text mt-3 ml-2' style='background-color:#78e08f; width:auto; padding: 5px; height:auto; color:#009432; border-radius:20px;'>".$row['tag1']."</small>
        </div>
      </div>
      <div id='leftee' class='ml-5 mb-2'>
          <img src='../".$row['u_pic']."' height='35' width='35' style='border-radius:100px;'><small class='ml-2'>".stripslashes($row['u_name'])."<span style='color:#f6e58d;'> &#x25cf;</span><span class='text text-secondary'>". time_elapsed_string($row['upload_time'])."</span></small>
        </div>
    </div>


  
    ";}
  }
}
  ?>


  

<script>
 setInterval(()=>{
   $("#questions").load(" #questions");
   refresh();
 },5000);
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ask Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="../process.php">
       	<div class="form-group">
       			<label for="title" class="text">Title : </label><input type="text" class="form-control" name="title" required>
       	</div>
       <div class="form-group">
       			<label for="title" class="text">Description : </label><textarea class="form-control" name="description" required></textarea>
       	</div>
       	<div class="form-group">
       			<label for="title" class="text" >Tag : </label>
       			<input type="text" class="form-control" name="tag">
       	</div>
       
      </div>
      <div class="modal-footer">
      
        <button type="submit" name="questionbtn" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>