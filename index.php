<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kobe Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="style_index.css">
   
  
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark px-5">
    <a href="index.php" class="navbar-brand mb-0 h1">Kobe Gym</a>
    

    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle='dropdown' aria-haspopup="true" aria-expanded="false">
  Welcome, <?php echo $user_data['user_name']; ?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="profile.php">My profile</a>
    <hr class="dropdown-divider">
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
  </div>
    </nav>



<div class="main-container d-flex">

  <div class="sidebar" id="side_nav">
    <div class="header-box px-3 pt-3 pb-4" id="side-bar">
    <h1 class="fs-4 sidebar_text"> <span class=" text-white text-center px-2 me-2 mt-5">Gym Management Portal</span></h1>
    </div>

    <ul class="list-unstyled px-2 links">
      <li class=" btn btn-dark link" ><a class="text-decoration-none text-white " href="users.php">Manage Users</a></li>
      <li class=" btn btn-dark link"><a class="text-decoration-none text-white " href="members.php">Manage Members</a></li>
      <li class=" btn btn-dark link"><a class="text-decoration-none text-white " href="trainers.php">Manage Trainers</a></li>
    </ul>

    <div class=" sidebar_logout_container"><a class=" sidebar_logout btn btn-dark text-decoration-none text-white " href="logout.php">Logout</a></div>

  </div>

 <div class="article_index row flex-grow-1 d-flex align-items-center justify-content-center justify-content-evenly mx-0 my-0" style="
    background-image: url('img/gym_index.jpg');
    height: 91vh; background-size:cover;
  
  ">
 <h1 class=" text-center text-white"  style="font-weight: bold;" >Kobe Gym Dashboard</h1>
  <div class="col-sm-3">
    <div class="card pb-5"  style="background-color: rgba(255,255,255, 0.6);">
      <div class="card-body pt-5 pb-3">
        <h5 class="card-title text-center text-dark"style="font-weight: bold;font-size: 24px;">Total users</h5>
        <p class="card-text text-lg-center text-dark"style="font-weight: bold; font-size: 36px;"><?php
          $query_users = "SELECT COUNT(*) FROM users";
          $total_users = mysqli_query($con, $query_users);
          $count = mysqli_fetch_assoc($total_users)['COUNT(*)'];
          echo $count;
        ?></p>
        <div class="text-center">
        <a href="users.php" class="btn btn-primary bg-dark border-white">To users portal</a></div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card pb-5" style="background-color: rgba(255,255,255, 0.6);">
      <div class="card-body pt-5 pb-3">
        <h5 class="card-title text-center text-dark" style="font-weight: bold;font-size: 24px;">Total members</h5>
        <p class="card-text text-lg-center text-dark" style="font-weight: bold; font-size: 36px;"><?php
          $query_members = "SELECT COUNT(*) FROM members";
          $total_members = mysqli_query($con, $query_members);
          $count = mysqli_fetch_assoc($total_members)['COUNT(*)'];
          echo $count;
          ?></p>
          <div class="text-center">
        <a href="members.php" class="btn btn-primary bg-dark border-white">To members portal</a></div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card pb-5" style="background-color: rgba(255,255,255, 0.6);">
      <div class="card-body pt-5 pb-3">
        <h5 class="card-title text-center text-dark" style="font-weight: bold;font-size: 24px;">Total trainers</h5>
        <p class="card-text text-lg-center text-dark " style="font-weight: bold; font-size: 36px;"><?php
$query_trainers = "SELECT COUNT(*) FROM trainers";
$total_trainers = mysqli_query($con, $query_trainers);
$count = mysqli_fetch_assoc($total_trainers)['COUNT(*)'];
echo $count;
?></p>
<div class="text-center">
        <a href="trainers.php" class="btn btn-primary bg-dark border-white">To trainers portal</a></div>
      </div>
    </div>
</div>

  </div>








  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>