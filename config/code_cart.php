<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}

if(isset($_POST['submit'])){
  $items =$_POST['name'];
    $p_id =$_POST['id'];
    $customer_id =$_POST['c_id'];
    $price =$_POST['price1'];
    $quantity =1;
    $type =$_POST['cat'];
    $size =$_POST['size'];
    $image =  $_POST['image'];
    if(!isset($_SESSION ['user_id'])){
      $_SESSION['auth_status']= "You have to login first";
      header("Location: ../log_in.php"); 
    }
   
    else{
      
    $cart_sql= mysqli_query($conn,"SELECT * from cart where items='$items' && p_id='$p_id' && size='$size' && customer_id='$customer_id'");
    if(mysqli_num_rows($cart_sql)>0){
        $_SESSION['status']="Product already added in cart";
        header("Location: ../shop.php");  
    }
    else{
        $sql= "INSERT INTO cart(items,customer_id,p_id,image,quantity,price,type,size) VALUES('$items','$customer_id ','$p_id','$image','$quantity','$price','$type','$size')";
        if(mysqli_query($conn,$sql) == TRUE){
          move_uploaded_file($tmpname,$uploc);
          $_SESSION['status']="Product successfully added in cart";
          header("Location: ../shop.php");
      
        }
        else{
          $_SESSION['status']="Product Adding Failed";
          header("Location: ../shop.php");
        }
    }
    }
    
    }
    

   
if(isset($_POST['update'])){
  $id =$_POST['uq_id'];
  $quantity =$_POST['uq'];
$sql= "UPDATE cart set quantity='$quantity' where id='$id'";
if(mysqli_query($conn,$sql) == TRUE){
  move_uploaded_file($tmpname,$uploc);
  $_SESSION['status']="Cart Updated Successfully";
  header("Location: ../cart.php");

}
else{
  $_SESSION['status']="Product Adding Failed";
  header("Location: ../cart.php");
}
}

if(isset($_POST['delete'])){
  $id =$_POST['uq_id'];
  $sql="DELETE from cart where id=$id";
  if(mysqli_query($conn,$sql) == TRUE){
    unlink("imeges/".$image);
    $_SESSION['status']="Product Deleted Successfully";
    header("Location: ../cart.php");

  }
  else{
    $_SESSION['status']="Product Deleting Failed";
    header("Location: ../cart.php");
  }

}
    
if(isset($_POST['delete_all'])){
  
  $sql="DELETE from cart ";
  if(mysqli_query($conn,$sql) == TRUE){
    $_SESSION['status']="You Cart is empty now";
    header("Location: ../cart.php");

  }
  else{
    $_SESSION['status']="Product Deleting Failed";
    header("Location: ../cart.php");
  }

}
       




?>