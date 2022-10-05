<?php
    require ('stripe-php-master/init.php');
   $publishKey="pk_test_51LcL9EKtEeVxwaLPjd4Quq4TVpCabINK78VKXm1NowrGl9zzTuSjqDOooNxomTZJovJKqCGVNueBk82RnURbCbNu002H3TGhl5";
   $secretKey="sk_test_51LcL9EKtEeVxwaLPuBtNYjv4JthVJlfIaleIlbiuBaYnGocY8H7aErA0P2zlap9vvD8LYkzcvRJ8Ig2OkHO6G8xx00pmXS2fcC";
   \Stripe\Stripe::setApiKey($secretKey);
?>