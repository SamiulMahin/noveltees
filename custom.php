<?php
session_start();
require 'db_connect.php';
include 'header.php';?>
<?php include 'navbar.php';?>
<?php 
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Custom-NovelTees</title>
</head>
<body style="background-color:black;font-family: noveltees, sans-serif; 
    font-size:25px;">


<div style="background-position: center;
background-repeat: no-repeat;padding-top:150px;
background-size: cover;" class="MID " >
    <div class="container">

      <div class="row" style="padding-top:100px;padding-bottom:50px; height:100%;">
          <div class="col-md-6 col-12 ">
              <div style="display:flex; justify-content: center;align-items: center;flex-direction: column;text-align:center;background-color:black; border-radius:20px; background-image: url('imeges/Design.jpg'); background-repeat: no-repeat;padding-top:150px;
background-size: cover;align-items:center;height:500px;" >
               
                
              </div>              
          </div>
          <div class="col-md-6 col-12">
             <div style="background-color:#30D5C8;border-radius:10px; opacity: 0.8; font-weight:bold; align-items:center; height:700px;">
              <form class="pt-5 ps-5 pe-5" action="config/custom.php" method="POST" enctype="multipart/form-data" >
                <div class="form-group">
                  <label for="exampleFormControlInput1" class="form-label">Email address</label>
                  <input name="email" style="font-weight:bold;" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>

                </div>

                <div class="form-group">
                  <label for="exampleFormControlInput1" class="form-label">Name</label>
                  <input name="EP" style="font-weight:bold;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1" class="form-label">Short Description</label>
                  <textarea name="SD" style="font-weight:bold;" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1" class="form-label">Expected Quantity</label>
                  <input name="EQ" style="font-weight:bold;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="formFile" class="form-label">Choose file</label>
                  <input name="file" style="font-weight:bold;" class="form-control" type="file" id="formFile" required
                  >
                </div>
                <br>
                <button type="submit" name="submit" style=" font-weight:bold; background:black;color:white; width:250px; border-radius:20px;">Upload your imaginetion</button>
                <br>
                <center><span  style="color:#dc1abe;font-size:40px">Inspired with you in mind</span></center>
                        <?php 
                      if(isset($_SESSION['status'])){
                        ?>
                        <div style="font-weight:bold;color:black;"class="alert alert-success" role="alert"> <?php echo'<h4>'.$_SESSION['status']. '</h4>'?></div>
                        <?php 
                        unset($_SESSION['status']);
                      }
                    ?>
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
