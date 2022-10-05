
<?php 
include('auth.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');?>
<?php 

$conn = mysqli_connect('localhost','root','','noveltees');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <!-- Content Header (Page header) -->
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <form action="config/code_product.php" method="POST" enctype="multipart/form-data" style="padding:20px; width=100px;">


        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input name="name" type="text"  class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Input image</label>
            <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price Start</label>
            <input name="price1" type="text"  class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price End</label>
            <input name="price2" type="text"  class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>

            <select name="type" class="form-control" id="exampleFormControlSelect1">
                <option  selected hidden value="">Choose an option</option>
                <?php 
$sql ="SELECT * from category";
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
            </select>
        </div>
   
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Stock Status</label>
            <select name="Stock_status" class="form-control" id="exampleFormControlSelect1">
                <option  selected hidden value="">Choose an option</option>
                <option value="in_stock">In Stock</option>
                <option value="stock_out">Stock Out</option>
            </select>
        </div>
      
        <a href="product_read.php"><button type="button" class="btn btn-secondary" > View Product</button></a>
        <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
      </div>

      </form>
</div>
</body>
</html>
<?php include('includes/script.php');?>
<?php include('includes/footer.php');
?>