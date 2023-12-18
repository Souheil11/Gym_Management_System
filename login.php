<?php 

session_start();

include("connection.php");
include("functions.php");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Log In</title>
    <link rel="stylesheet" href="style_login.css" />
  </head>
  <body>
    <div class="container">
      <h1>Log In</h1>
	  <h5 class="database-instructions">Default login credentials<br>User: <span class="highlight">admin</span> <br>Pass: <span class="highlight">admin</span></h5>
      <form action="login.php" method="post">
		
		<div><?php login_message($con); ?></div>

        <label class="label" for="user" >Username</label>
        <input id="user" type="text" name="user_name"/>
        <label class="label" for="pass">Password</label>
        <input id="pass" type="password" name="password"/>
        <button>Log In</button>
        <p class="member"> Not already a member? <a href="signup.php">Sign Up here</a>
        </p>
      </form>
    </div>
    
  </body>
</html>