<?php
include('Connections/database_connection.php');
session_start();
$user_check=$_SESSION['username'];
 
$sql = mysqli_query($connection,"SELECT username FROM staff WHERE username='$user_check' ");
 
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
 
$login_user=$row['username'];
 
if(!isset($user_check))
{
header("Location: loginindex.php");
}
?>