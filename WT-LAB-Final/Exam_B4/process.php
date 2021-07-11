<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require "connection.php";
$empid = $_POST['empid'];
$empid = $empid;
//echo $empid;
$sql = "SELECT * FROM `employee` WHERE `empid` ='$empid'";

$display="";
if($data = mysqli_query($connect,$sql)){
    $display.="<form>";
    if($row = mysqli_num_rows($data) > 0){
        while($row = mysqli_fetch_assoc($data)){
            $display.= "<label>Employee ID: </label>".$row['empid']."<br><label>Employee Name: </label>".$row['empname']."<br><label>Phone Number: </label>".$row['phone']."<br>";
        }
        $display.= "</form>";      
        echo $display;
    }
    else
    echo "<script>alert('no records')</script>";
}

?>
</body>
</html>