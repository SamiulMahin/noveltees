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

?>
<?php 
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}

if(isset($_GET['customer_id'])){
    $id=$_GET['customer_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chekout - Noveltees</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <?php 
         $sql ="SELECT id,name,email,address,number from customer  where id='$user_id'";
         $data = mysqli_query($conn, $sql);
         $check_result= mysqli_num_rows($data)> 0;
         if($check_result){
           while( $rows = mysqli_fetch_array( $data ) ) 
           { ?>
    <form class="row g-3" action="config/code_checkout.php" method="POST">
  <div class="col-md-6">
  
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" name="name" value="<?php echo $rows ['name']?>" class="form-control" id="inputEmail4">
    <input type="hidden" name="user_id" value="<?php echo $rows['id'] ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Email</label>
    <input type="email" name="email" value="<?php echo $rows ['email']?>" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" value="<?php echo $rows ['address']?>">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Phone Number</label>
    <input type="text" name="number" class="form-control" value="<?php echo $rows ['number']?>" id="inputCity">
  </div>
  <div class="col-md-6">
  <label for="inputCity" class="form-label">Payment Method</label>
  <select  name ="payment"class="form-select" aria-label="Default select example" required>
  <option selected disabled value="" >Plase choose a payment option</option>
  <option value="Cash on delivery">Cash on delivery</option>
  <option value="Card Payment">Card Payment</option>
  <option value="Paypall">Paypall</option>
</select>
</div>
  <?php 
}}else{
            }
              ?>

  <div class="table-responsive">
    <table class="table table-success table-striped">
      <thead>
        <tr>
          
         
          <th scope="col">Items</th>
          <th scope="col">Image</th>
          <th scope="col">Category</th>
          <th scope="col">Size</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Sub Total</th>
          
        </tr>
      </thead>
      <tbody>
        <tr> 
          <?php 
            $sql ="SELECT * from cart where customer_id='$user_id'";
            $data = mysqli_query($conn, $sql);
            $check_result= mysqli_num_rows($data)> 0;
            if($check_result){
              while( $rows = mysqli_fetch_array( $data ) ) 
              {
          ?>
          
          <td><?php echo $rows ['items']?></td>
          <td><img style="width:20px;" src="Admin/novel-tees_admin/imeges/<?php echo $rows ['image']?>"></td>
          <td><?php echo $rows ['type']?></td>
          <td><?php echo $rows ['size']?></td>
          <td><?php echo $rows ['quantity']?> </td>
          <td>$<?php echo $rows ['price']?></td>
          <td>$<?php echo $sub_total=($rows ['price']*$rows ['quantity']);
               ?>
          </td>

             
        </tr>
           <?php (int)$grand_total  += (int)$sub_total;?>
          <?php     
            }}else{
              ?>
              <div style="font-weight:bold;color:black;"class="alert alert-success" role="alert"><h4>"Cart is now empty" </h4></div>
            <?php 
          }
          ?>

                 <tr >
                 
                    <td colspan="5"></td>
                    <td colspan="">Grand Total</td>
                    <td >$<?php echo number_format( $grand_total)?></td>
                 <input type="hidden" name="total" value="<?php echo (int)$grand_total ?>">
                  </tr>
  </tbody>
</table>
        </div>


        <input type="hidden" name="product_name" value="
        <?php
        $sql ="SELECT * from cart where customer_id='$user_id'";
        $data = mysqli_query($conn, $sql);
        $check_result= mysqli_num_rows($data)> 0;
        if($check_result){
          while( $rows = $product= mysqli_fetch_assoc( $data )) 
          {
             $p_name[] = $product['items'].'('. $product['size'] .')'.'('. $product['quantity'] .')';
            
          
          }
           echo $product_name=implode(',',$p_name);
          }
        ?>
        " >
        <input type="hidden" name="quantity" value="
        <?php 
                        $sql2 ="SELECT sum(quantity) from cart where customer_id='$user_id'";
                        $data1 = mysqli_query($conn, $sql2);
                        $check_result1= mysqli_num_rows($data1)> 0;
                        if($check_result){
                          while( $rows1 = mysqli_fetch_array( $data1 ) ) 
                          {
                            
                            echo $quantity= $rows1['sum(quantity)'];
                              
                          }
                      }         
        ?>
        
        ">
             
           <div class="col-12 d-grid">
    <input name="submit" type="submit" class="btn btn-success" value="Place an order" >
  </div>


  
  <a href="shipping_policy.php">Shipping  Policy</a>
  <a href="return_policy.php">Return Policy</a>
        </form>


    

    </div>
    <div  style="margin-top:200px;">
<?php include 'footer.php' ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>
<?php }?>
</body>
</html>
