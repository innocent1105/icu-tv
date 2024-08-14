<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$user_id = $user_data['user_id'];
    $user_name = $user_data['firstname'];

	$profile_pic = $user_data['pp'];

	if(!isset($_GET['profile_id'])){
		header("Location: ./index.php");
	}
  
    $author_id = $_GET['profile_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php	 
	require "./system_arch/top_nav.php";
	require "./system_arch/sidebar.php";
?>

<?php
    $qry = "select * from users where user_id='$author_id'";
    $result = mysqli_query($con, $qry);
    
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            $author_name = $row['firstname'];
            $author_username = $row['username'];
            $author_email = $row['email'];
            $author_country = $row['country'];
            $author_city = $row['city'];
            $author_profile_picture = $row['pp'];
            $author_number = $row['student_number'];
        }
    }
?>




<div class="main-content" id="main-content">

<div class="profile-checkout-tab">
    <img src="./profile_pictures/<?php echo $author_profile_picture ?>" alt="" class="pp">
    <div class="username-area">
        <?php echo $author_name; ?>
        <div class="profile-tag">
            @<?php echo $author_username; ?>
        </div>
    </div>
</div>
<!-- <hr> -->
<div class="about-tab">
    <div class="header">About <?php echo $author_name; ?></div>
    <div class="det">
        <div class="lable">Email</div>
        <div class="value"><?php echo $author_email; ?></div>
    </div>
    <div class="det">
        <div class="lable">Country</div>
        <div class="value"><?php echo $author_country; ?></div>
    </div>
    <div class="det">
        <div class="lable">From</div>
        <div class="value"><?php echo $author_city; ?></div>
    </div>
    <div class="det">
        <div class="lable">Contact</div>
        <div class="value"><?php echo $author_number; ?></div>
    </div>
</div>

</div>





<script src="scripts.js"></script>
</body>
</html>