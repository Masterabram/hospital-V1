<?php
session_start();
include("Connections/database_connection.php"); //Establishing connection with our database
 
$error = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{
	// echo '<pre>';
	// 	print_r($_POST);
	// echo '</pre>';
if(empty($_POST["username"]) || empty($_POST["password"]))
{
$error = "Both fields are required.";
}else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
 
// To protect from MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
//$password = ($password);
 
//Check username and password from database
$sql="SELECT * FROM staff WHERE username='{$username}' ";
$result=mysqli_query($connection, $sql);


//If username and password exist in our database then create a session.
//Otherwise echo error.
 
if($result)
{
$_SESSION['username'] = $login_user; // Initializing Session
header("location: reception.php"); // Redirecting To Other Page
}else
{
$error = "Incorrect username or password.";
}
 
}
}
 
?>