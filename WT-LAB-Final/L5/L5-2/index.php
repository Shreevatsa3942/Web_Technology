<?php
    session_start();
    if(isset($_SESSION['visits'])){
        $_SESSION['visits']++;
    }
    else
        $_SESSION['visits'] = 0;
    
    //$_SESSION['visits'] = 0;
    $display = $_SESSION['visits'];
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Technology</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <h3>Number of visits : </h3>
        <?php echo $display; ?>
    </div>
</body>
</html>