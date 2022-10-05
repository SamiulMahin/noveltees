<?php 
session_start();
require 'db_connect.php';
if(!isset($_SESSION ['user_id'])){
    $_SESSION['auth_status']= "You have to login first";
    header("Location: ./log_in.php"); 
  }else{
include 'header.php';
include 'navbar.php';
$id=$_GET['id'];

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
    <link rel="stylesheet" href="style.css">
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
       
       $sql ="SELECT * from orders where user_id='$user_id' && payment_status='unpaid' && payment_method='Card Payment'  or id='$id' && user_id='$user_id' && payment_status='unpaid' && payment_method='Card Payment'  ";
       $data = mysqli_query($conn, $sql);
       $check_result= mysqli_num_rows($data)> 0;
       if($check_result){
         while( $rows = mysqli_fetch_array( $data ) ) 
         {
        ?>
            <td><?php echo $rows['id']?></td>
            <td><?php echo $rows['product_name']?></td>
            <td><?php echo $rows['amount']?></td>
            
            <td>           
            <?php if(!isset($id)){ ?>  
            <input type="hidden" name="order_id" value="<?php echo $rows['id']?>">
                <?php } else{ ?>
                  <input type="hidden" name="order_id" value="<?php echo $id?>">
                  <?php }?>    
                    <input type="hidden" name="name" value="<?php echo $rows['product_name']?>">
                    
                    <input type="hidden" name="amount" value="<?php echo $rows['amount']?>">

                    <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="<?php echo $publishKey ?>"
                    data-amount="<?php echo $rows['amount']*100 ?>"
                    data-name="NovelTees"
                    data-description="<?php echo $rows['customer_name'] ?>"
                    
                    data-image="imeges/logo.png"
                    data-currency="USD"></script>
                </td>


        </tr>
        </form>
      </tbody>
      <?php            
            }
        }
     
     ?>
  </table>


  
</div>
         

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

<?php include 'footer.php' ?>