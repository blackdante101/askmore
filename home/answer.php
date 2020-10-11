<?php 
session_start();
include("../initialize.php");
$name=$_SESSION['username'];
$sql="SELECT username,pic from usertbl WHERE username='$name'";
$result=$con->query($sql);
while ($row=$result->fetch_assoc()) {

	
 $pic=$row['pic'];
 $user=$row['username'];
}
$comment=addslashes($_POST['comment']);
$date=date('Y/m/d H:i:s');

$q_id=$_SESSION['q_id'];
if(isset($_POST['comment'])){
$sql2="INSERT INTO commentstbl(question_id,pic,uname,comment_time,correct,content) VALUES ('$q_id','$pic','$user','$date','0','$comment')";
$res=$con->query($sql2);
if ($res === TRUE) {
   header('location:question.php?id='.bin2hex(base64_encode($q_id)).'');
}
}
?>