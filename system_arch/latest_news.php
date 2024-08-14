<div class="news-tab">
             <?php
                    $qry = "select * from news limit 4";

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
            <a href="./watch_news.php?id=<?php echo $news_id; ?>">
                <div class="news">
                    
                    <div class="img-area">
                        <img src="./files/images/<?php echo $image ?>" alt="<?php echo $image ?>">
                    </div>
                    <div class="title-area">
                        <?php echo $title; ?> weihfeiuw kjbwkjebhwe wjebdkuwekh wiebdiuwebdkjw edibweiudbwe
                    </div>
                    <div class="date-area">
                        <?php echo $date ?>
                    </div>
                    <div class="read-btn">
                        Watch now
                    </div>
                </div>
            </a>

                <?php
                        }
                    }
                
                ?> 
        </div>