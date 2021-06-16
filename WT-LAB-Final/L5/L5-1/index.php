<?php
    date_default_timezone_set('Asia/Kolkata');
    if(isset($_COOKIE['Lastvisit'])){
        $display = "<h4>Your Last visit on : ".$_COOKIE['Lastvisit']."</h4>";
    }
    else
    $display = "<h4> This is your first visit!! </h4>";

    $lastDate = date("l jS \of F Y h:i:s A");
    setcookie("Lastvisit",$lastDate);
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
        <h3>Check Last Visit</h3>
        <?php echo $display; ?>
    </div>
</body>
</html>