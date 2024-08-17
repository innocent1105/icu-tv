<?php
    include "../connection.php";
    include "../functions.php";
    // check request 
	if($_SERVER['REQUEST_METHOD'] != "POST"){
        echo "request required";
    }

    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);
    $category = strip_tags($_POST['category']);
    $url= strip_tags($_POST['link']);
    $tag = strip_tags($_POST['tag']);
    $user_id = $_COOKIE['ICU_acc'];
    
    $image_name = "";
    $video_name = "";

    $isset_video = false;
    $issset_img = false;


    if(isset($_FILES['video']['name']) AND !empty($_FILES['video']['name'])){
        $mime_types = ['video/mp4', 'video/avi', 'video/mov', 'video/mkv'];
        if(in_array($_FILES['video']['type'], $mime_types)){
            echo "format";
            if($_FILES['video']['size'] > 5 * 1024 * 1048576){
                echo "file is too large";
            }else{
                $pathInfo = pathinfo($_FILES['video']['name']);
                $base = $pathInfo['filename'];
                $base = preg_replace("/[^\w-]/", "_", $base);
            
            
                $filename = uniqid($base) . "." . $pathInfo['extension'];
                $destination = "../files/videos/" . $filename;
            
               if(!move_uploaded_file($_FILES['video']['tmp_name'], $destination)){
                    echo "failed to upload";
               }else{
                $video_name = $filename;
                echo "uploaded";
                $isset_video = true;
                
               }
            }
        }else{
            echo "unsupported format";
        }
    }else{
        echo "no video uploaded";
    }




    // image

    if(isset($_FILES['image']['name']) AND !empty($_FILES['image']['name'])){
        $mime_types = ['image/webp', 'image/jpeg', 'image/jpg', 'image/png'];
        if(in_array($_FILES['image']['type'], $mime_types)){
            echo "format";
            if($_FILES['image']['size'] > 1024 * 1048576){
                echo "file is too large";
            }else{
                $pathInfo = pathinfo($_FILES['image']['name']);
                $base = $pathInfo['filename'];
                $base = preg_replace("/[^\w-]/", "_", $base);
            
            
                $filename = uniqid($base) . "." . $pathInfo['extension'];
                $destination = "../files/images/" . $filename;
            
               if(!move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
                    echo "failed to upload";
               }else{
                $image_name = $filename;
                echo "uploaded";
                $issset_img = true;
               }
            }
        }else{
            echo "unsupported format";
        }
    }else{
        echo "no image uploaded";
    }

    echo $video_name . "<p> and image is " . $image_name;

    // database update

    if($isset_video && $issset_img){
            $qry = "insert into news (id, user_id, title, content, tag, mention, url, video, image, date) values ('null', '$user_id', '$title', '$content', '$tag', '$category', '$url', '$video_name', '$image_name', null)";     
            $result = mysqli_query($con, $qry);

        if($result){
            $msg = "Posted successful.";
            echo "<br>successfull";
            header("Location: ../index.php?" . $msg);
        }else{
            echo "error - did not upload";
            $msg = "error - did not upload.";
            header("Location: ../system_arch/news_post.php?" . $msg);
        }
    }else{
        echo "No video or image uploaded";
    }
    
?>