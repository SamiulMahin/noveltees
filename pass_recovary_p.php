<?php
session_start();
include('header.php');
require 'db_connect.php';
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
    <title>Forget Password- Noveltees</title>
</head>
<body  style="background-color:#30d5c8;">
<div   style=" margin-top:100px; ">
        <div class="container" >
        <?php 
                            if(isset($_SESSION['status'])){
                              ?>
                              <div class="alert alert-success" role="alert"> <?php echo'<h4>'.$_SESSION['status']. '</h4>'?></div>
                              <?php 
                              unset($_SESSION['status']);
                              }
                            ?>
 
        <div class="row" >
            <div class="col-md-12 col-12">
          <div class="bg-gradient text-dark bg-opacity-10"style="display:flex; align-items: center; justify-content:center; height:700px;">
                          <form action="config/code_reset.php" method="POST">
                            <center><a href="index.php"><img  style="height:120px; width:150px; border-radius:15px;" src="imeges/logo.png" alt=""></a></center>
                            <div class="form-group">
                              <label for="" class="form-label text-white">Email</label>
                              <input type="email" class="form-control" name="email">
                            </div>
                            
    
                          <button type="submit" name="submit" class="btn " style="width:300px; background-color:black;color:white;">Send a reset  link</button><br><br>
                        
                        </form>  
                    </div>
                    
                </div> 
              </div>
            </div>
        </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>
</body>
</html>