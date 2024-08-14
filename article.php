<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$user_id = $user_data['user_id'];
    $user_name = $user_data['firstname'];

    
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php 
    require "./system_arch/top_nav.php";
    require "./system_arch/sidebar.php";
?>

   
    <div class="main-content" id="main-content">
        <div class="main-tab">
         
        <!-- Post Form -->
       <?php
            require "./system_arch/news_post.php";
        ?>

        <div class="left-tab">
            <?php require "./system_arch/profile.php"; ?>
            
        </div>
        </div>
      
    


        <!-- Posts Container -->
        <div></div>
    </div>
    <script src="./scripts.js"></script>
</body>

