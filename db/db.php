<?php
$server = "remotemysql.com";
$username = "YQuItX2V3A";
$password = "lhCbn4LxLJ";
$database = "YQuItX2V3A";

$con =  mysqli_connect($server, $username, $password,$database);

// Check connection
if (!$con) {
  die("Connection failed: " . $conn->connect_error);
}
?>