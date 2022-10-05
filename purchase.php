<?php 
session_start();
require 'db_connect.php';
include 'header.php';
include 'navbar.php';
$user_id=  $_SESSION ['user_id'];
?>
<?php
$id = $_GET["id"];
?>
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
    <title>Purchase-Noveltees</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style=" background:black;white;font-family: noveltees, sans-serif; 
    font-size:25px;">
    <div class="container">
            <?php 
            $sql ="SELECT * from products where id='$id'";
            $data = mysqli_query($conn, $sql);
            $check_result= mysqli_num_rows($data)> 0;
            if($check_result){
            while( $rows = mysqli_fetch_array( $data ) ) 
            {
            ?>

        <div class="row mt-5">
            
            <div class="col-md-6 col-12">
            <form action="config/code_cart.php" method="POST" enctype="multipart/form-data">
              <img name="file" style="width:100%;" src="Admin/novel-tees_admin/imeges/<?php echo $rows ['image']?>" alt="">
              <input name="image" type="hidden" value="<?php echo $rows ['image']?>" >

          </div>
          <div class="col-md-4 col-12" style="text-align:center;color:white; padding-top:90px;align-items:center;">
          <strong><h1>About the product</h1></strong> 
              <strong>
                  <p name="name">Product name:<?php echo $rows ['name']?></p>
                  <input name="name"type="hidden" value="<?php echo $rows ['name']?>" >
                  <input name="id"type="hidden" value="<?php echo $rows ['id']?>" >
                  <input name="c_id"type="hidden" value="<?php echo $user_id?>" >
                  <span name="price1"> Price:$<?php echo $rows ['price1']?></span>-$<span><?php echo $rows ['price2']?></span>
                  <input name="price1" type="hidden" value="<?php echo $rows ['price1']?>" >
                  <p name="cat">Category:<?php echo $rows ['type']?></p>
                  <input name="cat" type="hidden" value="<?php echo $rows ['type']?>" >
                  <p><?php echo $rows ['status']?></p>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1" >Size:</label>
                    <center><select  style="font-weight:bold; font-size:20px;width:50%;" name="size" class="form-control" id="exampleFormControlSelect1" required>
                        <option  selected hidden value="">Choose a size</option>
                        <?php 
                            $sql ="SELECT * from size";
                            $data = mysqli_query($conn, $sql);
                            $check_result= mysqli_num_rows($data)> 0;
                            if($check_result){
                            while( $rows = mysqli_fetch_array( $data ) ) 
                            {
                                ?>
                                            <option value="<?php echo $rows ['title']?>"><?php echo $rows ['title']?></option>
                                            <?php
                                }
                            }
                            else{
                            die("Can not execute query");
                            }
                            ?>
                    </select></center>
                </div>
              </strong>
         
              <button type="submit" name="submit" style=" font-weight:bold; background:#30d5c8;color:black; width:250px; border-radius:20px;">Add to Cart</button>
              </form>
          </div>
           
        </div>
    </div>
    <?php
    }
}
else{
   die("Can not execute query");
}
?>	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>  
</body>
</html>
<?php include 'footer.php';?>