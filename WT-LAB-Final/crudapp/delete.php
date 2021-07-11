<?php
include 'conn.php';
// delete sql query
$sql = "DELETE FROM users WHERE id = ?";

// prepare the sql statement
if($stmt = $mysqli->prepare($sql)){

    // bind the id of the record to be deleted
    // we use "i" here for integer
    $stmt->bind_param("i", $_GET['id']);

    // execute the delete statement
    if($stmt->execute()){
    
        // close the prepared statement
        $stmt->close();
                // redirect to index page
        // parameter "action=deleted" is used to show that something was deleted
       header('Location: index.php?action=deleted');
	   

    }else{
        die("Unable to delete.");
    }
}
?>
