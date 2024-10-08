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
    <?php 
        require("./header.php");
    ?>
<body>
    
    <?php
        require("./system_arch/top_nav.php");
        require("./system_arch/sidebar.php");
    ?>

    <!-- Side Bar -->
<!-- Main Body -->
<div class="container">
    <div class="banner">
        <img src="./images/banner.png" alt="" srcset="">
    </div>


    <div class="first-tab">
        <div class="main-text">ICU TV</div>
        <div class="mini-text">Get the latest updates, Innovations and discussions.</div>
        <br>
        <div class="mini-text">Latest | Local | International</div>
    </div>

<br><br>
<div class="tab-description">Latest News</div>
    <div class="list-container">
        <?php
            require("./system_arch/latest_news.php");
        ?>
    </div>
    <br>
<div class="tab-description">All stories</div>
    <div class="list-container">
        <?php
            require("./system_arch/news.php");
        ?>

    </div>


</div>


<script src="side-bar.js"></script>


</body>
</html>