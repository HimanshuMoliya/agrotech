<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "aggrotech";

$con = mysqli_connect($server,$username,$password,$database);


if(!$con){
    die("Database connection error");
}


?>