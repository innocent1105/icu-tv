<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
	setcookie("ICU_acc", $user_data['user_id'], 1, "/");
}


header("Location: wall.php");
die;