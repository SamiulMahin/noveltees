<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}
    require('code_payment.php');
    if(isset($_POST)){
        $token=$_POST['stripeToken'];
         $order_id= $_POST['order_id'];
         $name= $_POST['name'];
         $amount= $_POST['amount'];
         $status= "Paid";


 
  $sql="INSERT INTO payment(order_id,description,amount,status) VALUES('$order_id','$name ','$amount','$status') ";
  if(mysqli_query($conn,$sql) == TRUE){
    
    $sql1="UPDATE orders set  payment_status='$status' where id='$order_id' "; 
        
    mysqli_query($conn,$sql1);         
    $_SESSION['status']="payment Successfull";
        $data= \Stripe\Charge::create(array(
             "amount"=>$amount*100,
             "currency"=>"USD",
             "source"=> $token,
     
        ));
        header("Location: ../index.php");

    }
    }

?>