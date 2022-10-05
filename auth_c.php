<?php
session_start();
if(!isset($_SESSION['auth_c'])){

    $_SESSION['auth_status']= "You have to login first";
    header('location: log_in.php');
    exit(0);
}

?>