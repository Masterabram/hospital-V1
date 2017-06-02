<?php

session_start();
 
  require_once('Connections/database_connection.php'); 
  include_once('includes/functions.php');
?>

<?php
  if(isset($_POST['submit'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "<pre>";

    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact =(int) $_POST['contact'];
    $altcontact =(int) $_POST['altcontact'];
    $level =(int) $_POST['level'];
    $experience = $_POST['experience'];
    $depertment = $_POST['depertment'];
    $qualification = $_POST['qualification'];
    $workhrs = $_POST['workhrs'];
    $preferance = $_POST['preferance'];

    mysqli_select_db($connection, $database) or die(mysql_error());

    $query = "INSERT INTO staff( ";
    $query .= "name, dob, contact, altcontact, sex, email, username, password, depertment,  ";
    $query .= "level, experience, qualification, workhrs, Prefrance) VALUES( ";
    $query .= "'{$name}', '{$dob}', '$contact', '$altcontact', '{$sex}', '{$email}', '{$username}', '{$password}', '{$depertment}',  ";
    $query .= "'$level', '{$experience}', '{$qualification}', '{$workhrs}', '{$preferance}' ";
    $query .= ") ";

    $result =  mysqli_query($connection, $query);
    confirm_query($result);


  }
?>



<!doctype html>
<html>
<head>
<title>staff Registration</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main1">
<form method="POST" action="registration.php">
<div id="reg1">
<label>NAME:*</label>
<input id="name" name="name" placeholder="full names" type="text" required>
<label>DATE OF BIRTH :*</label>
<input id="dob" style="width: 99.9%; height: 8.5%" name="dob" placeholder="DOB" type="date" required>
<label>CONTACT /MOBILE No:*  <br /></label>
<input id="contact" name="contact" placeholder="CONTACT" type="text" requirede>
<label>ALTERNATIE CONTACT:*</label>
<input id="altcontact" name="altcontact" placeholder="ALTER CONTACT" type="text">
<label>Sex:*</label>
<select name="sex">
    <option>Sex</option>
    <option value="F">Female</option>
    <option value="M">Male</option>
  </select>
<label>ALTERNATIE CONTACT:*</label>
<input id="email" name="email" placeholder="email" type="email">  
</div>

<div id="reg2">
<label>USERNAME:</label>
<input id="username" name="username" placeholder="username" type="text" required>
<label>PASSWORD:</label>
<input id="password" name="password" placeholder="**********" type="password" required>
<label>DEPERTMENT:</label>
			<select name="depertment" class="dropdown-toggle" id="depertment" required>
			    <option value="Nurse">Nurse</option>
			    <option value="Reception">Receptionist</option>
			    <option value="Doctor">Doctor</option>
			    <option value="Lab tech">Laboratory Assistant</option>
			    <option value="phermacy">Phermacist</option>
			    <option value="Management">Admin</option>
			  </select>
<label>USER LEVEL:</label>
		<select name="level" required>
            					<option disabled>--Access Levels--</option>
                                <option value="0">Reception</option>
                                <option value="1">Nurse</option>
                                <option value="2">Doctor</option>
                                <option value="3">Lab Technician</option>
                                <option value="4">Pharmacist</option>
                                <option value="5">Administrator</option>
  		</select>


<input name="submit" class="btn btn-primary btn-lg" type="submit" value=" Register  ">
</div>

<div id="reg3">
<form action="" method="post">
<label>Expirience :</label>
<textarea name="experience" id="Exp"></textarea>
<label>Qualification :</label>
<textarea name="qualification" id="qualification"></textarea>
<label>Working Hours :</label>
					<select name="workhrs" required>
            		<option value="4">4 hours</option>
                      <option value="6">6 hours</option>
                      <option value="8">8 hours</option>
                      <option value="12">12 hours</option>
                      <option value="16">16 hours</option>           
                    </select>
<label>Preference :</label>
 					<select name="preferance" required>
            					<option value="D/N">Day/Night</option>
                                <option value="D">Day</option>
                                <option value="N">Night</option>
   				  </select>                   
</div>
</form>
</div>
</body>
</html>