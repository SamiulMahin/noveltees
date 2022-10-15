<?php   include 'header.php';?>

<div style="background-color:black;font-family: noveltees, sans-serif; 
    font-size:25px;">
<div class="container" style="padding-top:50px;">
    <div class="row" >
        <div class="col-12 col-md-8">
        <h3 style="color:#30D5C8;">novelteescustoms.com
</h3>
        <strong><a style="text-decoration: none; color:white;" href="meet_the_founder.php"><span> MEET THE BAWSE</span></a></strong>
       <strong><a style="padding-left:20px;text-decoration: none; color:white;" href="shop.php"><span > Shop All</span></a></strong>
       <strong> <a style="padding-left:20px;text-decoration: none; color:white;" href=""><span style=""> Contact Us</span></a></strong>
       <h5 style="color:#30D5C8;font-size:25px;font-weight: bold;">Inspired with you in mind</h5>
       
       <strong><a style="text-decoration: none; color:white;" href="shipping_policy.php"><span> SHIPPING POLICY</span></a></strong>
       <br>
       <strong><a style="text-decoration: none; color:white;" href="return_policy.php"><span> RETURN POLICY</span></a></strong>
       <br>
            <form action="config/code_loop.php" method="POST">
            <div class="input-group mb-3" style="width:50%">
            <input name="email" style="background-color:black; color:white;font-size:15px;font-weight: bold;" type="text" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-light rounded-end" style="font-size:15px;font-weight: bold;" type="submit" name="submit" id="button-addon2">Sign Up</button></form>
  <?php 
              if(isset($_SESSION['status'])){
                echo'<h4 style="color:white;">'.$_SESSION['status']. '</h4>';
                unset($_SESSION['status']);
              }
            ?>
        </div>
    </div>
    <br><br>
        <div class="col-12 col-md-4">
      
   <a style="text-decoration: none; color:white;"  href="https://web.facebook.com/NovelTeesCustoms?_rdc=1&_rdr"><i class="fa-brands fa-facebook-square"></i></a>
       <a style="text-decoration: none; color:white;" href="https://www.instagram.com/Novelteescustoms/"><i class="fa-brands fa-instagram"></i></a>
       <a style="text-decoration: none; color:white;" href="https://www.tiktok.com/@novelteescustoms?_d=secCgYIASAHKAESPgo8t4c8X32WnJ34tLfWxeNIh8zr9U0PbUDNVIXGQTiAO918SHalwA7kQpw7lLihuIclpRQs1zm1grHJ0zgAGgA%3D&_r=1&checksum=5e0b186c4fcb85c316addc306dd60381436fd789df92789b2fa58197c6c63881&language=en&sec_uid=MS4wLjABAAAAB7B90uncu6QcZH8OpySNDQ_RiBZLtO_7qmvNW27N4mNZuFag3Ml2mYzT50wO1DlB&sec_user_id=MS4wLjABAAAAB7B90uncu6QcZH8OpySNDQ_RiBZLtO_7qmvNW27N4mNZuFag3Ml2mYzT50wO1DlB&share_app_id=1233&share_author_id=6790466466628371461&share_link_id=20DC9395-F001-47BA-8E75-5C538F994123&source=h5_m&timestamp=1656999391&tt_from=messenger&u_code=dajhm36242l4k0&ug_btm=b8727%2Cb0&user_id=6790466466628371461&utm_campaign=client_share&utm_medium=ios&utm_source=messenger"><i class="fa-brands fa-tiktok"></i></a>
  
       <br><br>
        <img src="imeges/payment.png" style="width:300px;" alt="" srcset="">
            <br>
                
                <strong><span style="color:#30D5C8;font-size:25px;font-weight: bold;">novelTees</span></strong>
            <br><br>
            <strong><span style="color:#30D5C8;font-size:25px;font-weight: bold;">made in us</span></strong></div>
 

   </div> 
   </div> 
</div>
   
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script> -->
