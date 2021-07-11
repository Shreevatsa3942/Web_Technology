<?php
require 'connection.php';
$sql="select * from bookdb";
$bookArray = array();
if($result = mysqli_query($connect,$sql)){
    
    while($row = mysqli_fetch_assoc($result)){
        $bookArray[]=$row;
    }
    if(sizeof($bookArray)>0){
        echo json_encode($bookArray);
    }
    else
        echo "0";
}

?>