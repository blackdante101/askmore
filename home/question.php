<?php 
include('../initialize.php');
include('../time_convert.php');
session_start();
$id=base64_decode(hex2bin($_GET['id']));
$_SESSION['q_id']=$id;

 if(isset($_GET['id'])){
$t="SELECT title FROM questiontbl WHERE id='$id'";
$tres=$con->query($t);
$v="UPDATE questiontbl SET upload_time=upload_time,views = views + 1 WHERE id='$id'";
$views=$con->query($v);

  }
if ($_SESSION['mainpage']!=="True") {
   header('location:../error/index.php');
  
  }
 
?>
<!DOCTYPE html>
<html>
<head>
<title><?php while ($title=$tres->fetch_assoc()) {echo $title['title'];} ?></title>

	<link rel="stylesheet" type="text/css" href="../css/text.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.5.0-dist/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
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
		#leftee{
			position: relative;
			left: 40px;
		}
        #check-color{
            font-size:50px;
            /*color:#2ECC71;*/
            color:gray;
        }
	</style>
</head>
<body id="body">
<nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="index.php">Ask More</a>
   <form class="form-inline mr-sm-5 my-lg-0">
      <input id="Navwidth" class="form-control ml-lg-5 mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn text-white btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto ml-5">

    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
    	<li class="nav-item">
    		
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
           <small id="username">'.stripslashes($row['username']).'</small></div>';
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
<section class="container-fluid">
<div class='container-fluid   bg-light rounded mb-3 p-4 row'>
  <?php 
  $question="SELECT * from questiontbl WHERE id='$id'";
  $ans="SELECT Count(*) from commentstbl  WHERE question_id='$id'";
  $question_res=$con->query($question);
  $answer=$con->query($ans);
  while ($answers=$answer->fetch_assoc()) {
    $a=$answers['Count(*)'];
    
  }
  while($q=$question_res->fetch_assoc()){  
    
      echo "<div style='background-color: #2ECC71; height:100px; width: auto;' class='btn  text-white'>
        <span class='text' style='font-size: 25px;'>".$a."</span>
        <p>Answers</p>
      </div>
      <div style='height:100px; width: auto;' class='btn ml-2 mr-5 text-secondary'>
        <span class='text' style='font-size: 25px;'>".$q['views']."</span>
        <p>Views</p>
      </div>
      <div class='col-md-5'>
        <h4 class='text mt-4'>".$q['title']."</h4>
        
      </div>
      <div id='leftee' class='ml-5 mb-2'>
          <img src='../".$q['u_pic']."' height='35' width='35' style='border-radius:100px;'><small class='ml-2'>".$q['u_name']."<span style='color:#f6e58d;'> &#x25cf;</span><span class='text text-secondary'>".time_elapsed_string($q['upload_time'])."</span></small>
        </div>
      
    </div>
  <div class='container-fluid bg-light p-5'>
      <p style='white-space:pre;'>
         ".htmlspecialchars($q['description'])."  
      </p>
  </div>";
  }?>
  <div class="container-fluid bg-light  ml-2 mt-2 p-3">
  <form action="answer.php" class="row" method="POST" >
    <textarea  style="border:none;height:40px;width:95%;border:1px solid #6c757d;" placeholder="Type Comment" type="text" name="comment" id=""></textarea>
    <Button class="btn btn-secondary" type="submit"><i class="fa fa-send-o"></i></Button>
    </form>
      

    </div>
    <?php
    $c="SELECT * FROM commentstbl WHERE question_id='$id'";
    $cres=$con->query($c);
    while ($comment=$cres->fetch_assoc()) {
      # code...
    echo "
  <div style='background-color:#ffdd59;' class='container-fluid bg-gray row mt-2 ml-1 p-5'>
      <div  class='col-md-1'><button onclick='changecolor();' id='check-color' class='btn'><i class='fa fa-check-square-o' aria-hidden='true'></i></button></div>
      <div class='col-md-8'>
         <p style='white-space:pre;text-align:left;'>
           ".htmlspecialchars($comment['content'])."
         </p>


      </div>
      <div class='col-md-3'>
      <img src='../".$comment['pic']."' height='35' width='35' style='border-radius:100px;'><small class='ml-2'>".$comment['uname']."<span style='color:#f6e58d;'> &#x25cf;</span><span class='text text-secondary'>".time_elapsed_string($comment['comment_time'])."</span></small>
     
      </div>
  </div>";
}

 ?>
</section>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="../bootstrap-4.5.0-dist/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>