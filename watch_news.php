<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$user_id = $user_data['user_id'];
    $user_name = $user_data['firstname'];

	$profile_pic = $user_data['pp'];

	if(!isset($_GET['id'])){
		header("Location: ./index.php");
	}

	$news_id = $_GET['id'];
  
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



<div class="main-content" id="main-content">
<div class="main-news-tab">
<?php
	$qry = "select * from news where id='$news_id'";
	$result = mysqli_query($con, $qry);

	if($result -> num_rows > 0){
		while($row = $result->fetch_assoc()){
			$title = $row['title'];
			$content = $row['content'];
			$video = $row['video'];
			$image = $row['image'];
			$url = $row['url'];
			$author_user_id = $row['user_id'];

			// echo $author_user_id;

			$qry = "select * from users where user_id='$author_user_id' limit 1";
			$result = mysqli_query($con, $qry);
			if($result -> num_rows > 0 ){
				while($row = $result -> fetch_assoc()){
					$author_name = $row['firstname'];
					$author_username = $row['username'];
					$author_profile_picture = $row['pp'];
					// echo $author_name;
				}
			}
		}
	}

?>

<div class="author-profile-tab">
	<img src="./profile_pictures/<?php echo $author_profile_picture ?>" alt="<?php echo uniqid($author_profile_picture) ?>">
	<a href="./profile.php?profile_id=<?php echo $author_user_id; ?>">
	<div class="author-name">
		<?php echo $author_name ?><br>
		<div class="username-a"><?php echo $author_username ?></div>
	</div>
	</a>
	<div class="author-profile-btns">
		<div class="report">Report problem</div>
	</div>
</div>

<div class="wacth-news-tab">
	<div class="news-title-area"><?php echo $title ?></div>
</div>
<?php 
	if(empty($video) || $video == ""){
		echo "No video";	
	}else{
	?>
	<div class="news-video-area">
		<video src="./files/videos/<?php echo $video ?>" controls></video>
	</div>
	<?php
	}

?>

<div class="news-content-area">
<?php
	$desLength = strlen($content);
	if($desLength < 240){
	?>
		<div class="min-read"> 30 seconds read.</div>
	<?php
		}elseif($desLength > 350){
	?>
		<div class="min-read"> 1 min read.</div>

	<?php
		}elseif($desLength > 500){
	?>
		<div class="min-read"> 2 min read.</div>
	<?php
		}else{
	?>
		<div class="min-read"> 4+ min read.</div>
	<?php
		}
	?>
	<br>

	<?php echo $content; ?>
</div>

</div>
</div>
  
<script src="scripts.js"></script>
</body>
</html>





