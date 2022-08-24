<?php
// echo "hello";
require "db/db.php";
// $loggedin = true;

// if(!isset($_SESSION['email'])){
//     $loggedin = false;
//     header("location: login.php");
// }else{
//     $loggedin = true;
//     $online = $_SESSION['online'];
//     $email = $_SESSION['email'];
//     $id = $_SESSION['id'];
    
   
// }
require_once 'db/config.php';
if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
    header("location: login.php");
    die();
  }else{
if(isset($_SESSION['user_token'])){

$sql = "SELECT * FROM user_profile WHERE token = '{$_SESSION['user_token']}'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0){
    $userinfo = mysqli_fetch_assoc($result);
    
 }
}
else{
    $sql = "SELECT * FROM user_profile WHERE email = '{$_SESSION['email']}' ";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        $userinfo = mysqli_fetch_assoc($result);
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/css/img/logo.png">
    <style>
        #preload{
            background: #000 url(assets/css/img/loader.gif) no-repeat center center;
            background-size: 15%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 100;
        }
    </style>
    <title>Aggregate Agro</title>
</head>
<body>
    <div id="preload"></div>
    <?php
        include "assets/navbar/index.php";
    ?>
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load",function(){
            loader.style.display = "none";
        })
    </script>
</body>
</html>