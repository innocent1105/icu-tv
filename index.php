<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$user_id = $user_data['user_id'];
    $user_name = $user_data['firstname'];

	$profile_pic = $user_data['pp'];
  
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
    <?php
        require("./system_arch/text_header.php");
    ?>











    <div class="section-name">Latest News</div>
    <br>
        <?php
            require("./system_arch/latest_news.php");
        ?>
    </div>



    <?php 
        require("./system_arch/footer.php");
    ?>
    <script src="scripts.js"></script>
</body>
</html>
