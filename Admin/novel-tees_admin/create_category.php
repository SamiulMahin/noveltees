
<?php 
include('auth.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');

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
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <form action="config/code_category.php" method="POST" enctype="multipart/form-data" style="padding:20px; width=100px;">


        <div class="form-group">
            <label for="exampleFormControlInput1">Category Title</label>
            <input name="title" type="text"  class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
  

      
        <a href="category_read.php"><button type="button" class="btn btn-secondary" >View Category</button></a>
        <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
      </div>
      </form>
</div>
</body>
</html>
<?php include('includes/script.php');?>
<?php include('includes/footer.php');
?>