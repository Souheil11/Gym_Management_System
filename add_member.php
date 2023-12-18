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
    <title>Kobe Gym - Add member</title>
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
    <div class="vr"></div>
    <div class=" sidebar_logout_container"><a class=" sidebar_logout btn btn-dark text-decoration-none text-white " href="logout.php">Logout</a></div>

  </div>

  <div class="article">
    <div class="title_container mb-5">
    <h1  class=" title text-center">Add member</h1></div>
    <div class="container-fluid">
        <div class="row"><div class="container"><div class="row"><div class="col-md-2"></div>
    <div class="col-md-8">
        <table id="datatable" class="table">

        <form action="" method="POST">

<div class="mb-3">
    <label>First name</label>
    <input type="text" name="first_name" class="form-control">
</div>
<div class="mb-3">
    <label>Last name</label>
    <input type="text" name="last_name" class="form-control">
</div>
<div class="mb-3">
    <label>E-mail</label>
    <input type="email" name="email" class="form-control">
</div>
<div class="mb-3">
    <label>Package</label>
    <select name="package" class="form-select" aria-label="Default select example">
    <option selected>Select package</option>
    <option value="3 months">3 months</option>
    <option value="6 months">6 months</option>
    <option value="12 months">12 months</option>
    </select>

    <label>Start date</label>
    <input type="date" name="start_date" class="form-control">
</div>
<div class="mb-3">
    <button type="submit" name="add_member" class="btn btn-primary">Add member</button>
    <a href="members.php" class="btn btn-danger mx-2 ">Back</a>
</div>

</form>

                    </div>
                </div>
            </div>
        </div>
    </div>



  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>