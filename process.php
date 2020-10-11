<?php
session_start();
include('initialize.php');
/// Logining To The Website
if (isset($_POST['login'])) {
$uname=mysqli_real_escape_string($con,$_POST['uname']);
$pass=mysqli_real_escape_string($con,$_POST['pass']);
$sql="SELECT * FROM usertbl WHERE username='$uname' AND pass='$pass'";
$result=$con->query($sql);
if ($result->num_rows == 1) {
$_SESSION['username']=$uname;
$_SESSION['mainpage']="True";
header('location:home/');

}
else{
	header('location:index.php?t=invalidInfo');
}
}

///Registering An Account
if (isset($_POST['register'])){
	$uname=mysqli_real_escape_string($con,$_POST['uname']);
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $dob=$_POST['dob'];
    if (strlen($uname)> 10 OR strlen($uname) < 3){
        header('location:register/index.php?n=inval');
    }
    else{
   
    $sql1="SELECT * FROM usertbl WHERE username='$uname'";
 
    $result=$con->query($sql1);
   

    if ($result->num_rows > 0) {
    	
    	header('location:register/index.php?t=alreadyregistered');
    	
    }
   
     else {
 $sql2="INSERT INTO usertbl (pic,fname,lname,dob,username,pass) VALUES ('upload/profile.png','$fname','$lname','$dob','$uname','$pass')";
  $result2=$con->query($sql2);
        if ($result2 ==TRUE) {
     	
     	header('location:/askmore/index.php?s=success');
     	
     }}

   
}
}
///Asking A Question

if (isset($_POST['questionbtn'])) {
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $descrip=mysqli_real_escape_string($con,$_POST['description']);
    $date = date('Y/m/d H:i:s');
    $tag = $_POST['tag'];
    $session=$_SESSION['username'];
    $u_details="SELECT username,pic FROM usertbl WHERE username='$session'";
    $details_res=$con->query($u_details);
    $tag_res=$con->query($tag);
    while ($row1=$details_res->fetch_assoc()) {
        $pic=$row1['pic'];
        $user=$row1['username'];

    }
        if(strlen($title)< 8 || strlen($descrip)<15){
		header("location:home/index.php?t=inval");
	}
	else{
		$question_insert="INSERT INTO questiontbl(title,description,tag1,upload_time,u_pic,u_name,upvote,views) VALUES ('$title','$descrip','$tag','$date','$pic','$user','0','0')";
    $question_res=$con->query($question_insert);
    if ($question_res == TRUE) {
        $_SESSION['main'] == "TRUE";
        header("location:home/index.php?s=upload_success");
    }
    else{
        echo "an error occured";
    }
	}
}

/// Editing Account Details
      
    if (isset($_POST['edit'])) {
        $edit_fname=mysqli_real_escape_string($con,$_POST['edit_fname']);
        $files=$_FILES['image'];
        $edit_lname=mysqli_real_escape_string($con,$_POST['edit_lname']);
        $edit_uname=mysqli_real_escape_string($con,$_POST['edit_uname']);
        $edit_dob=mysqli_real_escape_string($con,$_POST['edit_dob']);
        $edit_pass=mysqli_real_escape_string($con,$_POST['edit_pwd']);
        $id=$_SESSION['id'];
         $fileName=$_FILES['image']['name'];
    $fileError=$_FILES['image']['error'];
    $fileTmp=$_FILES['image']['tmp_name'];
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if ($fileError === 0) {
            $fileNameNew=uniqid('',true).".".$fileActualExt;
            $fileDestination='upload/profile/'.$fileNameNew;
            move_uploaded_file($fileTmp,$fileDestination);
         $edit_sql="UPDATE usertbl SET pic='$fileDestination',username='$edit_uname',fname='$edit_fname',lname='$edit_lname',dob='$edit_dob',pass='$edit_pass' WHERE id='$id'";
       $edit_res=$con->query($edit_sql);
        if($edit_res==TRUE){
      $_SESSION['username']=stripslashes($edit_uname);
          header('location:home/edit.php?t=success');
   
}else{
           echo"<script>OOps 😢😢 ! Info Not Submitted</script>" ;
        }
           
        }else{
             header('location:home/edit.php?f1=error_file');
           
        }
    }
    else{
         header('location:home/edit.php?f2=error_file');
    }
    
      
      
   }


  
?>