<div class="sidebar">
         <div class="shortcut-links">
             <a href="#" class="active-tab"><i class="si-home"></i><p>Home</p></a>
             <a href="#"><i class="si-bolt"></i><p>Trending</p></a>
             <a href="#"><i class="si-location"></i><p>Latest news</p></a>
             <a href="#"><i class="si-tv"></i><p>Watch</p></a>
             <!-- <a href="#"><img src="./images/subscriprion.png"><p>subscriprion</p></a> -->
             <hr>
             <a href="#"><i class="si-lightbulb"></i><p>Innovation</p></a>
             <a href="#"><i class="si-postcard"></i><p>Governance</p></a>
             <a href="#"><i class="si-trophy"></i><p>Sports</p></a>
             <hr>
             <?php 
                if(isset($_COOKIE['ICU_acc'])){
            ?>
             <a href="#"><i class="si-user-circle"></i><p>Profile</p></a>
           
             <a href="./logout.php"><i class="si-login"></i><p>Log out</p></a>

            <?php
                }
            ?>
             <hr>
            </div>
          <div class="subscribed-list">
              <h3>Media Team</h3>

    <?php

        $qry = "select * from users where user_type='user'";
        $result = mysqli_query($con,$qry);

        if($result -> num_rows > 0){
            while($row = $result->fetch_assoc()){
                $name = $row['firstname'];
                $username = $row['username'];
                $profile = $row['pp'];
                $id = $row['user_id'];

                ?>
           <a href="./profile.php?profile_id=<?php echo $id?>"><img src="./profile_pictures/<?php echo $profile ?>"><p><?php echo $name ?>   &bull;</p></a>
            
              <?php
            }
        }else{
            echo "no admins";
        }


    ?>
       
            </div>
            <hr>
        </div>