<?php 
  require_once('Connections/database_connection.php'); 
  include_once('includes/functions.php');
?>

<?php
  if(isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    echo "<pre>";
    $surname = $_POST['sname1'];
    $other_name = $_POST['name2'];
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
    $payrate = $_POST['payrate'];
    $qualification = $_POST['qualification'];
    $workhrs = $_POST['workhrs'];
    $preferance = $_POST['preferance'];

    mysqli_select_db($connection, $database) or die(mysql_error());

    $query = "INSERT INTO staff( ";
    $query .= "sname, othername, dob, sex, email, username, password, contact, altcontact, level, ";
    $query .= "experience, depertment, payrate, qualification, workhrs, Prefrance) VALUES( ";
    $query .= "'{$surname}', '{$other_name}', '{$dob}', '{$sex}', '{$email}', '{$username}', '{$password}', '$contact', '$altcontact', '$level', ";
    $query .= " '{$experience}', '{$depertment}', '$payrate', '{$qualification}', '{$workhrs}', '{$preferance}' ";
    $query .= ") ";

    $result =  mysqli_query($connection, $query);
    confirm_query($result);


  }
?>


<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
<meta charset="utf-8">
<title>Add Staff</title>
</head>

<body>

<div class="panel" id="adminpanel" style="height:50px; width:1100px; margin:20px; border-color:#333">
Welcome to Huduma centre

</div>

<div class="navbar-header" id="navbar" style="height:50px; width:1100px; background-color:#0FF; margin:20px;">
			<ul class="nav nav-tabs" role="tablist">
  <li><a href="#index.php" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-home"></span></a></li>
  <li><a href="reception.php" role="tab" data-toggle="tab">Reception</a></li>
  <li><a href="visitque.php" role="tab" data-toggle="tab">Nurse</a></li>
  <li><a href="doctor.php" role="tab" data-toggle="tab">Doctors</a></li>
  <li><a href="lab.php" role="tab" data-toggle="tab">Laboratories</a></li>
  <li><a href="phermacy.php" role="tab" data-toggle="tab">Phermercy</a></li>
  <li><a href="staff.php" role="tab" data-toggle="tab">+Add Staff</a></li>
  <li><a href="patient_list.php" role="tab" data-toggle="tab">Patient System</a></li>
   <li><a href="appbook.php" role="tab" data-toggle="tab">Booked Appointment</a></li>
</ul>
     
	
</div>

<div class="container" style="margin:10px; width:1100px; height:50px auto;">

	<div class="container" style="width:280px; float:left; border-right-color:#000; height:10px auto">help
    
    
    </div>
      <div class="panel" style="margin-right:10px; border:#000; width:720px; float: right; border-right-color: #000; height: 10px auto; margin-right: 9px;">
      <form id="addstaff" name="addstaff" method="POST" action="addstaff.php">
        <table width="550" border="0">
          <tr>
            <td width="506">Staff Details:</td>
          </tr>
          <tr>
            <td><table width="450" height="33" border="0">
              <tr>
                <td width="218"><p>Surname:</p>
                <p>
                  <input name="sname1" type="text" class="StyleTextField" id="surname">
                </p></td>
                <td width="216"><p>Other Names:</p>
                <p>
                  <input name="name2" type="text" class="StyleTextField" id="othername">
                </p></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><p>Date of birth: </p>
            <p>
              <input name="dob" type="text" class="StyleTextField" id="dob"> 
              mm/dd/yyy
            </p></td>
          </tr>
          <tr>
            <td><p>Sex:</p>
              <p>
  <select name="sex" class="dropdown-toggle">
    <option>Sex</option>
    <option value="F">Female</option>
    <option value="M">Male</option>
  </select>
            </p></td>
          </tr>
          <tr>
            <td><p>Email:
 </p>
              <p>
  <input name="email" type="email" required class="StyleTextField" id="email" >
            </p></td>
          </tr>
          <tr>
            <td><table width="511" border="0">
              <tr>
                <td width="176"><p>Username:
 </p>
                  <p>
  <input name="username" type="text" class="StyleTextField" id="textfield3">
                </p></td>
                <td width="227"><p>Password:
 </p>
                  <p>
  <input name="password" type="password" required class="StyleTextField" id="password">
                </p></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="104"><table width="507" border="0">
              <tr>
                <td width="213"><p>Contact:</p>
                  <p>
                    <input name="contact" type="tel" class="StyleTextField" id="tel2">
                </p></td>
                <td width="278"><p>Alternative Contact:</p>
                  <p>
                    <input name="altcontact" type="tel" class="StyleTextField" id="tel">
                </p></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>Level;
            		<select name="level" class="dropdown-toggle" required>
            					<option disabled>--Access Levels--</option>
                                <option value="0">Reception</option>
                                <option value="1" selected>Nurse</option>
                                 <option value="2">Doctor</option>
                                  <option value="3">Lab Technician</option>
                                   <option value="4">Pharmacist</option>
                                    <option value="5">Administrator</option>
            </select>
            
            </td>
          </tr>
          <tr>
            <td>Expirience:
             <p>
                <textarea name="experience" id="Exp"></textarea>
            </p>
            </td>
          </tr>
          <tr>
            <td><table width="496" height="28" border="0">
              <tr>
                <td width="261"><p>Depertment:</p>
                  <p>
  <select name="depertment" class="dropdown-toggle" id="depertment" required>
    <option>NUrse</option>
    <option>Receptionist</option>
    <option>Doctor</option>
    <option>Laboratory Assistant</option>
    <option>Phermacist</option>
    <option>Admin</option>
  </select>
                  </p>
                </td>
                <td width="225"><p>Pay rate : </p>
                <p>
                  <input type="number" name="payrate" id="pay">
                Kshs</p></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><p>Qualification:
                </p>
              <p>
                <textarea name="qualification" id="qualification"></textarea>
            </p></td>
          </tr>
          <tr>
            <td><table width="471" border="0">
              <tr>
                <td width="236">Working Hours: 
                		<select name="workhrs" class="dropdown-toggle" required>
            					<option value="4">4 hours</option>
                      <option value="6">6 hours</option>
                      <option value="8">8 hours</option>
                      <option value="12">12 hours</option>
                      <option value="16">16 hours</option>           
                    </select>
                </td>
                <td width="219">Prefrance:
                		<select name="preferance" class="dropdown-toggle" required>
            					<option value="D/N">Day/Night</option>
                                <option value="D">Day</option>
                                <option value="N">Night</option>
                                
   				  </select>
                </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="449" border="0">
              <tr>
                <td width="138">&nbsp;</td>
                <td width="105"><input name="submit" class="StyleTextField" type="submit"></td>
                <td width="184">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="addstaff">
      </form>
       <script>
            CKEDITOR.replace( 'Exp' );
                              </script>
       <script>
            CKEDITOR.replace( 'qualification' );
                              </script>                        
      
  </div>

</div>
</body>
</html>
 <?php
mysqli_close($connection);
?>