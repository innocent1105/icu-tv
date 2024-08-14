<?php 
	require "./mini_includes/login.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<link rel="stylesheet" href="styles.css">
<body>
<?php require "./system_arch/top_nav.php"; ?>

<div class="main-content" id="main-content">
        <div class="sign-in-container">
		<h2>Login</h2>
		<form method="post">
		<div class="form-group">
			<label for="">Student number / Phone number</label>
			<input id="text" type="text" name="s">
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input id="text" type="password" name="password"><br><br>
		</div>
		<div class="form-group">
			<input id="button" type="submit" value="Login"><br><br>
		</div>
			<a href="signup.php">Click here to Signup</a><br><br>
		</form>
		</div>
    </div>
</body>
</html>