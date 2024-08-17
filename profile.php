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
<link rel="stylesheet" href="./css/profile.css">
<?php
    require("./header.php");
?>
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
            $author_profile_picture = $row['pp'];
            $author_number = $row['student_number'];
            $author_user_type = $row['user_type'];
        }
    }
?>




<div class="container" id="main-content">
<div class="p-dash-control">
<div class="profile-wall">
    <div class="profile-checkout-tab">
        <img src="./profile_pictures/<?php echo $author_profile_picture ?>" width="100px" alt="" class="pp">
        <div class="username-area">
            <?php echo $author_name; ?>
            <div class="profile-tag">
                @<?php echo $author_username;?>
            </div>
        </div>
    </div>
</div>

<!-- <hr> -->
<div class="about-tab">
    <!-- <div class="header">About <?php echo $author_name; ?></div> -->
    <div class="det">
        <i class="si-chat-dots"></i>
        <div class="value"><?php echo $author_email; ?></div>
    </div>

    <div class="det">
        <i class="si-user"></i>
        <div class="value"><?php echo $author_user_type; ?></div>
    </div>
</div>
<div class="posts">
    <div class="post-header">Posts</div>

                <?php
                    $qry = "select * from news where user_id='$author_id'";

                    $result = mysqli_query($con, $qry);
                    if($result -> num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $news_id = $row['id'];
                            $title = $row['title'];
                            $content = $row['content'];
                            $video = $row['video'];
                            $image = $row['image'];
                            $date = $row['date'];
                ?>
<a href="./watch_news.php?id=<?php echo $news_id ?>">
    <div class="post">
        <img src="./files/images/<?php echo $image ?>" alt="">
        <div class="details">
            <div class="name">
                <?php echo $title ?>
            </div>
            <div class="description">
                <?php 
                    $content = substr($content, 0, 120);
                    echo $content;
                ?>
            </div>
            <div class="time">
                <?php echo $date ?>
            </div>
        </div>
    </div>
</a>
    <?php
                        }
                    }
                
                ?> 
</div>

</div>
</div>





<script src="scripts.js"></script>
</body>
</html>