<?php 
include('auth.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');?>
<?php 

$conn = mysqli_connect('localhost','root','','noveltees');
?>
<html>
<div class="content-wrapper">

<!-- Modal -->
<div class="modal fade" id="ProModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hey there!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
<form action="config/code_size.php" method="POST" enctype="multipart/form-data" style="padding:20px;">
<div class="modal-body">

        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input name="title" type="text"  class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" name="submit" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Delete Modal -->
<div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hey there!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
<form action="config/code_size.php" method="POST" enctype="multipart/form-data" style="padding:20px;">
<div class="modal-body">
            <input type="hidden" name="d_id" class="delete_id">
            <p>
              Are you sure. you want to delete?
            </p>
</div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" name="delete" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <!-- Content Header (Page header) -->
      <!-- Content Header (Page header) -->

      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
            <?php 
              if(isset($_SESSION['status'])){
                echo'<h4>'.$_SESSION['status']. '</h4>';
                unset($_SESSION['status']);
              }
            ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Order List:</h3>

            
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
$sql ="SELECT * FROM orders";
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
          <form action="config/code_order.php" method="POST">
          <td><select name="type" class="form-control" id="exampleFormControlSelect1">
                <option  selected hidden value=""><?php echo $rows ['status']?></option>

                <option value="In Shipping">In Shipping</option>
                <option value="Deliverd">Deliverd</option>

            </select></td>

                    <td>
                    
                        <input type="hidden" name="id" value="<?php echo $rows ['id']?>">
                        
                    <button type="submit" name="update" class="btn btn-primary" >Done</button>
                    </form>    


                  </tr>
                  <?php
    }
}
else{
   die("Can not execute query");
}
?>
</tbody>
</table>

</div>

</div>

</div>

</html>
<?php include('includes/script.php');?>
<script>
  $(document).ready(function(){
    $('.deletebtn').click(function(e){
      e.preventDefault();
      var id =$(this).val();
      // console.log(id);
      $('.delete_id').val(id);
      $('#DeleteModal').modal('show');
    });
  });
</script>
<?php include('includes/footer.php');
?>