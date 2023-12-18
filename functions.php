<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

// Function to print login error message
function login_message($con){
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$message = "Invalid username or password!";

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);
			
			
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "<span style='color: red'>" . $message . "</span>";
		}else
		{
			echo "<span style='color: red'>" . $message . "</span>";
		}
		
	}}


/// Function to create random User number
function random_num_u($length)
{
    
    $u = "U";
	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(6,$length);

	for ($i=0; $i < $len; $i++) { 
		

		$text .= rand(0,9);
	}
    $U_number = $u.$text;
	return $U_number;
}

/// Function to create random Member number
function random_num_m($length)
{
    
    $m = "M";
	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(6,$length);

	for ($i=0; $i < $len; $i++) { 
		

		$text .= rand(0,9);
	}
    $m_number = $m.$text;
	return $m_number;
}

/// Function to create random Trainer number
function random_num_t($length)
{
    
    $t = "T";
	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(6,$length);

	for ($i=0; $i < $len; $i++) { 
		

		$text .= rand(0,9);
	}
    $t_number = $t.$text;
	return $t_number;
}

// Function delete user

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);


}

// Function delete member

if(isset($_POST['delete_member']))
{
    $member_id = mysqli_real_escape_string($con, $_POST['delete_member']);

    $query = "DELETE FROM members WHERE id='$member_id' ";
    $query_run = mysqli_query($con, $query);


}
// Function delete trainer

if(isset($_POST['delete_trainer']))
{
    $trainer_id = mysqli_real_escape_string($con, $_POST['delete_trainer']);

    $query = "DELETE FROM trainers WHERE id='$trainer_id' ";
    $query_run = mysqli_query($con, $query);


}

// update user
if(isset($_POST['update_user']))
{

    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

	$user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $query = "UPDATE users SET first_name='$first_name', last_name='$last_name' ,email='$email' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

}

// update member
if(isset($_POST['update_member']))
{

    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

	$trainer = mysqli_real_escape_string($con, $_POST['trainer']);
	$member_id = mysqli_real_escape_string($con, $_POST['member_id']);
    $query = "UPDATE members SET first_name='$first_name', last_name='$last_name' ,email='$email' ,trainer='$trainer' WHERE id='$member_id' ";
    $query_run = mysqli_query($con, $query);

}


// update trainer
if(isset($_POST['update_trainer']))
{

    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

	$trainer_for = mysqli_real_escape_string($con, $_POST['trainer_for']);
	$trainer_id = mysqli_real_escape_string($con, $_POST['trainer_id']);
    $query = "UPDATE trainers SET first_name='$first_name', last_name='$last_name' ,email='$email' , phone ='$phone', trainer_for = '$trainer_for' WHERE id='$trainer_id' ";
    $query_run = mysqli_query($con, $query);

}


// update profile
if(isset($_POST['update_profile']))
{
    $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
	$profile_id = mysqli_real_escape_string($con, $_POST['profile_id']);	

    $query = "UPDATE users SET user_name='$user_name', first_name='$first_name', last_name='$last_name' ,email='$email', password = '$password' WHERE id='$profile_id' ";
    $query_run = mysqli_query($con, $query);

}

//add member
if(isset($_POST['add_member']))
{
    $member_id = random_num_m(6);
	$first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $package = mysqli_real_escape_string($con, $_POST['package']);
    $date = mysqli_real_escape_string($con, $_POST['start_date']);

    $query = "INSERT INTO members (member_id,first_name,last_name,email,package,start_date) VALUES ('$member_id','$first_name','$last_name','$email','$package','$date')";

    $query_run = mysqli_query($con, $query);}



//add trainer
if(isset($_POST['add_trainer']))
{
	$trainer_id = random_num_t(6);
	$first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);


    $query = "INSERT INTO trainers (trainer_id,first_name,last_name,email,phone) VALUES ('$trainer_id','$first_name','$last_name','$email','$phone')";

    $query_run = mysqli_query($con, $query);}