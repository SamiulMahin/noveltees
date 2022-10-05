<?php 
session_start();
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

function send_reset_code($name,$email,$token){

  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPAuth   = true;                                          //Send using SMTP
  $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
                                    //Enable SMTP authentication
  $mail->Username   = 'novelteesssw@gmail.com';                     //SMTP username
  $mail->Password   = 'kmnxkixkzmgnwkqu';                               //SMTP password
  $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
  $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom("novelteesssw@gmail.com","NovelTees");
  $mail->addAddress($email);     //Add a recipient
                //Name is optional
     $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset password Notification';
    $email_template= "
    <h2>Hello</h2>
    <h3>You are receiving a reset link!</h3><br><br>
    <a href='http://localhost/noveltees/Admin/novel-tees_admin/passport_change.php?token=$token&email=$email'>Click me</a>
    ";
    $mail->Body =$email_template;
    $mail->send();

}

if(isset($_POST['submit'])){
    echo $email=$_POST['email'];
    $token=md5(rand());
    $sql= "SELECT email,name FROM  founder where email='$email'";
    $check = mysqli_query($conn,$sql);
  if( mysqli_num_rows($check) > 0){
    $rows =mysqli_fetch_array($check);
    $name=$rows['name'] ;
    $email=$rows['email'] ;
    $update_token= "UPDATE founder SET token='$token' where email='$email'";
    $update_token_run = mysqli_query($conn,$update_token);
    if($update_token_run){
      send_reset_code($name,$email,$token);
    $_SESSION['status']="A reset link has sent in your mail.Thanks for stay with us";
    header("Location: ../log_in.php");
    }
  }
  else{
    $_SESSION['status']="Your Email is not exist";
    header("Location: ../pass_recovary_p.php");
    exit(0);
  }
}

?>