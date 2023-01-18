<?php
// $server = "remotemysql.com";
// $username = "YQuItX2V3A";
// $password = "lhCbn4LxLJ";
// $database = "YQuItX2V3A";

$server = "localhost";
$username = "root";
$password = "";
$database = "aggrotech";

$con = mysqli_connect($server,$username,$password,$database);


if(!$con){
    die("Database connection error");
}


?>