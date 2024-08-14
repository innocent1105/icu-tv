<style>
    .sidebar a{
    font-size: 17px;
}
</style>

<div class="sidebar" id="sidebar">
        <button class="close-btn" onclick="closeSidebar()">×</button>
        <?php 
            if($user_data['user_type'] == "admin"){
            
                ?>
        <a href="./article.php">Post news</a>
            <?php
            }

        ?>
        <a href="./news.php">News</a>
        <a href="#">Profile settings</a>
        <a href="./logout.php">Log out</a>
       
      
    </div>
 