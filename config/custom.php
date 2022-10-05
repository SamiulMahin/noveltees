<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}


if(isset($_POST['submit'])){
    $email =$_POST['email'];
    $des =$_POST['SD'];
    $quantity =$_POST['EQ'];
    $price =$_POST['EP'];
    $image =  $_FILES['file']['name'];
    $tmpname =  $_FILES['file']['tmp_name'];
    $uploc = '../Admin/imeges/'.$image;
    $uploadOk=1;
    $imageFileType= strtolower(pathinfo($image,PATHINFO_EXTENSION));
    if(file_exists($uploc)){
        $uploadOk=0;
        $_SESSION['status']="File allready  exist";
        header("Location: ../custom.php");

    }
    if($imageFileType != 'jpg' && $imageFileType !='png' && $imageFileType !='jpeg' ){
        $uploadOk=0;
        $_SESSION['status']="Only jpg,png and jpeg required";
        header("Location: ../custom.php");
    }
    if($uploadOk==1){
        $sql= "INSERT INTO custom(email,des,price,quantity,image) VALUES('$email','$des','$price','$quantity','$image')";
    if(mysqli_query($conn,$sql) == TRUE){
      move_uploaded_file($tmpname,$uploc);
      $_SESSION['status']="Thanks for being with us! we will connect you by mail";
      header("Location: ../custom.php");
  
    }
    else{
      $_SESSION['status']="Product Adding Failed";
      header("Location: ../custom.php");
    }
    }
    
  }




?>