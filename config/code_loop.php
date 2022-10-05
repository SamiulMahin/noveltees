<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}


if(isset($_POST['submit'])){
    $email =$_POST['email'];
    
  $sql= "INSERT INTO stay_in_loop(email) VALUES('$email')";
  if(mysqli_query($conn,$sql) == TRUE){
   
    $_SESSION['status']="Thanks for stay with us";
    header("Location: ../index.php");

  }
  else{
    $_SESSION['status']="Category Adding Failed";
    header("Location: ../index.php");
  }
}




?>