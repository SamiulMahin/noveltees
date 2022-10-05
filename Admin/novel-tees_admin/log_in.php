<?php
session_start();
include('includes/header.php');
if(isset ($_SESSION['auth']))
{
    $_SESSION['status']="Already Logged In";
    header("Location: ./index.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body  style="background-color:#30d5c8;">

    <div   style=" margin-top:100px; ">
        <div class="container" >
        <?php 
              if(isset($_SESSION['auth_status'])){
                ?>
                <div class="alert alert-success" role="alert"> <?php echo'<h4>'.$_SESSION['auth_status']. '</h4>'?></div>
                <?php 
                unset($_SESSION['auth_status']);
              }
            ?>
  <?php 
              if(isset($_SESSION['lout_status'])){
                ?>
                <div class="alert alert-success" role="alert"> <?php echo'<h4>'.$_SESSION['lout_status']. '</h4>'?></div>
                <?php 
                unset($_SESSION['lout_status']);
              }
            ?>
                <div class="row" >
                <div class="col-md-12 col-12">
          <div class="bg-success bg-gradient text-dark bg-opacity-10" style="display:flex; align-items: center; justify-content:center; height:700px;">
                          <form action="config/code_loging.php" method="POST">
                            <center><img  style="height:120px; width:150px; border-radius:15px;" src="imeges/logo.png" alt=""></center>
                            <div class="form-group">
                              <label for="name" class="form-label text-white">Username</label>
                              <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                              <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                              <a style="color:white; text-decoration:none;" href="pass_recovary_p.php">Forget password</a>
                            </div>
                            <?php 
                            if(isset($_SESSION['status'])){
                              ?>
                              <div class="alert alert-success" role="alert"> <?php echo'<h4>'.$_SESSION['status']. '</h4>'?></div>
                              <?php 
                              unset($_SESSION['status']);
                              }
                            ?>
                          <button type="submit" name="login"class="btn " style="width:300px; background-color:black;color:white;">LogIn</button>
                        </form>  
                      </div>
                    </div> 
              </div>
            </div>
        </div>
</body>
</html>
<?php  include('includes/script.php');?>