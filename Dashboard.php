
<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Dashboard</title>
  
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

    <link rel="" type="text/css" href="index.php">
    <link rel="" type="text/css" href="login.php">
    <link rel="" type="text/css" href="Dashboard.php">
    <link rel="" type="text/css" href="Purchase.php">
    <link rel="" type="text/css" href="Modify-Asset.php">
    <link rel="" type="text/css" href="Disposal.php">
    <link rel="" type="text/css" href="Purchase-Return.php">
    <link rel="" type="text/css" href="Asset-Reports.php">
    <link rel="" type="text/css" href="Services.php">

</head>

<body>

<!----------------------Navbar Section------------------>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

    <a href="#" class="navbar-brand text-warning">&nbsp;&nbsp;
      <i class="fab fa-apple"></i> SPED</a>

        <button class="navbar-toggler " data-toggle="collapse" data-target="#menu"> 
            <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a href="Purchase.php" class="nav-link">
              <i class="fas fa-chart-bar"></i> Purchase</a>
          </li>

          <li class="nav-item">
            <a href="Modify-Asset.php" class="nav-link">
              <i class="fas fa-list-ul"></i> Modify-Asset</a>
          </li>

          <li class="nav-item">
            <a href="Disposal.php" class="nav-link">
            <i class="fas fa-network-wired"></i> Dispoal</a>
          </li>

          <li class="nav-item">
            <a href="Search.php" class="nav-link">
              <i class="fas fa-search"></i> Search</a>
          </li>

          <li class="nav-item">
            <a href="Services.php" class="nav-link">
              <i class="fas fa-users"></i> Services</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <div class="dropdown">
              <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" >
                <i class="fas fa-id-badge"></i> User Info</a>

              <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <a href="#" class="dropdown-item">Change Password</a>
                <a href="index.php" class="dropdown-item">About us</a>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>

        </ul>
        <a class="nav-link" href="#">Welcome.. <?php echo $_SESSION['last_name']; ?> ! <div id="timer"></div> </a>
      </div>
  </nav>
  <!-- Navigation menu ends here -->

<!----------------------Dashboard Section------------------>

  <!-- creating heading of dashboard -->
    <div class=" py-3 text-white" style="background-color: teal">
      <h1>&nbsp;&nbsp;<i class="fas fa-th"></i> Dashboard</h1>
    </div>

    <div class="bg-light p-3">     
      <div class="row">

        <div class="col-md-4">
          <a href="" class="btn btn-primary d-block font-weight-bold">
          <i class="fas fa-plus"></i> &nbsp;ADD POST</a>
        </div>
      </div>
    </div>
  <!-- dashboard heading ends -->

  <!-- dashboard contet start -->
    <div class="container-fluid">
      <div class="row"> 
        <div class="col-8">
          <h2 style="background-color: purple;" class="text-white p-2 ">Latest Posts</h2>

        <div class="container">

        <!-- creating table -->
        <table class="table mt-3">

          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Category</th>
              <th>Date Posted</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Post One</td>
              <td>Web Development</td>
              <td>28 April 2019</td>
              <td><a href="#" class="btn btn-outline-secondary btn-sm">
                 Details <i></i>
              </a></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Post two</td>
              <td>Web Development</td>
              <td>28 April 2019</td>
              <td><a href="#" class="btn btn-outline-secondary btn-sm">
                 Details <i></i>
              </a></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Post three</td>
              <td>Web Development</td>
              <td>28 April 2019</td>
              <td><a href="#" class="btn btn-outline-secondary btn-sm">
                 Details <i></i>
              </a></td>
            </tr>
            <tr>
              <td>4</td>
              <td>Post four</td>
              <td>Web Development</td>
              <td>28 April 2019</td>
              <td><a href="#" class="btn btn-outline-secondary btn-sm">
                 Details <i></i>
              </a></td>
            </tr>
            <tr>
              <td>5</td>
              <td>Post Five</td>
              <td>Web Development</td>
              <td>28 April 2019</td>
              <td><a href="#" class="btn btn-outline-secondary btn-sm">
                 Details <i></i>
              </a></td>
            </tr>
            <tr>
              <td>6</td>
              <td>Post six</td>
              <td>Web Development</td>
              <td>28 April 2019</td>
              <td><a href="#" class="btn btn-outline-secondary btn-sm">
                 Details <i></i>
              </a></td>
            </tr>
            <tr>
              <td>7</td>
              <td>Post One</td>
              <td>Web Development</td>
              <td>28 April 2019</td>
              <td><a href="#" class="btn btn-outline-secondary btn-sm">
                 Details <i></i>
              </a></td>
            </tr>
            <tr>
              <td>8</td>
              <td>Post One</td>
              <td>Web Development</td>
              <td>28 April 2019</td>
              <td><a href="#" class="btn btn-outline-secondary btn-sm">
                 Details <i></i>
              </a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  <!-- card contet start -->
      <div class="col-md-4 mt-4">
        <div class="card">

            <div class=" bg-primary text-white p-4">
              <i class="fas fa-list-ul fa-6x"></i>
              <h2 class="float-right font-weight-bold" style="font-size: 50px; text-align: center;">08 <span class="d-block">Posts</span></h2>
            </div>

            <div class="card-footer text-primary">
              <h6 class="text-center"><a href=""> View Details
              <i class="fas fa-arrow-alt-circle-right"></i></h6></a>
            </div>
        </div>

        <div class="card mt-5">

            <div class=" bg-success text-white p-4 ">
              <i class="fas fa-list-ul fa-6x"></i>
              <h2 class="float-right font-weight-bold" style="font-size: 40px; text-align: center;">04 <span class="d-block">Categories</span></h2>
            </div>

            <div class="card-footer text-primary">
              <h6 class="text-center"><a href=""> View Details
              <i class="fas fa-arrow-alt-circle-right"></i></h6></a>
          </div>
        </div>

          <div class="card mt-5">

            <div class=" bg-warning text-white p-4 ">
              <i class="fas fa-list-ul fa-6x"></i>
              <h2 class="float-right font-weight-bold" style="font-size: 50px; text-align: center;">20 <span class="d-block">Users</span></h2>
            </div>

            <div class="card-footer text-warning">
              <h6 class="text-center"><a href=""> View Details
              <i class="fas fa-arrow-alt-circle-right"></i></h6></a>
            </div>
        </div>
      </div> 
    </div>
  <!-- dashboard content ends -->

  <!-- dashboard footer start -->
    <div class="bg-light p-3">     
      <div class="row">

        <div class="col-md-4">
         <a href="" class="btn btn-success d-block font-weight-bold">
          <i class="fas fa-plus"></i> &nbsp; ADD CATEGORY</a>
        </div>

        <div class="col-md-4">
         <a href="" class="btn btn-warning d-block font-weight-bold">
          <i class="fas fa-plus"></i> &nbsp;ADD USER</a>
        </div>
    </div>
  <!-- dashboard footer ends -->

<!----------------------Footer Section------------------>

<section id="footer">
  <div>
    <hr>
    <p class="copyright">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All rights received...&nbsp;&amp;&nbsp;Website Crafted by - DPS Sampath ©</p>
  </div>
</section>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

<!-- TIMER -->
<!--<script src="js/timer.js"></script>-->

</body>
</html>
<?php mysqli_close($connection); ?>
