<?php 
session_start();
require 'db_connect.php';
if(!isset($_SESSION ['user_id'])){
    $_SESSION['auth_status']= "You have to login first";
    header("Location: ./log_in.php"); 
  }else{
include 'header.php';
include 'navbar.php';
$user_id=  $_SESSION ['user_id'];
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}
    require('config/code_payment.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment-NovelTees</title>
</head>
<body>
  
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="config/code_payment_submit.php" method="POST">
<div class="table-responsive">
  <table class="table">
  <thead>
        <tr>
          
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Amount</th>
          <th scope="col">Action</th>
        
          
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
       
       $sql ="SELECT * from orders where user_id='$user_id' && payment_status='unpaid'";
       $data = mysqli_query($conn, $sql);
       $check_result= mysqli_num_rows($data)> 0;
       if($check_result){
         while( $rows = mysqli_fetch_array( $data ) ) 
         {
        ?>
            <td><?php echo $rows['id']?></td>
            <td><?php echo $rows['product_name']?></td>
            <td><?php echo $rows['amount']?></td>
            
            <td>           <input type="hidden" name="order_id" value="<?php echo $rows['id']?>">
                    
                    <input type="hidden" name="name" value="<?php echo $rows['product_name']?>">
                    
                    <input type="hidden" name="amount" value="<?php echo $rows['amount']?>">
                   

                  

                </td>
        </tr>
        </form>
      </tbody>
  </table>
</div>
         
                <?php            
            }
        }
     
     ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>
  <?php
  } 
  ?>
</body>
</html>