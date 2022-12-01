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

if(isset($_POST['update_req'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $dp = $_POST['dp'];
    $id = $_SESSION['sendfrom'];

    // $query = "INSERT INTO `request` ( `sendingid`, `receivingid`, `status`, `date`) VALUES ( '$sendingfrom', '$sendinto', 'pending', CURRENT_TIMESTAMP)";

    $query = "UPDATE `user_profile` SET `fullname` = '$name' WHERE `user_profile`.`id` = $id";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Requested Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Error'
        ];
        echo json_encode($res);
        return;
    }

}

?>