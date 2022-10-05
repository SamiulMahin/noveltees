<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}


if(isset($_POST['submit'])){
    $name =$_POST['name'];
    
    $price1 =$_POST['price1'];
    $price2 =$_POST['price2'];
    $type =$_POST['type'];
    
   $image =  $_FILES['file']['name'];
   $status =  $_POST['Stock_status'];
   $tmpname =  $_FILES['file']['tmp_name'];
   $uploc = '../imeges/'.$image;
   $uploadOk=1;
   $imageFileType= strtolower(pathinfo($image,PATHINFO_EXTENSION));
   if(file_exists($uploc)){
       $uploadOk=0;
       $_SESSION['status']="File allready  exist";
       header("Location: ../product_read.php");

   }
   if($imageFileType != 'jpg' && $imageFileType !='png' && $imageFileType !='jpeg' ){
       $uploadOk=0;
       $_SESSION['status']="Only jpg,png and jpeg required";
       header("Location: ../product_read.php");
   }
   if($uploadOk==1){
    $sql= "INSERT INTO products(name,price1,price2,type,image,status) VALUES('$name','$price1','$price2','$type','$image','$status')";
    if(mysqli_query($conn,$sql) == TRUE){
      move_uploaded_file($tmpname,$uploc);
      $_SESSION['status']="Product Added Successfully";
      header("Location: ../product_read.php");
  
    }
    else{
      $_SESSION['status']="Product Adding Failed";
      header("Location: ../product_read.php");
    }
   }
   
 }
   
  

if(isset($_POST['update'])){
    $id =$_POST['id'];
    $name =$_POST['name'];
    
    $price1 =$_POST['price1'];
    $price2 =$_POST['price2'];
    $type =$_POST['type'];
    
   $image =  $_FILES['file']['name'];
   $status =  $_POST['Stock_status'];
   $tmpname =  $_FILES['file']['tmp_name'];
   $uploc = 'imeges/'.$image;
  $sql= "UPDATE products set name='$name',price1='$price1',price2='$price2',type='$type',image='$image',status='$status' where id='$id'";
  if(mysqli_query($conn,$sql) == TRUE){
    move_uploaded_file($tmpname,$uploc);
    $_SESSION['status']="Product Updated Successfully";
    header("Location: ../product_read.php");

  }
  else{
    $_SESSION['status']="Product Adding Failed";
    header("Location: ../product_read.php");
  }
}

if(isset($_POST['delete'])){
  $id =$_POST['d_id'];
  $sql="DELETE from products where id=$id";
  if(mysqli_query($conn,$sql) == TRUE){
    unlink("imeges/".$image);
    $_SESSION['status']="Product Deleted Successfully";
    header("Location: ../product_read.php");

  }
  else{
    $_SESSION['status']="Product Deleting Failed";
    header("Location: ../product_read.php");
  }

}

?>