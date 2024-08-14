<?php 

session_start();

	include("./connection.php");
	include("./functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		$s_id = $_POST['s'];
		$password = $_POST['password'];


		if(!empty($s_id) && !empty($password)){

			//read from database
			$query = "select * from users where student_number = '$s_id' limit 1";
			$result = mysqli_query($con, $query);

			if($result){
				if($result && mysqli_num_rows($result) > 0){
					$user_data = mysqli_fetch_assoc($result);
					
					if(password_verify($password ,$user_data['password']))
					{
						
						$_SESSION['user_id'] =  $user_data['user_id'];
						setcookie("ICU_acc", $user_data['user_id'], time() + (86400 * 30), "/");
						header("Location: index.php");
						// die;

						// echo "logged in";
					}else{
						echo "wrong password";
					}
				}
			}else{
				echo "error";
			}
		}else{
			echo "empty fields!";
		}
	}

?>