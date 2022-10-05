<?php

session_start();
include('includes/header.php');
if(isset ($_SESSION['auth']))
{
    $_SESSION['status']="Already Logged In";
    header("Location: ./index.php");
    exit(0);
}
?>
<style>
  form .indicator span{
    position: relative;
  }
  form .indicator span:before{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height:100%;
    
    border-radius:5px;
  }
  form .indicator span.active.Weak:before{
    background-color:red;
  }
  form .indicator span.active.Medium:before{
    background-color:Orange;
  }
  form .indicator span.active.Strong:before{
    background-color:Green;
  }
  form .text{
    font-size:20px;
    font-weight:500;
    margin-bottom: -10px;
    display:none;
  }
  form .text .weak{
    color:red;
  }
  form .text .medium{
    color:orange;
  }
  form .text .strong{
    color:green;
  }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body  style="background-color:#30d5c8;">



    <div   style=" margin-top:100px; ">
        <div class="container" >

        <div class="row" >
            <div class="col-md-12 col-12">
            <div class="modal-body">
                <form class="row g-3" action="config/code_loging.php" method="POST">
                <center><a href="index.php"><img  style="height:120px; width:150px; border-radius:15px;" src="imeges/logo.png" alt=""></a></center>
                 <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <span style="position:absolute; right:30px; transform: translate(0,-50%); top:52%; cursor :pointer"><i class="fas fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i></span>
                    <input type="password"  onkeyup="trigger()" name="password" class="form-control input" id="password" placeholder="" required>

                   <br><br><br>
                  <div class="indicator" style="height: 10px;display:flex;align-items:center;justify-content:space-between; margin: 10px 0;display:none;" >
                    <span style="width:100%; height:100%;background:lightgrey;border-radius:5px;" class="Weak"></span>
                    <span style="width:100%; height:100%;background:lightgrey;border-radius:5px; margin:0 3px;"class="Medium"></span>
                    <span style="width:100%; height:100%;background:lightgrey;border-radius:5px;"class="Strong"></span><br>
             
                  </div>
                  <div class="text">
                  You password is too weak
               
                  </div>
                 <script>
                  const indicator =document.querySelector(".indicator");
                  const input =document.querySelector(".input");
                  const weak =document.querySelector(".Weak");
                  const medium =document.querySelector(".Medium");
                  const strong =document.querySelector(".Strong");
                  const text =document.querySelector(".text");
                  let expWeak= /[a-z]/;
                  let expMedium= /\d+/;
                  let expStrong= /.[!,@,#,$,%,^,&,*,(,)~,_,-]/;
                  function trigger() {
                    if(input.value != ""){
                      indicator.style.display ="block"
                      indicator.style.display ="flex"
                      if(input.value.length <= 3 && (input.value.match(expWeak) ||input.value.match(expMedium) ||
                      input.value.match(expStrong)))  no= 1;
                      if(input.value.length >= 6 && ((input.value.match(expWeak) && input.value.match(expMedium)) || (input.value.match(expMedium) &&
                      input.value.match(expStrong)) || (input.value.match(expStrong) && input.value.match(expWeak))))no=2;
                      
                      if(input.value.length >= 6 && (input.value.match(expWeak) &&input.value.match(expMedium)))no=3;
                      
                      if(no == 1){
                        weak.classList.add("active");
                        text.style.display ="block";
                        text.textContent = "Your password is too weak"
                        text.classList.add("weak");
                      }
                      if(no == 2){
                        medium.classList.add("active");
                        text.style.display ="block";
                        text.textContent = "Your password is medium"
                        text.classList.add("medium");
                      }else{
                        medium.classList.remove("active");
                        text.classList.remove("medium");
                      }
                      if(no == 3){
                        medium.classList.add("active");
                        strong.classList.add("active");
                        text.style.display ="block";
                        text.textContent = "Your password strong"
                        text.classList.add("strong");
                        text.classList.add("medium");
                      }else{
                        strong.classList.remove("active");
                        text.classList.remove("strong");
                      }
                    }else{
                      indicator.style.display ="none"
                      text.style.display ="none";
                    }
                  }
                 </script>
                     <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Confirm password</label>
                    <input type="password" name="cpassword" class="form-control" id="passwordC" placeholder="" required>
                    <span style="position:absolute; right:30px; transform: translate(0,-50%); top:69%; cursor :pointer"><i class="fas fa-eye" aria-hidden="true" id="eyeC" onclick="toggle1()"></i></span>
                  </div>
                
                  <script>
                      var state =false;
                      function toggle(){
                        if(state){
                          document.getElementById("password").setAttribute("type","password");
                          document.getElementById("eye").style.color='gray';
                          state =false;
                        }
                        else{
                          document.getElementById("password").setAttribute("type","text");
                          document.getElementById("eye").style.color='black';
                          state = true;
                        }
                      }
                      </script>

                  <script>
                      var state =false;
                      function toggle1(){
                        if(state){
                          document.getElementById("passwordC").setAttribute("type","password");
                          document.getElementById("eyeC").style.color='gray';
                          state =false;
                        }
                        else{
                          document.getElementById("passwordC").setAttribute("type","text");
                          document.getElementById("eyeC").style.color='black';
                          state = true;
                        }
                      }
                      </script>
              </div>
                            <?php 
                            if(isset($_SESSION['status'])){
                              ?>
                              <div class="alert alert-success" role="alert"> <?php echo'<h4>'.$_SESSION['status']. '</h4>'?></div>
                              <?php 
                              unset($_SESSION['status']);
                              }
                            ?>
                            <input type="hidden" name="mail" value=" <?php echo $_GET['email'] ?>">
                            <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>">
                        
                         
                         <input type="submit" name="reset" class="btn btn-success">
                        
                        </form>  
                        </div>
                    </div>
                    
                </div> 
              </div>
            </div>
        </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a3253ecb96.js" crossorigin="anonymous"></script>
</body>
</html>
