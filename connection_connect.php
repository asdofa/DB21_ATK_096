<?php

    $severname = "localhost";
    $username = "db21_096";
    $password ="db21_096";
    $dbname = "db21_096";
    $conn = new mysqli($severname,$username,$password);
    mysqli_set_charset($conn, "utf8");//โซนเวลา
    if($conn->connect_error)
    {
        die("Connection failed: ".$conn->connect_error);
    }
    if(!$conn->select_db($dbname))
    {
        die("Connection failed: ".$conn->connect_error);
    }
    
?>
