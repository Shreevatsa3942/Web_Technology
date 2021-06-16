
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
        <h3>Select a JSON file</h3>
        <form action="index.php" method="get">
            <input type="file" name="file1" id="file1">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    <?php
        if(isset($_GET['submit'])&&$_GET['file1']){ 
        $filename = $_GET['file1'];
        $data = file_get_contents($filename);
        $users = json_decode($data,true);
        $count=0;
    ?> 
    <table>
        <tr>
        <?php
        
        foreach($users as $key){
            $count++; 
            if($count == 2) 
                break;
        ?>
        <tr>
            <?php
             foreach($key as $i=>$value){?>
                 <th><?=$i;?></th>
             <?php } ?>
        </tr>    
        <?php } ?>
        </tr>
        <tr>
        <?php
        foreach($users as $key){?>
        <tr>
            <?php
             foreach($key as $i){?>
                 <td><?=$i;?></td>
             <?php } ?>
        </tr>    
        <?php } }?>
        </tr>
        
    </table>
</body>
</html>