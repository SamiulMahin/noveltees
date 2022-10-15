<?php 
error_reporting(0);
include 'header.php';
require 'db_connect.php';
$user_id=  $_SESSION ['user_id'];

?>
<?php 
$conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
  echo mysqli_connect_error();
}
?>
<!-- <style>

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
 
}

::selection{
  color: #fff;
  background: #664AFF;
}
.search-box{
  position: relative;
  height: 60px;
  width: 60px;
  border-radius: 50%;
  box-shadow: 5px 5px 30px rgba(0,0,0,.2);
  transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.search-box.active{
  width: 250px;
}
.search-box input{
  width: 100%;
  height: 100%;
  border: none;
  border-radius: 50px;
  background: #fff;
  outline: none;
  padding: 0 60px 0 20px;
  font-size: 18px;
  opacity: 0;
  transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.search-box input.active{
  opacity: 1;
}
.search-box input::placeholder{
  color: #a6a6a6;
}
.search-box .search-icon{
  position: absolute;
  right: 0px;
  top: 50%;
  transform: translateY(-50%);
  height: 60px;
  width: 60px;
  background: #30D5C8;
  border-radius: 50%;
  text-align: center;
  line-height: 60px;
  font-size: 22px;
  color: black;
  cursor: pointer;
  z-index: 1;
  transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.search-box .search-icon.active{
  right: 5px;
  height: 50px;
  line-height: 50px;
  width: 50px;
  font-size: 20px;
  background: #30D5C8;
  color: #fff;
  transform: translateY(-50%) rotate(360deg);
}
.search-box .cancel-icon{
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 25px;
  color: #fff;
  cursor: pointer;
  transition: all 0.5s 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.search-box .cancel-icon.active{
  right: -40px;
  transform: translateY(-50%) rotate(360deg);
}
.search-box .search-data{
  text-align: center;
  padding-top: 7px;
  color: #fff;
  font-size: 18px;
  word-wrap: break-word;
}
.search-box .search-data.active{
  display: none;
}
</style> -->
<nav class="navbar navbar-expand-lg navbar-light  sticky-top" style="background-color:#30D5C8;height:150px;" >
  <div class="container-md" style="font-family: noveltees, sans-serif; 
    font-size:25px;" >

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">
    <img style="height:90px"src="imeges/logo.png" alt="">
    </a>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 1000px;--bs-scroll-width: 100%;background-color:#30D5C8;">
        <li class="nav-item ">
        <strong><a class="nav-link active " aria-current="page" href="index.php">HOME</a></strong>
        </li>

        <li class="nav-item pe-3">
        <strong><a class="nav-link active " aria-current="page" href="custom.php">ALL THINGS CUSTOM</a></strong>
        </li>

        <li class="nav-item pe-3">
        <strong><a class="nav-link active" aria-current="page" href="gallary.php">GALLERY</a></strong>
        </li>


        <li class="nav-item dropdown pe-3">
          <a class="nav-link active  fw-bold " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            SHOP COLLECTION
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
          <li> <strong> <a class="dropdown-item" style="font-size:20px;font-weight:bold;" href="shop_ret.php">Ratchet</a></strong></li>
          <li> <strong> <a class="dropdown-item" style="font-size:20px;font-weight:bold;" href="shop_menis.php">Manifestation</a></strong></li>
          </ul>
        </li>
        <li class="nav-item">
        <strong><a class="nav-link active" aria-current="page" href="contact_us.php">CONTACT US</a></strong>
        </li>

      <!-- </ul>
      <ul> -->
    



      

          <li class="nav-item pe-3"  style="padding-left:70px;"> 
          
          <button style="background:#30D5C8; align-items:center; font-size:20px; margin-right:5px; " type="button" class="btn shadow-lg  rounded rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-search"></i>
            </button>
          
          
          <a href="shop.php"><button style="height:40px;width:150px; border-radius:50px;background:black; color:white; ">Shop now</button></a></li>
        <li class="nav-item pe-3 "  >   
        <?php $select_rows= mysqli_query($conn, "SELECT * FROM cart where customer_id='$user_id'"); 
              $row_count = mysqli_num_rows($select_rows);
        ?>
         
          <a href="cart.php" style="background-color:#30D5C8;" type="button" class="btn  position-relative">
                <i  class="fa-solid fa-cart-shopping "></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php echo $row_count; ?>
            <span class="visually-hidden">unread messages</span>
          </span>
        </a>  
        </li>
        <li  class="nav-item pe-3">
        <div class="dropdown">
            <i class="fas fa-user " id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
           <?php 
           if(isset($user_id)){
            $sql= "SELECT * From customer where id='$user_id' ";
              $data = mysqli_query($conn, $sql);
              $check_result= mysqli_num_rows($data)> 0;
                      if($check_result){
                      $rows = mysqli_fetch_assoc($data);
                      }
                      ?>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item fw-bold fs-5" href="#"><?php echo $rows['name'];?></a></li>
                                    <li><a class="dropdown-item fw-bold fs-5" href="read_order.php">My Orders</a></li>
                                    <li><a class="dropdown-item fw-bold fs-5" href="#">Account settings</a></li>
                                    
                                    <li>
                                    <a class="dropdown-item fw-bold fs-5"  href="config/code_loging.php?logout=<?php echo $user_id ?> ">Log out</a>  
                                    </li>
                                    
                                    
                          </ul>
                      <?php    

           }
           else{
            
            ?>
                                      
                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item fw-bold fs-5" href="log_in.php">Log In / Register</a></li>
                                   
                                    </form>
                                    
                          </ul>
             <?php  

           }
      ?>
          
            

          
             
  
            </div>   
        </li>
      </ul>
     
  </div>
</nav>
<script>
      // const searchBox = document.querySelector(".search-box");
      // const searchBtn = document.querySelector(".search-icon");
      // const cancelBtn = document.querySelector(".cancel-icon");
      // const searchInput = document.querySelector("input");
      // const searchData = document.querySelector(".search-data");
      // searchBtn.onclick =()=>{
      //   searchBox.classList.add("active");
      //   searchBtn.classList.add("active");
      //   searchInput.classList.add("active");
      //   cancelBtn.classList.add("active");
      //   searchInput.focus();
      //   if(searchInput.value != ""){
      //     var values = searchInput.value;
      //     searchData.classList.remove("active");
      //     searchData.innerHTML = "You just typed " + "<span style='font-weight: 500;'>" + values + "</span>";
      //   }else{
      //     searchData.textContent = "";
      //   }
      // }
      // cancelBtn.onclick =()=>{
      //   searchBox.classList.remove("active");
      //   searchBtn.classList.remove("active");
      //   searchInput.classList.remove("active");
      //   cancelBtn.classList.remove("active");
      //   searchData.classList.toggle("active");
      //   searchInput.value = "";
      // }
    </script>




