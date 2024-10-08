<?php 
session_start();

    $news_id = $_GET['id'];

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$user_id = $user_data['user_id'];
    $user_name = $user_data['firstname'];

	$profile_pic = $user_data['pp'];

	if(!isset($_GET['id'])){
		header("Location: ./index.php");
	}

	
?>


<!DOCTYPE html>
<html lang="en">

<?php 
    require("./header.php");
?>

<body>
       
    <?php
        require("./system_arch/top_nav.php");
    ?>

    <?php
	$qry = "select * from news where id='$news_id'";
	$result = $con -> query($qry);
    // var_dump($result->fetch_assoc());
	if($result -> num_rows > 0){
            $result = mysqli_fetch_assoc($result);
			$title = $result['title'];
			$content = $result['content'];
			$video = $result['video'];
			$image = $result['image'];
			$url = $result['url'];
			$author_user_id = $result['user_id'];

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
            // check if viewed
            $sql = "select * from views where user_id='$user_id' and news_id='$news_id'";
            $res = mysqli_query($con, $sql);
            if($res -> num_rows > 0){
                while($row = $res->fetch_assoc()){
                    // echo "viewed";
                    
                }
            }else{
                $qry = "insert into views(user_id,news_id,date) values('$user_id','$news_id',null)";
                $result = mysqli_query($con, $qry);
                if($result){
                    // echo "just viewed";
                }else{
                    // echo "not viewed";
                }
            }

            $views = 0;
            //count views
            $sql = "select * from views where news_id='$news_id'";
            $res = mysqli_query($con, $sql);
            if($res -> num_rows > 0){
                while($row = $res->fetch_assoc()){
                   $views++;
            }
		}
	}

?>

    <div class="container play-container">
        <div class="row">
            <div class="play-video">
                <video  controls autoplay>
                    <source src="./files/videos/<?php echo $video ?>" type="video/mp4">
                    <source src="./files/videos/<?php echo $video ?>" type="video/avi">
                    <source src="./files/videos/<?php echo $video ?>" type="video/mkv">
                </video>

                <div class="tags">
                    <a href="">#Entreprenuers</a> <a href="">#billionaires</a> <a href="">#RatanTata</a> <a
                        href="">#werw</a>
                </div>
                <h3><?php echo $title ?></h3>
                <div class="play-video-info">
                    <p>
                        <?php 
                            echo $views;
                            if($views < 2){
                                echo " view";
                            }else{
                                echo " views";
                            }
                        ?>
                     &bull;</p>
                    <!-- <div>
                        <a href="http://"><img src="./images/like.png">488K</a>
                        <a href="http://"><img src="./images/dislike.png">5.9K</a>
                        <a href="http://"><img src="./images/share.png">SHARE</a>
                        <a href="http://"><img src="./images/save.png">SAVE</a>
                    </div> -->
                </div>
                <hr>
                <div class="owner">
                    <img src="./profile_pictures/<?php echo $author_profile_picture ?>">
                    <div>
                        <p><?php echo $author_name ?></p>
                        <!-- <span>19.4K subscribers</span> -->
                    </div>
                <?php 
                    if($user_id != $author_user_id){

                ?>
               
                    <button type="button" id="follow-btn">
                    <?php
                         $qry = "select * from follow where user_id='$user_id' and other_user_id='$author_user_id' or user_id='$author_user_id' and other_user_id='$user_id'"; 
                         $res = mysqli_query($con, $qry);
                         if($res->num_rows > 0){
                            echo "Following";
                         }else{
                            echo "Follow";
                         }
                    ?>
                    </button>

                    <?php
                    }

                ?>
                    <script>
                        let follow = document.getElementById("follow-btn");
                            follow.addEventListener("click", ()=>{
                                
                                $.ajax({
                                    type: "POST",
                                    url: "./system_arch/follow.php",
                                    data:{
                                        user_id: <?php echo $user_id ?>,
                                        author_id: <?php echo $author_user_id ?>
                                    },
                                    cache: false,
                                    success: function(data){
                                        console.log(data)
                                        
                                        if(data == 1){
                                            console.error("followed");
                                            follow.innerHTML = "Following";
                                        }else{
                                            follow.innerHTML = "Follow";
                                            console.error("unfollowed");
                                        }
                                    },
                                    error: function (err){
                                        console.log(err)
                                    }
                                })
                            })
                    </script>
                </div>

                <div class="vid-des">
                    <p>
						<?php
                            echo $content;
						?>
					</p>
                    <p>Subscribe to <?php echo $author_name ?></p>
                    <hr>
                    <div class="cmnt">
                        <!-- <h4>16,303 Commnets</h4> -->
                        <img src="./images/menu.png" alt="" srcset="">
                        <span>SORT BY</span>
                    </div>

                    <div class="add-cmnt">
                        <img src="./profile_pictures/<?php echo $profile_pic ?>" alt="" srcset="">
                        <input type="text" placeholder="Add a Public Comment">
                    </div>

                    <div class="old-cmnt">
                        <!-- Comment section-->
                    </div>


                </div>
                <hr class="hide-hr">


            </div>
            <div class="right-sidebar">
                <?php
					require("./system_arch/sidebar-posts.php");
				?>
            </div>
        </div>
    </div>




</body>

</html>