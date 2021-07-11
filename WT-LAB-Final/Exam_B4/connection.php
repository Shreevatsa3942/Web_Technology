<?php 
$server = "localhost";
$db = "mydb";
$username = "root";
$password = "";

$connect = mysqli_connect($server,$username,$password,$db);

if(!$connect)
    die("Connection failed: " . mysqli_connect_error());    
?>