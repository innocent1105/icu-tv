<?php 
session_start();

	include("connection.php");
	include("functions.php");   

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

<?php
    require("./system_arch/tab1.php");
?>

<!-- Main Body -->
<div class="container">

    <div class="first-tab">
        <div class="left-tab-btns">
            <a href="./signup.php"><button>Sign up</button></a>
            <a href="./login.php"><button class="login-btn">Login</button></a>
        </div>

        <div class="main-text">ICU TV</div>
        <div class="mini-text">Get the latest updates, Innovations and discussions.</div>
        <br>
        <div class="mini-text">Latest | Local | International</div>

      
    </div>

<br><br>
<div class="tab-description">Latest News</div>
    <div class="list-container">
        <?php
            require("./system_arch/wall_latest_news.php");
        ?>

    </div>



</div>


<script src="side-bar.js"></script>


</body>
</html>