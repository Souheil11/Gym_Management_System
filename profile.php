<?php
session_start();
include("connection.php");
include("functions.php");

// Check login status and store it in a session variable
if (!isset($_SESSION['user_data'])) {
    $_SESSION['user_data'] = check_login($con);
}
$user_data = $_SESSION['user_data'];
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kobe Gym - My profile</title>
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
        <a class="navLogoutBtn dropdown-item" href="logout.php">Logout</a>
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
      <div class="  sidebar_logout_container"><a class=" sidebar_logout btn btn-dark text-decoration-none text-white " href="logout.php">Logout</a></div>
    </div>
    <div class="article">
      <div class="title_container mb-5">
        <h1  class=" title text-center">My profile</h1>
      </div>
      <div class="container-fluid ">
        <div class="row ">
          <div class="container">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-9 ">
                <table id="datatable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Email</th>
                      <th>Password</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?= $user_data['user_name']; ?></td>
                      <td><?= $user_data['first_name']; ?></td>
                      <td><?= $user_data['last_name']; ?></td>
                      <td><?= $user_data['email']; ?></td>
                      <td><?= str_repeat('*', strlen($user_data['password'])); ?></td>
                      <td>
                        <form action="" method="POST" class="d-inline">
                          <a href="edit_profile.php?id=<?= $user_data['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>