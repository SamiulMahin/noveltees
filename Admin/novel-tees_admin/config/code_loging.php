<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}




if(isset($_POST['login'])){
 
  $user_name =$_POST['username'];
  $password =$_POST['password'];
  
  $token =  md5(rand());

$sql= "SELECT * From founder where user_name='$user_name' AND password='$password' LIMIT 1";
$sql1= "UPDATE founder set token='$token' where user_name='$user_name' AND password='$password' LIMIT 1";
$data = mysqli_query($conn, $sql);
$data1 = mysqli_query($conn, $sql1);
$check_result= mysqli_num_rows($data)> 0;
        if($check_result){
        while( $rows = mysqli_fetch_array( $data ) ) 
        {
            
                            $id=$rows ['id'];
                            $name=$rows ['name'];
                            $user_name=$rows ['username'];
                            $password=$rows ['password'];
        }
        $_SESSION['auth']= true;
        $_SESSION['auth_user']= [
            'id'=>$id,
            'name'=>$name,
            'user_name'=>$user_name,
            'password'=>$password


        ];
       $_SESSION['status']="Log In Successfully";
  header("Location: ../index.php");
}
        
        else{
            $_SESSION['status']="Invalid user name or password";
            header("Location: ../log_in.php");
        }
    }
else{
//   $_SESSION['status']="Category updating Failed";
  header("Location: ../log_in.php");
}

if(isset($_POST['logout'])){

  // session_destroy();
  unset($_SESSION['auth']);
  unset($_SESSION['auth_user']);
  $_SESSION['lout_status']="Logged out Successfully";
  header('Location: ../log_in.php');
  exit(0);
}

if(isset($_POST['reset'])){
    
  $email =$_POST['mail'];
  $token =$_POST['token'];
 
  $password =  $_POST['password'];
  $cpassword =  $_POST['cpassword'];

  if($password == $cpassword){
   echo $sql= "UPDATE founder SET password='$password' where token='$token' ";
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