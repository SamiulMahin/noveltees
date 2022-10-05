<?php 
// include 'auth_c.php';
error_reporting(0);
session_start();
require 'db_connect.php';
$user_id=  $_SESSION ['user_id'];
include 'header.php';
include 'navbar.php';
?>
<?php 
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
   
   <title>Home-Noveltees</title>
</head>
<body>
 
  <div  style="background-color:black;font-family: noveltees, sans-serif; 
    font-size:25px;">
     <!-- Part1 -->
  <div style="background-image: url('imeges/mode.jpg');background-position: center;
background-repeat: no-repeat;
background-size: cover;" class="MID " >


  <div class="container">
 
  <?php 
              if(isset($_SESSION['lout_status'])){
                ?>
                <div class="alert alert-success fw-bold fs-5" role="alert"> <h2 class=" fw-bold fs-5"> <?php echo$_SESSION['lout_status']?></h2></div>
                <?php 
                unset($_SESSION['lout_status']);
              }
            ?>
    <div class="row"  style="padding-top:150px;padding-bottom:50px;height:800px">
          <div  class="col-12 col-md-6 col-sm-4 p-3">
          <div style="display:flex; justify-content: center;align-items: center;flex-direction: column; text-align:center;background-color:black; border-radius:20px;height:600px;" >
        <span   style="color:#30D5C8; font-size:70px; font-weight:bold;">Welcome To Novel-Tees Customs</span>
 
    
        <span  style="color:#dc1abe;font-size:50px ;font-weight:bold;">Inspired with you in mind</span>
        <span style="color:#dc1abe; font-size:30px;"></span>
        <a href="shop.php"><button style="height:40px;width:150px;  font-weight:bold; border-radius:50px;background:#30D5C8; color:black;">Shop Now</button></a>
        </div>
          </div>
    </div>
  
</div>

</div>
 <!-- Part2 -->
 <div class="container">
    <div class="row">
    <div class="col-12 col-md-12 col-sm-12 mt-3"  style="display:flex; justify-content: center;align-items: center;flex-direction: column;width:100%;text-align:center;" >
      <h2 style="color:#30D5C8;font-size:45px;width:80%;" >The Birth of Novel-Tees Customs</h2>
      <span style="color:#dc1abe;font-size:35px;width:80%;">The brand NovelTees has a unique lane. The niche speaks to the moral things around the world. The slogans I print are the things that "Your imaginetion our creation" Some people, somewhere, can relate to my apparel.NovelTees is loud and have bold slogans. If you've ever been think about you imaginetion about apparel on, you can relate.</span>
  </div>

    </div>

 </div>
  <!-- Part3 -->
  <div class="container">
    <div class="row">
    <div class="col-12 col-md-12 col-sm-12 mt-3"  style="display:flex; justify-content: center;align-items: center;flex-direction: column;width:100%;text-align:center;" >
      <h2 style="color:#30D5C8;font-size:45px;width:80%;" >"THE PULL-UP"CHICAGOs</h2>
      <span style="color:#dc1abe;font-size:35px;width:80%;">NovelTees shirts/hoodies/sweatshirts can physically or online be purchased from the anywhere and available</span>
  </div>

    </div>

 </div>
   <!-- Part4 -->
   <h1 class="container  "  style="color:#30D5C8;font-size:45px;">Featured Items</h1>  
<!-- <h2 class="container "  style="color:white;font-size:35px;">our most popular and softest beloved shirts.</h2>  -->
   <div class="container slider ">
   <?php 

$sql ="SELECT image,price1,price2 from products";
$data = mysqli_query($conn, $sql);
$check_result= mysqli_num_rows($data)> 0;
if($check_result){
  while( $rows = mysqli_fetch_array( $data ) ) 
  {
      ?>

<div class="card" style="width:18rem;background-color:black; padding:10px; color:white; margin=50px;">

  <img src="Admin/novel-tees_admin/imeges/<?php echo $rows ['image']?>" class="card-img-top" style="height:300px;" alt="...">
  <div class="card-body">

    <span>$<?php echo $rows ['price1']?></span> - <span>$<?php echo $rows ['price2']?></span>
  </div>

</div>

<?php
    }
}
else{
   die("Can not execute query");
}
?>	
   </div>

<!-- part 5 -->
<!-- <div class="container">
      <div class="row">
          <div class="col-12 col-md-2">
          <h3 style="color:#30D5C8;font-size:35px; text-align:center;">ALLOW 7-14 DAYS ON SHIPPING</h3>
          </div>
          <div class="col-12 col-md-10">
          <span style="color:#dc1abe;font-size:35px;text-align:center;"> ON SHIPPING
Our most loved, high end super soft shirts and heavy hoodies are popular and in demand, so please allow 7-14 days on delivery time and 7-21 days for international shipping. Thank you for your continuous support for rocking and standing with NovelTees.</span>
          </div>
      </div>

</div> -->

   <!-- Part7 -->
   <h1 class="container  "  style="color:#30D5C8;font-size:45px;">Novel-Tees Events
</h1>  
<h2 class="container "  style="color:white;font-size:35px;">Come check us out.</h2> 
   <div class="container slider ">
   <?php 

$sql ="SELECT image,price1,price2 from products where type ='ratchets'";
$data = mysqli_query($conn, $sql);
$check_result= mysqli_num_rows($data)> 0;
if($check_result){
  while( $rows = mysqli_fetch_array( $data ) ) 
  {
      ?>

<div class="card" style="width:18rem;background-color:black; padding:10px; color:white; margin=50px;">

  <img src="Admin/novel-tees_admin/imeges/<?php echo $rows ['image']?>" class="card-img-top" style="height:300px;" alt="...">
  <div class="card-body">

    <span>$<?php echo $rows ['price1']?></span> - <span>$<?php echo $rows ['price2']?></span>
  </div>

</div>

<?php
    }
}
else{
  ?>	
<h2  style="color:white;font-size:35px;">Product currently not available.</h2> 
<?php
}
?>	
   </div>
  
   

<!-- part6 -->
<section>
  <div style="background-color:#30D5C8; height:400px">
  <br><br><br>
  <div class="container">
  <div class="row"style="display:flex;justify-content:center; flex-direction:column;align-items:center;border-radius:20px;">
  <div class="col-12" style=" height:250px;flex-direction:column;background:black;width:50%; align-items:center;border-radius:20px;">
  <center><h3 style="color:#30D5C8;font-size:35px;text-algn:center;padding-top:25px;font-size:bold">Stay in the loop</h3></center>
  <br>
  
        <form action="config/code_loop.php" method="POST">
            <div class="input-group mb-3" style="" >
                <input style="background-color:#30D5C8; color:black;width:300px;font-weight: bold;font-size:25px;" name="email" type="text" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn rounded-end" style="background-color:#30D5C8;color:black; font-weight: bold;font-size:25px;" type="submit" name="submit" id="button-addon2" style="font-size:25px;font-weight: bold;">Sign Up</button></div>

  </form>

  </div>
</div>
        </div>

  </div>
  </div>
  
</section>



</div>

<!-- footer -->


   </div> 
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>




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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
          $('.slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
	
</script>

</body>
</html>
<?php include 'footer.php' ?>