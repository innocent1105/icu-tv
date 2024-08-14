<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$user_id = $user_data['user_id'];

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
    <nav class="navbar">
        <button class="open-btn" onclick="openSidebar()">☰</button>
        <div class="logo">ICU zambia</div>
        <ul class="nav-links">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./signup.php">singup</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="singup.html">Sign In</a></li>
        </ul>
        <div class="search-container">
            <input type="text" placeholder="Search..." id="search-bar">
            <button onclick="search()">Search</button>
        </div>
    </nav>

    <div class="sidebar" id="sidebar">
        <button class="close-btn" onclick="closeSidebar()">×</button>
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        <a href="./logout.php">Log out</a>
    </div>

    <div class="main-content" id="main-content">
        <div class="main-tab">
            <div class="center">

            </div>

            <div class="right-tab">
                
            </div>
        </div>
        
    </div>

    <script src="scripts.js"></script>
</body>
</html>
