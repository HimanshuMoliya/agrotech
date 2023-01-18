<?php
require "db/db.php";
// $loggedin = true;

require_once 'db/config.php';
if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
    header("location: login.php");
    // die();
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


echo $userinfo['uid']."<br>";
echo $userinfo['picture']."<br>";
echo $userinfo['token']."<br>";
echo $userinfo['email']."<br>";
echo $userinfo['fullname']."<br>";
echo $userinfo['occupation']."<br>";
echo $userinfo['phoneno']."<br>";
echo $userinfo['address']."<br>";
echo $userinfo['gender']."<br>";
echo $userinfo['age']."<br>";
echo $userinfo['workhour']."<br>";
echo $userinfo['approxsalary']."<br>"; 
?>