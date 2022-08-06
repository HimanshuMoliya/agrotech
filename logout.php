<?php

require "db/db.php";
session_start();

// if(!isset($_SESSION['online'])){
//     $loggedin = false;
    
//     // header("location: login.php");
//     // exit;
// }else{
//     $loggedin = true;
//     $online = $_SESSION['online'];
//     $email = $_SESSION['email'];
//     $id = $_SESSION['id'];
//     $online_query = "UPDATE `user_profile` SET `is_online` = '0' WHERE `user_profile`.`id` = $id";
//     $result_query = mysqli_query($con,$online_query);
// }

session_unset();
session_destroy();
header("location: index.php");
die();
?>