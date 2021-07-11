<?php
require 'connection.php';
$acc_no=$_REQUEST['id'];
$sql="DELETE FROM `bookdb` WHERE `acc_no`='$acc_no'";
if(mysqli_query($connect,$sql)){
    header('Location: index.html');
}
else
    echo "<script>alert('Record Deletion failed')</script>";
?>