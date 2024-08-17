<div class="list-container">
             <?php
                    $qry = "select * from news order by RAND() limit 8";
 
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
         
         <div class="vid-list">
           <a href="./watch_news.php?id=<?php echo $news_id?>"> <img src="./files/images/<?php echo $image ?>" class="thumbnail" ></a>
           <div class="flex-div">
               <div class="vid-info">
                   <a href="./watch_news.php?id=<?php echo $news_id?>"><?php echo $title ?></a>
                   <p><?php $content = substr($content, 0, 100);
                            echo $content;
						?></p>
                   <p> &bull; <?php echo $date ?></p>
               </div>
           </div>
       </div>



                <?php
                        }
                    }
                
                ?> 
        </div>