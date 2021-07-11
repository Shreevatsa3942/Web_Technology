<?php
$server="localhost";
$username="root";
$password="";
$database="webtechnology";
$connect = mysqli_connect($server,$username,$password,$database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>