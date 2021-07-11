<?php
require 'connection.php';
$acc_no=$_POST['acc_no'];
$title=$_POST['title'];
$author=$_POST['author'];
$edition=(int)$_POST['edition'];
$publisher=$_POST['publisher'];
$sql="UPDATE `bookdb` SET `title`='$title',`author`='$author',`edition`=$edition,`publisher`='$publisher' WHERE acc_no='$acc_no'";
if(mysqli_query($connect,$sql)){
    header('Location: index.html');
}
else
    echo "<script>alert('Record insertion failed')</script>";
?>