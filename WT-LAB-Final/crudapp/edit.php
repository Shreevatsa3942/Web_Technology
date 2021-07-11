<!DOCTYPE HTML>
<html>
    <head>
        <title>Update</title>
    </head>
<body>
<?php

include 'conn.php';
include 'auth.php';
?>
<h1>Update a Record</h1>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<a href="logout.php">Logout</a>
</div>
<?php

// if the form was submitted/posted, update the record
if($_POST){

    //write query
    $sql = "UPDATE users SET firstname = ?, lastname = ?, username = ?, password  = ? WHERE id= ?";
    
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('ssssi', $_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['id']);
        // execute the update statement
    if($stmt->execute()){
        echo "User was updated.";
        
        // close the prepared statement
        $stmt->close();
    }else{
        die("Unable to update.");
    }
}

$id=$_GET['id'];
/*
$sql = "SELECT id, firstname, lastname, username, password FROM users WHERE id =$id";

$result = $mysqli->query( $sql );
*/
$sql = "SELECT id, firstname, lastname, username, password FROM users WHERE id =?";
$stmt = $mysqli->prepare($sql);

    $stmt->bind_param('i', $id);
	$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$row = $result->fetch_assoc();

// php's extract() makes $row['firstname'] to $firstname automatically
extract($row);

//disconnect from database
$result->free();
$mysqli->close();

?>

<!--we have our html form here where new user information will be entered-->
<form action='edit.php?id=<?php echo $id; ?>' method='post' border='0'>
    <table>
        <tr>
            <td>Firstname</td>
            <td><input type='text' name='firstname' value='<?php echo $firstname;  ?>' /></td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td><input type='text' name='lastname' value='<?php echo $lastname;  ?>' /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type='text' name='username'  value='<?php echo $username;  ?>' /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' name='password'  value='<?php echo $password;  ?>' /></td>
        <tr>
            <td></td>
            <td>       
                <input type='hidden' name='id' value='<?php echo $id ?>' /> 
                <input type='submit' value='Edit' />
                <a href='index.php'>Back to index</a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
