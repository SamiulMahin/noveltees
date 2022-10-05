<?php 
// include 'auth_c.php';
error_reporting(0);
session_start();
require 'db_connect.php';
$user_id=  $_SESSION ['user_id'];
include 'header.php';
include 'navbar.php';
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
    <link rel="stylesheet" href="style.css">
    <title>Order-Noveltees</title>
</head>
<body>


<div class="container mt-5">

  <div class="table-responsive">
    <table class="table table-success table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Address</th>
          <th scope="col">Number</th>
          <th scope="col">Items</th>
          <th scope="col">Quantity</th>
          <th scope="col">Amount</th>
          <th scope="col">Payment Method</th>
          <th scope="col">Payment Status</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr> 
          <?php 
            $sql ="SELECT * from orders where user_id='$user_id'";
            $data = mysqli_query($conn, $sql);
            $check_result= mysqli_num_rows($data)> 0;
            if($check_result){
              while( $rows = mysqli_fetch_array( $data ) ) 
              {
          ?>
          <td><?php echo $rows ['id']?></td>
          <td><?php echo $rows ['customer_name']?></td>
          <td><?php echo $rows ['address']?></td>
          <td><?php echo $rows ['number']?></td>
          <td><?php echo $rows ['product_name']?></td>
          <td><?php echo $rows ['product_quantity']?></td>
          <td><?php echo $rows ['amount']?></td>
          <td><?php echo $rows ['payment_method']?></td>
          <td><?php echo $rows ['payment_status']?></td>
          <td><?php echo $rows ['status']?></td>
          
          <?php
          
          if( $rows ['payment_status'] == 'unpaid' &&  $rows ['payment_method'] == 'Card Payment'){
          ?>
          <td><a class="btn btn-success"  href="payment_card.php?id=<?php echo $rows ['id']?>">Pay Now</a>
            </td>
          <?php
          }
          else if($rows ['payment_status'] == 'unpaid' &&  $rows ['payment_method'] == 'Cash on delivery'){
          ?>
          <td><span>Will be paid</span></td>
          <?php
          }
          else{
          ?>
          <td><span>Paid</span></td>
          <?php
          }
          
          ?>
         
  </tbody>
  <?php
              }
            }
          ?>
   
</table>
        </div>
    
      

    </div>
   
<div  style="margin-top:380px;">
<?php include 'footer.php' ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>


</body>
</html>

                 
                 
 
</body>
</html>