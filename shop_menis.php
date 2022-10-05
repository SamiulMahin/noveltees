<?php include 'header.php';?>
<?php 
require 'db_connect.php';
include 'navbar.php';?>
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
    <title>Shop-Noveltees</title>
</head>
<body  style="background-color:black;  font-family: noveltees, sans-serif; 
    font-size:25px;">


<div class="container">
        <div class="row mt-4">
    
<?php 
$sql ="SELECT image,price1,price2 from products where type = 'Manifestretion' ";
$data = mysqli_query($conn, $sql);
$check_result= mysqli_num_rows($data)> 0;
if($check_result){
  while( $rows = mysqli_fetch_array( $data ) ) 
  {
      ?>

            <div class="col-md-4 col-lg-3 col-12">
                <div class="card container" style="width: 14rem;background-color:black; color:white;">
                      <a href="purchase.php"><img style="height:300px;" src="Admin/novel-tees_admin/imeges/<?php echo $rows ['image']?>" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                        <span>$<?php echo $rows ['price1']?></span> - <span>$<?php echo $rows ['price2']?></span>
                           
                            
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>  
</body>
</html>
<?php include 'footer.php';?>