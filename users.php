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
  <title>Kobe Gym - Manage Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="style_index.css">
  <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
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
        <li class=" btn btn-dark link active" ><a class="text-decoration-none text-white " href="users.php">Manage Users</a></li>
        <li class=" btn btn-dark link"><a class="text-decoration-none text-white " href="members.php">Manage Members</a></li>
        <li class=" btn btn-dark link"><a class="text-decoration-none text-white " href="trainers.php">Manage Trainers</a></li>
      </ul>
      <div class="vr"></div>
      <div class=" sidebar_logout_container"><a class=" sidebar_logout btn btn-dark text-decoration-none text-white " href="logout.php">Logout</a></div>
    </div>
    <div class="article">
      <div class="title_container mb-5">
        <h1  class=" title text-center">Manage Users</h1>
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
                      <th>User ID</th>
                      <th>Username</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>E-mail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM users";
                    $query_run = mysqli_query($con, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                      while($user = mysqli_fetch_assoc($query_run))
                      {
                        ?>
                        <tr>
                          <td><?= $user['user_id']; ?></td>
                          <td><?= $user['user_name']; ?></td>
                          <td><?= $user['first_name']; ?></td>
                          <td><?= $user['last_name']; ?></td>
                          <td><?= $user['email']; ?></td>
                          <td>
                            <form class="td-action" action="" method="POST" class="d-inline">
                              <a href="edit_user.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                              <button type="submit" name="delete_user" value="<?=$user['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                          </td>
                        </tr>
                        <?php
                      }
                    }
                    else
                    {
                      echo "<h5> No Records Found </h5>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var timeout = null;
      $('#live_search').keyup(function(){
        clearTimeout(timeout);
        timeout = setTimeout(function(){
          var input = $('#live_search').val();
          $.ajax({
            url: "search_users.php",
            method: "POST",
            data: { input: input },
            success: function(data){
              $("#datatable tbody").html(data);
            }
          });
        }, 500);
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>