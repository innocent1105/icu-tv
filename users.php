<?php

require("./connection.php");
require("./functions.php");
$sql = "select * from users";
$res = mysqli_query($con, $sql);

if($res -> num_rows > 0){
    while($row = $res -> fetch_assoc()){
        echo $row['user_type'];
    }
}