<?php
<<<<<<< HEAD
// $server = "remotemysql.com";
// $username = "YQuItX2V3A";
// $password = "lhCbn4LxLJ";
// $database = "YQuItX2V3A";

=======
>>>>>>> 49d06184bb9de188ba93773e02499eda0819894a
$server = "localhost";
$username = "root";
$password = "";
$database = "aggrotech";

$con = mysqli_connect($server,$username,$password,$database);


if(!$con){
    die("Database connection error");
}


?>