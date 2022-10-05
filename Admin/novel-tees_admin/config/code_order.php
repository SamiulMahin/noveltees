<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}




if(isset($_POST['update'])){
  $id =$_POST['id'];
  $type =$_POST['type'];
  
  

$sql= "UPDATE orders set status='$type' where id='$id'";
if(mysqli_query($conn,$sql) == TRUE){
 
//   $_SESSION['status']=" Updated Successfully";
  header("Location: ../orders_read.php");

}
else{
//   $_SESSION['status']="Category updating Failed";
  header("Location: ../orders_read.php");
}
}


?>