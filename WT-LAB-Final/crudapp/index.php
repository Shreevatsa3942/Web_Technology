<!DOCTYPE HTML>
<html>
    <head>
        <title>Read Records</title>
    </head>
<body>
<?php
include("auth.php");
?>
<h1>Read Records</h1>
<div>
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is secure area.</p>

<a href="logout.php">Logout</a>
</div>
<?php

include 'conn.php';
if(isset($_GET['action']))
$action=$_GET['action'];
else $action="";
//if the user clicked ok, run our delete query
if($action=='deleted'){
    echo "User was deleted.";
}

$query = "select * from users";
$stmt = $mysqli->prepare($query);

   
	$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
//$result = $mysqli->query( $query );

$num_results = $result->num_rows;

echo "<div><a href='add.php'>Create New Record</a></div>";

if( $num_results ){
    echo "<table border='1'>";

        echo "<tr>";
            echo "<th>Firstname</th>";
            echo "<th>Lastname</th>";
            echo "<th>Username</th>";
			echo "<th>Profile Picture</th>";
            echo "<th>Action</th>";
        echo "</tr>";


    while( $row = $result->fetch_assoc() ){
    
        //extract row
        //this will make $row['firstname'] to just $firstname only
        extract($row);

        //creating new table row per record
        echo "<tr>";
            echo "<td>{$firstname}</td>";
            echo "<td>{$lastname}</td>";
            echo "<td>{$username}</td>";
			echo "<td>
			<img height='100px' width='100px' src=\"{$profilepic}\"/>
			</td>";
			?>
			<?php
            echo "<td>";
                echo "<a href='edit.php?id={$id}'>Edit</a>";
                //echo " / ";
                
                // delete_user is a javascript function, see at the bottom par of the page
                echo "<a href='#' onclick='delete_user( {$id} );'>Delete</a>";
            echo "</td>";
        echo "</tr>";
    }
    //end table
    echo "</table>";
}
//if table is empty
else{
    echo "No records found.";
}
$result->free();
$mysqli->close();
?>

<script type='text/javascript'>
function delete_user( id ){

    var answer = confirm('Are you sure?');

    //if user clicked ok
    if ( answer ){ 
        //redirect to url with action as delete and id to the record to be deleted
        window.location = 'delete.php?id=' + id;
    }
}
function user_suggestion()
{
var user = document.getElementById("user").value;
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "username=" + user;
     xhr.open("POST", "search.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
       //alert(xhr.responseText);	   
	  document.getElementById("suggestion").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
	}
}
</script>

<h1>Search User Record</h1>
<div>
<form>
	<br/><br/>
		<label for="book">Search User </label>
		<div>
		<input type="text" id="user" onKeyUp="user_suggestion()">
		<div id="suggestion"></div>
		</div>
		<!--<input name="submit" type="submit" value="Submit" />-->
	</form>
</div>	
</body>
</html>
