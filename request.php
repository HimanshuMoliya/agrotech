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

// if(isset($_POST['acc_inp'])){
    $acc_inp = $_POST['acc_inp'];
    $rej_inp = $_POST['rej_inp'];
    
    // $dp = $_POST['dp'];

    // $query = "INSERT INTO `request` ( `sendingid`, `receivingid`, `status`, `date`) VALUES ( '$sendingfrom', '$sendinto', 'pending', CURRENT_TIMESTAMP)";

    // if($name = NULL AND $approxsalary = NULL AND $address = NULL AND $gender = NULL AND $age = NULL AND $workhour = NULL){
        
    //     $query = "UPDATE `user_profile` SET  `address` = NULL  WHERE `user_profile`.`id` = $id";
    //     $query_run = mysqli_query($con, $query);
    
    //     if($query_run)
    //     {
    //         $res = [
    //             'status' => 200,
    //             'message' => 'Requested Successfully'
    //         ];
    //         echo json_encode($res);
    //         return;
    //     }
    //     else
    //     {
    //         $res = [
    //             'status' => 500,
    //             'message' => 'Error'
    //         ];
    //         echo json_encode($res);
    //         return;
    //     }
    // }else{
        
        $query = "UPDATE `request` SET `status` = 'accept' WHERE `sendingid` = $acc_inp AND `receivingid` = $rej_inp";
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
    // }


// }

// $id = $_SESSION['sendfrom'];
// $query = "UPDATE `user_profile` SET `gender` = 'male' WHERE `user_profile`.`uid` = $id";
// $query_run = mysqli_query($con, $query);
// if($query_run){
//     echo 'updated';
// }else{
//     echo "error";
// }

?>