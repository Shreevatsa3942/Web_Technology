<!DOCTYPE HTML>
<html>
    <head>
        <title>Create Record</title>
    
    </head>
<body>

<h1>Add a Record</h1>
<div>
<p>Welcome <?php     
include 'conn.php';
//include 'auth.php'; 
if(isset($_SESSION['username']))
echo $_SESSION['username']; ?>!</p>
<p>This is secure area.</p>

<a href="logout.php">Logout</a>
</div>
<?php
$action = isset($_POST['action']) ? $_POST['action'] : "";

if($action=='create'){
	//File upload
    if(isset($_FILES['image']))
{       
$errors= array();       
$file_name = $_FILES['image']['name'];  
$file_size = $_FILES['image']['size'];  
$file_tmp = $_FILES['image']['tmp_name'];   
$file_type = $_FILES['image']['type'];    
$temp=explode('.',$_FILES['image']['name']);          
$file_ext=end($temp);          
$expensions= array("jpeg","jpg","png"); 
      
if(in_array($file_ext,$expensions)=== false){          
$errors[]="extension not allowed, please choose a JPEG or PNG file."; }       if($file_size > 2097152) {          
       $errors[]='File size must be less than 2 MB'; 
	   }       
	   if(empty($errors)==true) {         
	   move_uploaded_file($file_tmp,"images/".$file_name);          
	   echo "Success"; 
	   echo "<ul> <li>Sent file: ".$file_name."     
	              <li>File size: ".$file_size."             
				  <li>File type:".$file_type."          
		      </ul>"; 
	  }else{  
	  print_r($errors);
	  }  
        //write query
        $query = "INSERT INTO users SET firstname = ?, lastname = ?, username = ?, password  = ?, profilepic=?";
$pass=$_POST['password'];
$pic="images/".$file_name;
        //prepare query for excecution
        $stmt = $mysqli->prepare($query);
$stmt->bind_param('sssss', $_POST['firstname'], $_POST['lastname'], $_POST['username'],$pass,$pic);
        
        // Execute the query
        if($stmt->execute()){
        
            echo "Record was saved.";
        }else{
            die('Unable to save record.');
        }     
 }   
}

?>

<!--we have our html form here where user information will be entered-->
<form action='#' method='post' border='0' enctype="multipart/form-data">
    <table>
        <tr>
            <td>Firstname</td>
            <td><input type='text' name='firstname' /></td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td><input type='text' name='lastname' /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type='text' name='username' /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' name='password' /></td>
		<tr>
            <td>Upload Profile Picture</td>
            <td><input type='file' name='image' /></td>
        <tr>
            <td></td>
            <td>
                <input type='hidden' name='action' value='create' />
                <input type='submit' value='Save' />
                
                <a href='index.php'>Back to index</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
