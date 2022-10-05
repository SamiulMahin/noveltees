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

<!--Delete Modal -->

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
              <li class="breadcrumb-item active">View Visitors</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Visitors  List:</h3>


              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Email</th>
                    

                  </tr>
                  </thead>

                  <tbody>
                  <tr>
                  <?php 
$sql ="SELECT * from stay_in_loop";
$data = mysqli_query($conn, $sql);
$check_result= mysqli_num_rows($data)> 0;
if($check_result){
  while( $rows = mysqli_fetch_array( $data ) ) 
  {
      ?>
                    <td><?php echo $rows ['id']?></td>
                    <td><?php echo $rows ['email']?></td>


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