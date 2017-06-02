<?php
    require_once('Connections/database_connection.php');
    include_once('includes/functions.php'); 
?>
<?php
    if(isset($_POST['submit'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "<pre>";

      $name = $_POST['name'];
      $tel = $_POST['tel'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $date = $_POST['date'];
      $sex = $_POST['sex'];
      $status = $_POST['status'];
      $time = $_POST['time'];
      $prbdesc = $_POST['prbdesc'];
      $age = (int) $_POST['age'];
      $dcr = $_POST['dcr'];

       mysqli_select_db($connection, $database) or die(mysql_error());

    $query = "INSERT INTO bookappointment( ";
    $query .= "name, tell, email, address, date, sex,  ";
    $query .= "status, time, problemcat, age, problemdsc) VALUES( ";
    $query .= "'{$name}', '{$tel}', '{$email}', '{$address}', '{$date}', '{$sex}',  ";
    $query .= "'{$status}', '{$time}', '{$prbdesc}', '$age', '{$dcr}' ";
    $query .= ") ";

    $result =  mysqli_query($connection, $query);
    confirm_query($result);

    $_SESSION['message'] = "your appointment has been created succesfully";

    redirect_to ( 'index.php');

    }
?>


<!doctype html>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/content.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.css" rel="stylesheet" text="text/css" />
<script src="//cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
<meta charset="utf-8">
<title>Book appointment</title>
</head>

<body>
<?php
$viewer = getenv("HTTP_USER_AGENT");
$browser = "An Unidentified browser";
	if (preg_match( "/MSIE/i" , "$viewer"))
			{
				$browser = "Internet Explorer";
				}
			else if( preg_match( "/Mozilla/i","$viewer"))
			{
				$browser = "Mozilla";
				}
			else if( preg_match( "/Netscape/i","$viewer"))
			{
				$browser = "Netscape";
				}	
				
$platform = "An unidentified OS";
	if (preg_match ("/Linux/i","$viewer"))
		{
			$platform = "Linux";
			}
			
	else if (preg_match ("/Windows/i","$viewer"))
		{
			$platform = "Windows";
			}
			
	
						
?>


<div id="holder" >

</div>


    
<div style="width:650px; height:770px; margin-left:200px; margin-right:200px;"  > 
   <form style="appearance:pop-up-menu; text-outline:#000; height:700px" class="form-control" method="POST" ACTION="bookapp.php">
   
	 <table width="447" border="0" align="center" cellpadding="5" cellspacing="5" >
  <tr>
    <td height="40"><table width="440" border="0">
      <tr>
          <td width="215"><span class="label label-info">Full names</span></td>
          <td width="215"><input name="name" type="text" class="StyleTextField1" id="name" placeholder="full names" maxlength="50"></td>
        </tr>
  </table></td>
  </tr>
  <tr>
    <td height="39"><table width="441" border="0">
      <tr>
        <td width="217"><span class="label label-info">Tell</span></td>
        <td width="214"><input name="tel" type="tel" class="StyleTextField1" id="tel" placeholder="mobile number"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="37"><table width="441" border="0">
      <tr>
          <td width="217"><span class="label label-info">Email</span></td>
          <td width="214"><input name="email" type="email" class="StyleTextField1" id="email" placeholder="email address"></td>
        </tr>
  </table></td>
  </tr>
  <tr>
    <td height="38"><table width="441" border="0">
      <tr>
          <td width="216"><span class="label label-info">Address:</span></td>
          <td width="215"><input name="address" type="text" class="StyleTextField1" id="address" placeholder="address"></td>
        </tr>
  </table></td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
  </tr>
  <tr>
    <td height="39"><table width="439" border="0">
      <tr>
          <td width="213"><span class="label label-info">Expected date of visit</span></td>
          <td width="210"><input name="date" type="date" class="StyleTextField1" id="date"></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="37"><table width="441" border="0">
      <tr>
        <td width="217"><span class="label label-info">Sex</span> <select name="sex" class="dropdown">
          					<option class="active">Sex</option>
                            <option value="MALE">M</option>
                            <option value="FEMALE">F</option>
                            </select></td>
        <td width="214"> <span class="label label-info">Status</span> <select name="status" class="dropdown">
          					<option class="active">Marital Status</option>
                            <option value="single">Single</option>
                            <option value="Married">Married</option>
                            </select></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
  </tr>
  <tr>
    <td height="48"><label for="time"><br>
    </label>
      <table width="441" border="0">
        <tr>
          <td width="216"><span class="label label-info">Expected visit time</span></td>
          <td width="215"><input name="time" type="time" class="StyleTextField1" id="time"></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="38"><table width="441" border="0">
        <tr>
          <td width="213"><span class="label label-info">Problem Description</span></td>
          <td width="212"><select name="prbdesc" class="dropdown" >
          					<option class="active">Medical</option>
                            <option value="Emotional">Emotional</option>
                            <option value="Mental">Mental</option>
                            <option value="councelling">Councelling</option>
          					</select></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="40"><table width="441" border="0">
      <tr>
        <td width="213"><span class="label label-info">Age</span></td>
        <td width="212"><input name="age" type="text" class="StyleTextField1" id="time"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><span class="label label-info">Brief Problem Description</span><br />
      <textarea name="dcr" style="resize:none; height: 130px; width:85%" cols="15" wrap="hard" class="StyleTextField1" id="dcr" placeholder="Briefly describe your problem" row="3"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="443" border="0">
      <tr>
        <td width="132"><a href="Index.php">back</a></td>
        <td width="128"><input name="submit" type="submit" class="btn-primary" id="submit" value="Subbmit appointment"></td>
        <td width="159">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

   
  </form>
  <script>
            CKEDITOR.replace( 'dcr' );
                              </script>
  
</div>
<div id="footer" style="marquee-style:alternate;">
		<table width="1100" style="marquee-style:alternate;">
  <tr>
    <td width="366">&nbsp;</td>
    <td width="367" style="text-outline:#FFF"><span><marquee style="marquee-style:scroll;">Copyright &copy; 2015 Abraham McOgol</marquee></span></td>
    <td width="366">&nbsp;</td>
  </tr>
</table>

</div>
</body>
</html>