<?php
    $connect = mysqli_connect("localhost", "root", "", "shopping");
    if (mysqli_connect_error()){
        echo "DB Connect error";
    }
?>