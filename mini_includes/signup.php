<?php 
session_start();


function random_num($length){
	$text = "";
	if($length < 5)
	{
		$length = 5;
	}
	$len = 11;
	for ($i=0; $i < $len; $i++) { 
		$text .= rand(0,9);
	}

	return $text;
}

	require("connection.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$fullname = $_POST['full_name'];
		$email = "";
		$phone_number = $_POST['student_number'];
		$password = $_POST['password'];
		$country = "Zambia";
		$city = "Kitwe";

		if(!empty($fullname) && !empty($password)){
			$password = password_hash($password, PASSWORD_DEFAULT);
			//save to database
			$user_id = random_num(1000);
			// profile picture

			
			if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
				$img_name = $_FILES['pp']['name'];
				$tmp_name = $_FILES['pp']['tmp_name'];
				$error = $_FILES['pp']['error'];
				
				if($error === 0){
				   $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				   $img_ex_to_lc = strtolower($img_ex);
	   
				   $allowed_exs = array('jpg', 'jpeg', 'png');
				   if(in_array($img_ex_to_lc, $allowed_exs)){
					  $new_img_name = uniqid($fullname, true).'.'.$img_ex_to_lc;
					  $img_upload_path = './profile_pictures/'.$new_img_name;
					  move_uploaded_file($tmp_name, $img_upload_path);
					  echo $img_upload_path;
	   

						$query = "insert into users (user_id,firstname,email,student_number,password,pp) values ('$user_id','$fullname','$email','$phone_number','$password','$new_img_name')";


						$result = mysqli_query($con, $query);
						if($result){
							echo "Success";
						}else{
							echo mysqli_error($con);
						}

						header("Location: ./login.php");
					   exit;
				   }else {
					  $em = "You can't upload files of this type";
					  echo $em;
					  exit;
				   }
				}else {
				   $em = "unknown error occurred!";
				   echo $em;
				}
	   
			   
			 }else {
	   
				  header("Location: ../index.php?success=Your account has been created successfully");
				  exit;
			 }

			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>
