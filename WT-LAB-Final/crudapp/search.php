<?php
//provide your hostname, username and dbname
include 'conn.php';
include("auth.php");
$user_name = $_POST['username'];
$sql = "select firstname, lastname, username from users where firstname LIKE '$user_name%'";
$result = mysqli_query($mysqli, $sql);
while($row = mysqli_fetch_array($result))
{
echo "<p>".$row['firstname']." ".$row['lastname']."</p>";
}
?>
