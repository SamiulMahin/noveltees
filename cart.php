<?php 
session_start();
require 'db_connect.php';
include 'header.php';
include 'navbar.php';
$user_id=  $_SESSION ['user_id'];
?>
<?php 
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}
global $grand_total;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cart-Nveltees</title>
</head>
<body>
<div class="container mt-5">

  <div class="table-responsive">
    <table class="table table-success table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Items</th>
          <th scope="col">Image</th>
          <th scope="col">Category</th>
          <th scope="col">Size</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Sub Total</th>
          <th scope="col">Actions</th>
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
          <td><?php echo $rows ['id']?></td>
          <td><?php echo $rows ['items']?></td>
          <td><img style="width:20px;" src="Admin/novel-tees_admin/imeges/<?php echo $rows ['image']?>"></td>
          <td><?php echo $rows ['type']?></td>
          <td><?php echo $rows ['size']?></td>
          <td>
             <form action="config/code_cart.php" method="POST">
             <input type="hidden" name="uq_id" value="<?php echo $rows['id'] ?>">
             <input type="hidden" name="id" value="<?php $user_id ?>">
              <input style="width:50px;" type="number" name="uq" min="1" max="1000" value="<?php echo $rows ['quantity']?>" >
              <input  style="margin-left:5px;"class="btn btn-primary" type="submit" value="Update" name="update"> 
             
          </td>
          <td>$<?php echo $rows ['price']?></td>
          <td>$<?php echo $sub_total=($rows ['price']*$rows ['quantity']);
               ?>
          </td>
          <td>
         
              <input onclick ="return confirm('Are you sure you want to remove item from cart?')" type="submit" name="delete" value="DELETE"  class="btn btn-danger deletebtn" ></td>
              </form> 
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
                 
                    <td colspan="6"><a  href="shop.php"> <button style="width:400px;" class="btn btn-primary">Continue Shopping</button> </a></td>
                    <td colspan="">Grand Total</td>
                    <td>$<?php echo number_format( $grand_total)?></td>
                    <form action="config/code_cart.php" method="POST">
                    <td><input onclick ="return confirm('Are you sure you want to remove all item from cart?')" type="submit" name="delete_all" value="DELETE ALL"  class="btn btn-danger " ></td>
                    </form> 
                  </tr>
  </tbody>
</table>
        </div>
    
      
      <div class="d-grid">
      <a href="checkout.php?customer_id=<?php echo $user_id ?>"  type="button" class="btn btn-secondary <?= ($grand_total>1)?'':'disabled';?>">Proceed to checkout</a>
    </div>
   
    </div>
   
<div  style="margin-top:380px;">
<?php include 'footer.php' ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>


</body>
</html>

                 
                 
