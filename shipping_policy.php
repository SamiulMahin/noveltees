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
    <title>Return Policy - NovelTees</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Shipping Policy</h3>
<br><br>
        <h5>Novel-Tees Customs is growing at an alarming rate but due to complications regarding the COVID-19 virus, orders may take 7-14 business days to process and ship with an additional 7-21 days for international shipping.</h5>
<br><br>

        <h5>This policy begins 24 hours after the order has been placed on our website.</h5>
        <br><br>
        <h5>It is the customers responsibility to provide the correct mailing address before submitting the order, Novel-Tees Customs WILL NOT BE HELD LIABLE for shipping discrepancies that includes stolen, misplaced, lost or shipping address that was entered wrong on our website.</h5>
<br><br>
        <h5>Questions or comments?<br><br> Contact us at Info@NovelTeesCustoms.Com</h5>
</div>
    <div  style="margin-top:150px;">

<?php include 'footer.php' ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>
<?php }?>
</body>
</html>
