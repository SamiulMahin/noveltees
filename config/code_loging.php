<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}




if(isset($_POST['login'])){
 
  $username =$_POST['username'];
  $password =$_POST['password'];
  
  

$sql= "SELECT * From customer where username='$username' AND password='$password' LIMIT 1";
$data = mysqli_query($conn, $sql);
$check_result= mysqli_num_rows($data)> 0;
        if($check_result){
        $rows = mysqli_fetch_array($data);
        $_SESSION ['user_id']= $rows ['id'];
        $_SESSION['status']= "Logged in  successfully";
        header('Location: ../index.php');
        
      }
      else{
        $_SESSION['status']= "incorrect password";
        header('Location: ../log_in.php');
      }
    }

if(isset($_GET['logout'])){

  
  unset($user_id);
  $_SESSION['lout_status']="Logged out Successfully";
  session_destroy();
  
  
 
  header('Location: ../log_in.php');
  exit(0);
}

if(isset($_POST['register'])){
   
  $name =$_POST['name'];
  $email =$_POST['email'];
  $address =$_POST['address'];

  $number =$_POST['number'];
  $username =$_POST['username'];
  $password =  $_POST['password'];
  $cpassword =  $_POST['cpassword'];
  
  $same_email= mysqli_num_rows(mysqli_query($conn,"SELECT email From customer where email ='$email' limit 1"));
  $same_username= mysqli_num_rows(mysqli_query($conn,"SELECT username From customer where username ='$username' limit 1"));
  $token =  md5(rand());
  if($password == $cpassword  &&  $same_email== 0 && $same_username == 0 ){
    $sql= "INSERT INTO customer(name,email,address,number,username,password,token) VALUES('$name','$email','$address','$number','$username','$password','$token')";
    if(mysqli_query($conn,$sql) == TRUE){
      
      $_SESSION['status']="Successfully registered";
      header("Location: ../log_in.php");
  
    }
  }
   else if($same_email>0 ){
    $_SESSION['status']="Email is already exist";
      
      header("Location: ../log_in.php");
    }
    else if($same_username>0 ){
      $_SESSION['status']=" Username already  exist ";
      header("Location: ../log_in.php");
    }
    else{
      $_SESSION['status']="Passwords are not mathched ";
      header("Location: ../log_in.php");
    }
  }

  if(isset($_POST['reset'])){
    
    $email =$_POST['mail'];
    $token =$_POST['token'];
   
    $password =  $_POST['password'];
    $cpassword =  $_POST['cpassword'];

    if($password == $cpassword){
     echo $sql= "UPDATE customer SET password='$password' where token='$token' ";
      if(mysqli_query($conn,$sql) == TRUE){
        
        $_SESSION['status']="Successfully Changed";
        header("Location: ../log_in.php");
    
      }
    }

      else{
        $_SESSION['status']="Passwords are not mathched ";
        header("Location: ../passport_change.php");
      }
  }

  
  

  
?>
