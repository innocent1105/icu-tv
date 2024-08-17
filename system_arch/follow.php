<?php 
    require("../connection.php");
    require("../functions.php");
    $author = $_POST['author_id'];
    $user = $_POST['user_id'];


    // echo $user;
    // echo " " . $author;

    $qry = "select * from follow where user_id='$user' and other_user_id='$author' or user_id='$author' and other_user_id='$user'"; 
    $res = mysqli_query($con, $qry);

    if($res-> num_rows > 0){
        // echo "following";
        $qry = "delete from follow where user_id='$user' and other_user_id='$author'";
        $result = mysqli_query($con, $qry);
        if($result){
            echo "unfollowed";
        }else{
            echo mysqli_error($con);
        }
    }else{
        // echo "not following";
        $sql = "insert into follow (user_id, other_user_id) values('$user','$author')";
        $res = mysqli_query($con, $sql);
        if($res){
            echo 1;
        }else{
            echo mysqli_error($con);
        }
    }

?> 