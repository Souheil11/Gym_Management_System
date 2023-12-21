<?php 
session_start();

	include("connection.php");
	include("functions.php");
  

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      //something was posted
      $user_name = $_POST['user_name'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $errMessage = "Please fill all required fields!";
      if(!empty($user_name) && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !is_numeric($user_name))
      {
  
        //save to database
        $user_id = random_num_u(6);
        $query = "insert into users (user_id,user_name,first_name,last_name,email,password) values ('$user_id','$user_name','$first_name','$last_name','$email','$password')";
  
        mysqli_query($con, $query);
  
        header("Location: login.php");
        die;
      }else
      {
        echo "<span style='color: red'>" . $errMessage . "</span>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Sign Up</title>
    <link rel="stylesheet" href="style_login.css" />
  </head>
  <body>
    <div class="container">

      <h1 class="title">Sign Up</h1>
      
      <form method="post">
        <label class="label">Username</label>
        <input type="text" name="user_name" />
        <label class="label">First Name</label>
        <input type="text" name="first_name"/>
        <label class="label" >Last Name</label>
        <input type="text" name="last_name"/>
        <label class="label" >Email</label>
        <input type="email" name="email"/>
        <label class="label">Password</label>
        <input type="password" name="password"/>
        <button>Sign Up</button>
        <p class="member"> Already a member? <a href="login.php">Login here</a>
        </p>
      </form>
    </div>

  </body>
</html>