<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Technology</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="main">
<h1>Edit Book</h1>

<?php 
require('connection.php');
$acc_no=$_REQUEST['id'];
$sql="SELECT * FROM `bookdb` WHERE `acc_no`='$acc_no'";
if($result = mysqli_query($connect,$sql)){
    
    $row = mysqli_fetch_assoc($result);
?>
        <form method="POST" action="update.php">
            <input type="text" name="acc_no" id="acc_no" placeholder="Enter Accession Number" value="<?=$row['acc_no'];?>" hidden><br>
            <label for="acc_no">Book title: </label>
            <input type="text" name="title" id="title" placeholder="Enter Book Title"  value="<?=$row['title'];?>" required><br>
            <label for="acc_no">Author: </label>
            <input type="text" name="author" id="author" placeholder="Enter Author name" value="<?=$row['author'];?>"  required><br>
            <label for="acc_no">Edition: </label>
            <input type="text" name="edition" id="edition" placeholder="Enter the Book Edition" value="<?=$row['edition'];?>"  required><br>
            <label for="acc_no">Book Publisher: </label>
            <input type="text" name="publisher" id="publisher" placeholder="Enter the Publisher" value="<?=$row['publisher'];?>" required><br>
            <button type="button" id="back">Back</button>
            <button type="submit" id="submit">Submit</button>
        </form>
<?php 
}
?>
    </div>
    <script>
        var btnBack=document.getElementById("back");
        
        btnBack.addEventListener('click',function(){
            location.href="index.html";
        })
    </script>
</body>
</html>