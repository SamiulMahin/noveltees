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

<?php
if(isset($_POST['search'])){
   echo $key=$_POST['inp'];
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



<!-- Search Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content " style="width: 500px;height:250px;background-color:#30D5C8;">
      
      <div class="modal-body" >
        <br><br>
      <center>
        <form action="serach_result.php" method="POST">
        <div class="input-group mb-3" style="width:300px;">
        <input name="inp" type="text" class="form-control fw-bold fs-3" placeholder="Search Products" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-dark" type="submit" name="search" id="button-addon2"><i class="fas fa-search"></i></button>

        </form>
      
      </div>
      </center>
      </div>
    
    </div>
  </div>
</div> 





<div class="container">
        <div class="row mt-4">
        <?php
        if(isset($_SESSION['status'])){
                        ?>
                        <div style="font-weight:bold;color:black;"class="alert alert-success" role="alert"> <?php echo'<h4>'.$_SESSION['status']. '</h4>'?></div>
                        <?php 
                        unset($_SESSION['status']);
                      }
                    ?>
<?php 
$sql ="SELECT id,image,price1,price2 from products WHERE name like '%$key%' OR name like '$key%' OR name like '%$key' OR type like '%$key%' OR type like '$key%' OR type like '%$key'";
$data = mysqli_query($conn, $sql);
$check_result= mysqli_num_rows($data)> 0;
if($check_result){
  while( $rows = mysqli_fetch_array( $data ) ) 
  {
      ?>

            <div class="col-md-4 col-lg-3 col-12">
                <div class="card container" style="width: 18rem;background-color:black; color:white;">
                      <a href="purchase.php?id=<?php echo $rows ['id']?>"><img style="height:300px; width:16rem;" src="Admin/novel-tees_admin/imeges/<?php echo $rows ['image']?>" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                        <span>$<?php echo $rows ['price1']?></span> - <span>$<?php echo $rows ['price2']?></span>
                           
                            
                        </div>
                </div>
            </div>

<?php
    }
}
else{
    ?>	
   <div style="Height:500px;">
   <h1  style="color:white;font-size:35px;">Products not found.</h1>
   <h1 style="color:white;font-size:35px;">Please try again !</h1>
   </div>
   <?php
}
?>		
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>

</body>
</html>
<?php include 'footer.php';?>