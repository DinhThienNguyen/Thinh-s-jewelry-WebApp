<?php
    $host = "localhost";
    $username = "user";
    $password = "";
    $database = "jewelry";
            
    $connect = mysqli_connect($host, $username, $password, $database);
    $connect->set_charset("utf8");
?>