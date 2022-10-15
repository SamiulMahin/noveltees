
<?php include 'header.php';
require 'db_connect.php';?>
<?php include 'navbar.php';?>
<?php require_once 'db_connect.php';?>
<?php
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
    echo mysqli_connect_error();
}
if(isset($_POST['submit'])){
    $name =$_POST['name'];
    
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $msg =$_POST['msg'];
    

  $sql= "INSERT INTO massage(name,email,phone,massage) VALUES('$name','$email','$phone','$msg')";
  if(mysqli_query($conn,$sql) == TRUE){
    
    $_SESSION['status']="Thank you for being with us!";

  }
  else{
    echo "Data not inserted";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Us</title>
</head>
<body style="background:black" >
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-12">
      <h1 style="color:white;margin-top:150px;font-family: noveltees, sans-serif; " >We love referrals!</h1>
    <form   style="margin-top:50px;color:white; align-items:center;" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" enctype="multipart/form-data">
    
    
                <div class="form-floating ">
              <input type="text" name="name" class="form-control mt-5" style="background:black;color:white;width:70%;" id="floatingInput" placeholder="Name">
              <label class="fs-4 fw-bold" for="floatingInput"style="font-family: noveltees, sans-serif; ">Name</label>
            </div>
            <div class="form-floating">
              <input type="email" name="email" class="form-control mt-2" style="background:black;color:white;width:70%;" id="floatingPassword" placeholder="Email*">
              <label class="fs-4 fw-bold" for="floatingInput"style="font-family: noveltees, sans-serif; ">Email</label>
            </div>
            <div class="form-floating">
              <input type="phone" name="phone" class="form-control mt-2" style="background:black;color:white;width:70%;" id="floatingPassword" placeholder="Phone">
              <label class="fs-4 fw-bold" for="floatingInput"style="font-family: noveltees, sans-serif; ">Phone</label>
            </div>
            <div class="form-floating">
              <textarea class="form-control mt-2" style="background:black;color:white;width:70%;" placeholder="Leave a massage" id="floatingTextarea" name="msg" rows="3"></textarea>
              <label class="fs-4 fw-bold" for="floatingTextarea"style="font-family: noveltees, sans-serif; ">Message</label>
            </div>
            <input class="mt-5" type="submit" name="submit" style="height:40px;width:150px;  font-weight:bold; border-radius:50px;background:#30D5C8; color:black;">
                
    </form>
      </div>
    </div>
  </div>

  <?php 
              if(isset($_SESSION['status'])){
                ?>

                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                  <script>
                      Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: '<?php echo $_SESSION['status'] ?>',
                      showConfirmButton: false,
                      timer:2500
                    })
                 </script>
                <?php 
                unset($_SESSION['status']);
              }
            ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>
</body>
</html>
<?php include 'footer.php';?>