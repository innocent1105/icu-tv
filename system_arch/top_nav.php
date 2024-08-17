<nav class="flex-div">
        <div class="nav-left flex-div">
            <img src="./images/menu.png" class="menu-icon" alt="" srcset="">
            <img src="./images/logo.png" class="logo" width="20px" alt="" srcset="">
        </div>
        <div class="nav-middle flex-div">
           <div class="search-box flex-div">
               <input type="text" placeholder="Search..">
               <img src="./images/search.png" alt="" srcset="">
           </div>
           <!-- <img src="./images/voice-search.png" class="mic-icon" alt="" srcset=""> -->
        </div>
        <div class="nav-right flex-div">
           <?php 
                if(isset($_COOKIE['ICU_acc'])){
            ?>
            <?php
                if($user_data['user_type'] == "admin"){
            ?>
             <a href="./article.php"><i class="si-video"></i> Post</a>
            <?php
                }

            ?>

            <a href="#"><i class="si-bell"></i>Notifications</a>
            <img src="./profile_pictures/<?php echo $user_data['pp'] ?>" class="user-icon" alt="" srcset="">


            <?php
                }else{
            ?>
             <a href="./signup.php"><i class="si-video"></i> Signup</a>
            <a href="./login.php"><i class="si-bell"></i>Login</a>
            <?php 
                }
            ?>
        
        </div>
    </nav>