<?php
session_start();
include_once("connection.php");
include_once("functions.php");

$user_data = check_login($con);

$query = "SELECT * FROM members";
$query_run = mysqli_query($con, $query);

$members = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kobe Gym - Manage members</title>
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
        <li class="btn btn-dark link"><a class="text-decoration-none text-white" href="users.php">Manage Users</a></li>
        <li class="btn btn-dark link active"><a class="text-decoration-none text-white" href="members.php">Manage Members</a></li>
        <li class="btn btn-dark link"><a class="text-decoration-none text-white" href="trainers.php">Manage Trainers</a></li>
      </ul>
      <div class="vr"></div>
      <div class="sidebar_logout_container"><a class="sidebar_logout btn btn-dark text-decoration-none text-white" href="logout.php">Logout</a></div>
    </div>
    <div class="article">
      <div class="title_container mb-5">
        <h1 class="title text-center">Manage members</h1>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="container">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <table id="datatable" class="table table-striped">
                  <input type="text" class="form-control mb-3" id="live_search" autocomplete="off" placeholder="Search...">
                  <thead>
                    <tr>
                      <th>Member ID</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Email</th>
                      <th>Package</th>
                      <th>Start date</th>
                      <th>Trainer</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="search_results">
                    <?php
                    if (count($members) > 0) {
                      foreach ($members as $member) {
                        ?>
                        <tr>
                          <td><?= $member['member_id']; ?></td>
                          <td><?= $member['first_name']; ?></td>
                          <td><?= $member['last_name']; ?></td>
                          <td><?= $member['email']; ?></td>
                          <td><?= $member['package']; ?></td>
                          <td><?= $member['start_date']; ?></td>
                          <td><?= $member['trainer']; ?></td>
                          <td>
                            <form class="td-action" action="" method="POST" class="d-inline">
                              <a href="edit_member.php?id=<?= $member['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                              <button type="submit" name="delete_member" value="<?= $member['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                          </td>
                        </tr>
                        <?php
                      }
                    } else {
                      echo "<h5> No Record Found </h5>";
                    }
                    ?>
                  </tbody>
                </table>
                <a href="add_member.php" class="btn btn-primary float-start mt-2">Add member</a>
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