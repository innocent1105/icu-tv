<?php

function check_login($con)
{

	if(isset($_COOKIE['ICU_acc'])){
		$id = $_COOKIE['ICU_acc'];
		// $id = $_SESSION['ICU_acc'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0){
			$user_data = mysqli_fetch_assoc($result);
			$_SESSION['user_id'] = $user_data['user_id'];
			return $user_data;
		}
	}

	// redirect to login
	header("Location: wall.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}