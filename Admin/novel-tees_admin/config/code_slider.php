<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}


if(isset($_POST['submit'])){
    $name =$_POST['name'];
    $image =  $_FILES['file']['name'];
    $tmpname =  $_FILES['file']['tmp_name'];
   $uploc = '../imeges/'.$image;
   
   $uploadOk=1;
   $imageFileType= strtolower(pathinfo($image,PATHINFO_EXTENSION));
   if(file_exists($uploc)){
       $uploadOk=0;
       $_SESSION['status']="File allready  exist";
       header("Location: ../slider_read.php");

   }
   if($imageFileType != 'jpg' && $imageFileType !='png' && $imageFileType !='jpeg' ){
       $uploadOk=0;
       $_SESSION['status']="Only jpg,png and jpeg required";
       header("Location: ../slider_read.php");
   }
   if($uploadOk==1){
    $sql= "INSERT INTO slider(name,image) VALUES('$name','$image')";
    if(mysqli_query($conn,$sql) == TRUE){
      move_uploaded_file($tmpname,$uploc);
      $_SESSION['status']="Slider Added Successfully";
      header("Location: ../slider_read.php");
  
    }
    else{
      $_SESSION['status']="Slider Adding Failed";
      header("Location: ../slider_read.php");
    }
   }



   if(isset($_POST['delete'])){
    echo $id =$_POST['d_id'];

    // $sql1="SELECT image from slider where id=$id";
    // $data = mysqli_query($conn, $sql1);
    // $rows = mysqli_fetch_array( $data );
    // $image=  $rows ['image'];
    $sql="DELETE from slider where id=$id";
    if(mysqli_query($conn,$sql) == TRUE){
      unlink("imeges/".$image);
      $_SESSION['status']="Slider Deleted Successfully";
      header("Location: ../slider_read.php");
  
    }
    else{
      $_SESSION['status']="Slider Deleting Failed";
      header("Location: ../slider_read.php");
    }
  
  }
   
 }