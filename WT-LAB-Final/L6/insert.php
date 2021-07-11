<?php
require 'connection.php';
$acc_no=$_POST['acc_no'];
$title=$_POST['title'];
$author=$_POST['author'];
$edition=(int)$_POST['edition'];
$publisher=$_POST['publisher'];
$sql="INSERT INTO `bookdb`(`acc_no`, `title`, `author`, `edition`, `publisher`) VALUES ('$acc_no','$title','$author',$edition,'$publisher')";
if(mysqli_query($connect,$sql)){
    header('Location: index.html');
}
else
    echo "<script>alert('Record insertion failed')</script>";
?>