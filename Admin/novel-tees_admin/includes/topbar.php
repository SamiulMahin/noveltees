
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
  

    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item dropdown">
      <div class="dropdown">
      
  <button class="btn btn-secondary dropdown-toggle rounded-pill" type="button" data-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-user-circle"><?php if(isset($_SESSION['auth'])){
    echo $_SESSION['auth_user']['name'];
   } 
   else{
    echo "Not Logged In";
   }
   ?></i>
  </button>

  <div class="dropdown-menu">
   
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <form action="./config/code_loging.php" method="POST" >
      <button type="submit" name="logout" class="dropdown-item">Log Out</button>
    </form>
  </div>
</div>
      </li>
      
      
    </ul>
  </nav>
  <!-- /.navbar -->
