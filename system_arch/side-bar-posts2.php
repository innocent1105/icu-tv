<div class="list-container">
             <?php
                    $qry = "select * from news limit 10";

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

                <div class="side-video-list">
                    <a href="./watch_news2.php?id=<?php echo $news_id?>" class="small-thumbnail"> <img src="./files/images/<?php echo $image ?>" alt="" srcset=""></a>
                    <div class="vid-info">
                        <a href="./watch_news.php?id=<?php echo $news_id?>"> <?php echo $title ?></a>
                        <p><?php
                            $content = substr($content, 0, 95);
                            echo $content;
                        ?></p>
                    </div>
                </div>


                <?php
                        }
                    }
                
                ?> 
        </div>









