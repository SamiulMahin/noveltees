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
        <h3>Return Policy</h3>
<br><br>
        <h5>Novel-Tees Customs will honor and replace items that were damaged upon receipt, which may include mis-prints, tears and holes. We also will honor if an incorrect size has been issued, but the customer is responsible for shipping back to our production warehouse, absolutely NO EXCEPTIONS. Novel-Tees Customs will cover shipping cost back to you.</h5>
<br><br>

        <h5>Because of COVID-19, Novel-Tees can NOT offer any refunds, ONLY store credit or exchanges in the same size and same slogan shirt as the purchase items. Customer only have 5 business days from the date of package receipt to notify Novel-Tees Customs of exchange or store credit.</h5>

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
