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
    $sendinto = $_SESSION['sendto'];
    $sendingfrom = $_SESSION['sendfrom'];

    $select = "SELECT * FROM user_profile WHERE id=$sendingfrom";
    $result = mysqli_query($con,$select);
    $row = mysqli_fetch_assoc($result);
    

    $query = "INSERT INTO `request` ( `sendingid`, `receivingid`, `status`,`fullname`,`picture`,`occupation`, `address`,`date`) VALUES ( '$sendingfrom', '$sendinto', 'pending','{$row['fullname']}','{$row['picture']}','{$row['occupation']}','{$row['address']}', CURRENT_TIMESTAMP)";
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